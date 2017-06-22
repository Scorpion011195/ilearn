<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MyConstant;
use App\Models\Language;
use App\Services\languageService;
use App\Models\English;
use App\Services\EnglishService;
use App\Models\Vietnamese;
use App\Services\VietnameseService;
use App\Models\Japanese;
use App\Services\JapaneseService;


class DictionaryManagementController extends Controller
{
    function home()
    {
        $languageService = new LanguageService(new Language);
        $listLanguage = $languageService->getAll();

        $listTypeOfWord = MyConstant::TYPE_OF_WORD_VIETNAMESE;

        $param = ['listLanguage'=>$listLanguage,'listTypeOfWord'=>$listTypeOfWord, 'lastTxtTu'=>'', 'lastTxtNghia'=>'', 'code'=>'none'];
        return view('backend.dict.create', $param);
    }

    // Check word existed? Ex: ('english', 'word', 'hello', 'noun')
    function checkWordExist($tableFrom, $column, $wordFrom, $typeWord)
    {
        $englishService = new EnglishService(new English);
        $vietnameseService = new VietnameseService(new Vietnamese);
        $japaneseService = new JapaneseService(new Japanese);

        switch($tableFrom){
            case 'english':
                $result = $englishService->findWord($column, $wordFrom);
                $count = $result->count();
                break;
            case 'vietnamese':
                $result = $vietnameseService->findWord($column, $wordFrom);
                $count = $result->count();
                break;
            case 'japanese':
                $result = $japaneseService->findWord($column, $wordFrom);
                $count = $result->count();
        }

        //echo "Ket qua: ".$count."<br>";
        if($count>0){
            foreach ($result as $row){
                $arrWord = json_decode($row->word);
                //echo "type in database: ".$arrWord->type." --- "."type input: ".$typeWord."<br>";

                // Từ đã có trong bảng nguồn
                if($typeWord == $arrWord->type){
                    return true;
                }
            }
            // Từ này chưa có trong bảng nguồn
            return false;
        }
        else{
            // Từ này chưa có trong bảng nguồn
            return false;
        }
    }

    // Get max id_mapping of all language tables
    function getMaxIdMapping(){
        $englishService = new EnglishService(new English);
        $vietnameseService = new VietnameseService(new Vietnamese);
        $japaneseService = new JapaneseService(new Japanese);

        $maxEnglish = $englishService->getMaxIdMapping();
        $maxVietnamese = $vietnameseService->getMaxIdMapping();
        $maxJapanese = $japaneseService->getMaxIdMapping();

        $arrIpMapping = array();
        array_push($arrIpMapping, $maxEnglish, $maxVietnamese, $maxJapanese);

        return max($arrIpMapping);
    }

    function createWord(Request $request)
    {
        // Param submit
        $idTableNguon = $request->_cbnguon;
        $idLoaiTu = $request->_cbloaitu;
        $idTableDich = $request->_cbdich;
        $txtTu = $request->_txttu;
        $txtNghia = $request->_txtnghia;
        $taTu = $request->_tatu;
        $taNghia = $request->_tanghia;

        // Check input?
        if(empty($txtTu)||empty($txtNghia)){
            $languageService = new LanguageService(new Language);
            $listLanguage = $languageService->getAll();

            $listTypeOfWord = MyConstant::TYPE_OF_WORD_VIETNAMESE;

            $param = ['listLanguage'=>$listLanguage,'listTypeOfWord'=>$listTypeOfWord, 'lastTxtTu'=>$txtTu, 'lastTxtNghia'=>$txtNghia, 'code'=>'failedInputEmpty'];
            return view('backend.dict.create', $param);
        }

        // Find table
        $tableFrom = MyConstant::LANGUAGES_TABLE[$idTableNguon];

        // Find type of text from
        switch ($tableFrom) {
            case 'english':
                $typeWord = MyConstant::TYPE_OF_WORD_ENGLISH[$idLoaiTu];
                break;
            case 'vietnamese':
                $typeWord = MyConstant::TYPE_OF_WORD_VIETNAMESE[$idLoaiTu];
                break;
            case 'japanese':
                $typeWord = MyConstant::TYPE_OF_WORD_JAPANESE[$idLoaiTu];
        }

        $columnWord = 'word';
        //Nếu từ này đã tồn tại trong hệ thống
        if($this->checkWordExist($tableFrom, $columnWord, $txtTu, $typeWord )){
            $languageService = new LanguageService(new Language);
            $listLanguage = $languageService->getAll();

            $listTypeOfWord = MyConstant::TYPE_OF_WORD_VIETNAMESE;

            $param = ['listLanguage'=>$listLanguage,'listTypeOfWord'=>$listTypeOfWord, 'lastTxtTu'=>$txtTu, 'lastTxtNghia'=>$txtNghia, 'code'=>'failedWord'];
            return view('backend.dict.create', $param);
        }
        else{
            echo "Them vao tu nay";
        }
    }
}

