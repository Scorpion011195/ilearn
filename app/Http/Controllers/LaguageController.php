<?php
namespace App\Http\Controllers;
use App\Repositories\LanguageRepository;
use Illuminate\Http\Request;
use App\ModelViews\LanguageViewModel;
class LaguageController extends Controller
{
    public function __construct(LanguageRepository $lang)
    {
        $this->lang = $lang;
    }
    public function search(Request $request)
    {
        //get all infor from screen
        $langueInput = $request->input('cb1');
        $langueOutput = $request->input('cb2');
        $inputText = $request->input('search');
        //search word :
        $workInfo = $this->lang->findWord($langueInput, $langueOutput, $inputText);
        
        if($workInfo == false) {
            echo 'k co tu dung'; exit;
        }
        else {
            $arraySaveView = array();
            
            for($i=0; $i < count($workInfo); $i++){
                $languageView = new LanguageViewmodel;
                $array = explode (",",$workInfo[$i]-> word);
                $type = $array[0];
                $type = substr($type, 9, -1);
                $word = $array[1];
                $word = substr($word, 8, -2);
                $listen = $workInfo[$i]->listen;
                $explain = $workInfo[$i]->explain;
                $languageView->type = $type;
                $languageView->word = $word;
                $languageView->listen = $listen;
                $languageView->explain = $explain;
                
                array_push($arraySaveView, $languageView);
            }           
            return view('result')->with('workInfo', $arraySaveView);
        }
//        return 'ok';
//        return view('home');
    }
}