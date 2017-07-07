<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Storage;
use Excel;
use App\Models\English;
use App\Models\Language;
use App\Services\languageService;
use App\Services\EnglishService;
use App\Models\Vietnamese;
use App\Services\VietnameseService;
use App\Models\Japanese;
use App\Services\JapaneseService;
use App\Http\Requests\AdminUploadCsvRequest;
use Illuminate\Support\MessageBag;

class UploadExcelController extends Controller
{
    public function checkTonTai($tableXXX, $word) {
    	$checkWord = DB::table($tableXXX)
            ->where('word', '=', $word)
            ->get();
        //dd($checkWord); die;
         // echo "<pre>"; print_r(count($checkWord)); die;
    	if(count($checkWord) > 0) {
    		return true;
    	}else{
    	return false;
    }
    }
    // Return function getMaxIdMapping from Controller DictionaryManagementController
	public function importExcel(AdminUploadCsvRequest $request)
	{
		$extension = \File::extension($request->file('csvFile')->getClientOriginalName());
		if($extension != "csv") {
			$errors = new MessageBag(['errorUpload' => 'File không đúng địng dạng!']);
        	return redirect()->back()->withInput()->withErrors($errors);
		}
		if($request->hasFile('csvFile')){
			$path = $request->file('csvFile')->getRealPath();

			$data = Excel::load($path, function($reader) {})->get();
			$list = array();
			$error = false;
			$listTable = array();
			if(!empty($data) && $data->count()){
				$id_mapping = DictionaryManagementController::getMaxIdMapping() + 1;
				foreach ($data as $key => $value) {
					$word = array("type" => $value->type, "word" => $value->word);
					$insert = null;
					$insert = [
						'word' => json_encode($word,JSON_UNESCAPED_UNICODE),
						// 'word' => json_decode($word),
						'explain' => $value->explain,
						'listen' => $value->listen,
						'id_mapping'=> $id_mapping,
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s'),
					];

					if ($value ->language == "" || $value ->language == "End") {
						if($error == false) {
							$this->doInsert($list, $listTable);
							$id_mapping++;
							$list = array();
							$listTable = array();
						}
						else {
							$error = false;
							$list = array();
							$listTable = array();
						}
						continue;
					}
					else {
						if($this->checkTonTai($value->language, json_encode($word)))
						{
							$error = true;
						}
						array_push($list, $insert);
						array_push($listTable, $value->language);
					}
				}
				// echo 'Upload file successfully'; exit;
				$successful['text'] = 'info';
				return view('backend.pages.dict.upload')->with('info', '$successful');
			}
		}
	}
	private function doInsert($list, $listTable) {
		$index = 0;
		foreach ($list as $key) {
			DB::table($listTable[$index])->insert($key);
			$index++;
		}
	}
}
