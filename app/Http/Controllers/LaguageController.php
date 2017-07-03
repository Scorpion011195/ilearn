<?php
namespace App\Http\Controllers;
use App\Repositories\LanguageRepository;
use Illuminate\Http\Request;
use App\Http\Requests\SearchWordRequest;
use App\ModelViews\LanguageViewModel;
class LaguageController extends Controller
{
    public function __construct(LanguageRepository $lang)
    {
        $this->lang = $lang;
    }

    public function getAllLanguage()
    {
        $language = \DB::table('languages')->get();

        return view('index')->with('data', $language);
    }

    public function search(SearchWordRequest $request)
    {
        //get all infor from screen
        $langueInput = $request->input('lagFrom');
        $langueOutput = $request->input('lagTo');
        $inputText = $request->input('search');
        $language = \DB::table('languages')->get();
        //search word :
        $workInfo = $this->lang->findWord($langueInput, $langueOutput, $inputText);
            \Session::put('flagLanguage1', $request->input('lagFrom'));
            \Session::put('flagLanguage2', $request->input('lagTo'));
        
        if($workInfo == false) {
            //echo 'k co tu dung'; exit;
            $fail['text'] = 'flag';
            return view('index')->with([
                    'flag' => $fail,
                    'data' => $language ]);
        }
        else {
            $arraySaveView = array();

            for($i=0; $i < count($workInfo); $i++){
                for($j = 0; $j < count($workInfo[$i]); $j++){
                    $languageView = new LanguageViewmodel;
                    $array = explode (",",$workInfo[$i][$j]->word);
                    $type = $array[0];
                    $type = substr($type, 9, -1);
                    $word = $array[1];
                    $word = substr($word, 8, -2);
                    $id = $workInfo[$i][$j]->id;
                    $listen = $workInfo[$i][$j]->listen;
                    $explain = $workInfo[$i][$j]->explain;
                    $languageView->id = $id;
                    $languageView->type = $type;
                    $languageView->word = $word;
                    $languageView->listen = $listen;
                    $languageView->explain = $explain;

                    array_push($arraySaveView, $languageView);
            }
        } 
            // $GetData= array('from' => $inputText, 'from_language' => $langueInput , 'To_language' => $langueOutput, 'to' => $word, 'explain'=>$explain,'notification' => 'T');

            return view('result')->with([
                    'workInfo' => $arraySaveView,
                    'data' => $language ,
                    'inputText' => $inputText,
                    'langueInput' => $langueInput,
                    'langueOutput' => $langueOutput,
                    'explain'=> $explain]);
        }
//        return 'ok';
//        return view('home');
    }
}
