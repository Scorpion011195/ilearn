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

class UploadExcelController extends Controller
{
    public function checkTonTai($tableXXX, $word) {

    	$checkWord = DB::table($tableXXX)
            ->where('word', '=', $word)
            ->get();
    	if(count($checkWord) > 0) {
    		return true;
    	}
    	return false;
    }

    // Return function getMaxIdMapping from Controller DictionaryManagementController
	public function importExcel(Request $request)
	{	
		if($request->hasFile('csv-file')){
			$path = $request->file('csv-file')->getRealPath();

			$data = Excel::load($path, function($reader) {})->get();
			if(!empty($data) && $data->count()){
				$id_mapping = DictionaryManagementController::getMaxIdMapping() + 1;
				foreach ($data as $key => $value) {
					if ($value ->language == "") {
						$id_mapping++;
						continue;
					}
					
					$word = array("type" => $value->type, "word" => $value->word);
					$insert = null;
					$insert[] = [
						'word' => json_encode($word,JSON_UNESCAPED_UNICODE),
						// 'word' => json_decode($word),
						'explain' => $value->explain,
						'listen' => $value->listen,
						'id_mapping'=> $id_mapping,
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s'),
					];
					if($this->checkTonTai($value->language, $word))
					{
						continue;
					}
					DB::table($value->language)->insert($insert);
				}
				
				// echo 'Upload file successfully'; exit;
				$successful['text'] = 'info';
				return view('backend.dict.upload')->with('info', '$successful');			
			}
			
		}
					
	}		
}