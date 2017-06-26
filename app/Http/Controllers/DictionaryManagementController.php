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

    /*=================== Thêm từ area ===============*/
    // Check word existed? Ex: ('english', 'word', 'hello', 'noun')
    static function checkWordExist($tableFrom, $column, $wordFrom, $typeWord)
    {
        $englishService = new EnglishService(new English);
        $vietnameseService = new VietnameseService(new Vietnamese);
        $japaneseService = new JapaneseService(new Japanese);

        switch($tableFrom){
            case 'english':
                $result = $englishService->findWord($column, $wordFrom);
                break;
            case 'vietnamese':
                $result = $vietnameseService->findWord($column, $wordFrom);
                break;
            case 'japanese':
                $result = $japaneseService->findWord($column, $wordFrom);
        }

        $count = $result->count();
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
    static function getMaxIdMapping(){
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

    // Thêm từ
    function createWord(Request $request)
    {
        $languageService = new LanguageService(new Language);
        $listLanguage = $languageService->getAll();
        $listTypeOfWord = MyConstant::TYPE_OF_WORD_VIETNAMESE;

        // Input submit
        $idTableNguon = $request->_cbnguon;
        $idLoaiTu = $request->_cbloaitu;
        $idTableDich = $request->_cbdich;
        $txtTu = $request->_txttu;
        $txtNghia = $request->_txtnghia;
        $taTu = $request->_tatu;
        $taNghia = $request->_tanghia;

        // Check input?
        if(empty($txtTu)){
            $param = ['listLanguage'=>$listLanguage,'listTypeOfWord'=>$listTypeOfWord, 'lastTxtTu'=>$txtTu, 'lastTxtNghia'=>$txtNghia, 'code'=>'failedInputEmptyFrom'];
            return view('backend.dict.create', $param);
        }
        else if(empty($txtNghia)){
            $param = ['listLanguage'=>$listLanguage,'listTypeOfWord'=>$listTypeOfWord, 'lastTxtTu'=>$txtTu, 'lastTxtNghia'=>$txtNghia, 'code'=>'failedInputEmptyTo'];
            return view('backend.dict.create', $param);
        }

        // Find table
        $tableFrom = MyConstant::LANGUAGES_TABLE[$idTableNguon];
        $tableTo = MyConstant::LANGUAGES_TABLE[$idTableDich];

        // Find type of text from and service of table from
        switch ($tableFrom) {
            case 'english':
                $typeWordFrom = MyConstant::TYPE_OF_WORD_ENGLISH[$idLoaiTu];
                $tableServiceFrom = new EnglishService(new English);
                break;
            case 'vietnamese':
                $typeWordFrom = MyConstant::TYPE_OF_WORD_VIETNAMESE[$idLoaiTu];
                $tableServiceFrom = new VietnameseService(new Vietnamese);
                break;
            case 'japanese':
                $typeWordFrom = MyConstant::TYPE_OF_WORD_JAPANESE[$idLoaiTu];
                $tableServiceFrom = new JapaneseService(new Japanese);
        }

        // Find type of text to and service of table to
        switch ($tableTo) {
            case 'english':
                $typeWordTo = MyConstant::TYPE_OF_WORD_ENGLISH[$idLoaiTu];
                $tableServiceTo = new EnglishService(new English);
                break;
            case 'vietnamese':
                $typeWordTo = MyConstant::TYPE_OF_WORD_VIETNAMESE[$idLoaiTu];
                $tableServiceTo = new VietnameseService(new Vietnamese);
                break;
            case 'japanese':
                $typeWordTo = MyConstant::TYPE_OF_WORD_JAPANESE[$idLoaiTu];
                $tableServiceTo = new JapaneseService(new Japanese);
        }

        $columnWord = 'word';

        $isExitsFrom = $this->checkWordExist($tableFrom, $columnWord, $txtTu, $typeWordFrom);
        $isExitsTo = $this->checkWordExist($tableTo, $columnWord, $txtNghia, $typeWordTo);
        // Nếu từ này đã tồn tại trong hệ thống
        if($isExitsFrom){
            // Nếu nghĩa này cũng tồn tại trong hệ thống
            if($isExitsTo){
                $param = ['listLanguage'=>$listLanguage,'listTypeOfWord'=>$listTypeOfWord, 'lastTxtTu'=>$txtTu, 'lastTxtNghia'=>$txtNghia, 'code'=>'failedWord'];
                return view('backend.dict.create', $param);
            }
            else{
                // Lấy id_mapping của từ này
                $resultFrom = $tableServiceFrom->findWordWithType($columnWord, $txtTu, $typeWordFrom);
                $idMapping = $resultFrom->id_mapping;

                // Thêm vào bảng đích
                $addContentTo = ['word'=>'{"type":"'.$typeWordTo.'","word":"'.$txtNghia.'"}',
                                   'listen'=>'',
                                   'explain'=>$taNghia,
                                   'id_mapping'=>$idMapping];
                $this->insertTable($tableServiceTo, $addContentTo);

                $param = ['listLanguage'=>$listLanguage,'listTypeOfWord'=>$listTypeOfWord, 'lastTxtTu'=>$txtTu, 'lastTxtNghia'=>$txtNghia, 'code'=>'SuccessfulWord'];
                return view('backend.dict.create', $param);
            }

        }
        else{
            $idMapping = $this->getMaxIdMapping()+1;

            // Thêm vào bảng nguồn
            $addContentFrom = ['word'=>'{"type":"'.$typeWordFrom.'","word":"'.$txtTu.'"}',
                               'listen'=>'',
                               'explain'=>$taTu,
                               'id_mapping'=>$idMapping];
            $this->insertTable($tableServiceFrom, $addContentFrom);

            // Thêm vào bảng đích
            $addContentTo = ['word'=>'{"type":"'.$typeWordTo.'","word":"'.$txtNghia.'"}',
                               'listen'=>'',
                               'explain'=>$taNghia,
                               'id_mapping'=>$idMapping];
            $this->insertTable($tableServiceTo, $addContentTo);

            $param = ['listLanguage'=>$listLanguage,'listTypeOfWord'=>$listTypeOfWord, 'lastTxtTu'=>$txtTu, 'lastTxtNghia'=>$txtNghia, 'code'=>'SuccessfulWord'];
            return view('backend.dict.create', $param);

        }
    }

    function insertTable($tableService, $attributes){
        $tableService->create($attributes);
    }
    /*=================== /.Thêm từ area ===============*/


    /*=================== Tra từ area ===============*/
    function getSearch(){
        $languageService = new LanguageService(new Language);
        $listLanguage = $languageService->getAll();

        $listTypeOfWord = MyConstant::TYPE_OF_WORD_VIETNAMESE;

        $param = ['listLanguage'=>$listLanguage,'listTypeOfWord'=>$listTypeOfWord, 'lastKey'=>'', 'idCbTypeWord'=>6, 'idCbTableFrom'=>1,'idCbTableTo'=>2, 'code'=>'none', 'countTo'=>0];
        return view('backend.dict.search', $param);
    }

    function searchWord(Request $request){
       // Input submit
       $keyTraTu = $request->_keytratu;
       $tableFrom = $request->_cbnguontratu;
       $tableTo = $request->_cbdichtratu;
       $typeWord = $request->_cbloaitutratu;

       // Init
       $englishService = new EnglishService(new English);
       $vietnameseService = new VietnameseService(new Vietnamese);
       $japaneseService = new JapaneseService(new Japanese);
       $languageService = new LanguageService(new Language);

       $listLanguage = $languageService->getAll();
       $listTypeOfWord = MyConstant::TYPE_OF_WORD_VIETNAMESE;

       // Nếu chưa nhập từ
       if(empty($keyTraTu)){
           return redirect()->route('adminDictSearch')->with('alertSearchWordFailed','Bạn chưa nhập từ!');
       }

       // Tìm từ trong bảng nguồn
       $nameTableFrom = MyConstant::LANGUAGES_TABLE[$tableFrom];
       switch ($nameTableFrom) {
            case 'english':
                $typeWordFrom = MyConstant::TYPE_OF_WORD_ENGLISH[$typeWord];
                echo "Loai tu".$typeWordFrom."<br>";
                $resultFrom = $englishService->findWordWithType('word', $keyTraTu, $typeWordFrom);
                $countFrom = sizeof($resultFrom);
                break;
            case 'vietnamese':
                $typeWordFrom = MyConstant::TYPE_OF_WORD_VIETNAMESE[$typeWord];
                $resultFrom = $vietnameseService->findWordWithType('word', $keyTraTu, $typeWordFrom);
                $countFrom = sizeof($resultFrom);
                break;
            case 'japanese':
                $typeWordFrom = MyConstant::TYPE_OF_WORD_JAPANESE[$typeWord];
                $resultFrom = $japaneseService->findWordWithType('word', $keyTraTu, $typeWordFrom);
                $countFrom = sizeof($resultFrom);
        }

        // Nếu từ chưa có trong từ điển
        if($countFrom<=0){
            $param = ['listLanguage'=>$listLanguage,'listTypeOfWord'=>$listTypeOfWord, 'lastKey'=>$keyTraTu, 'idCbTypeWord'=>$typeWord, 'idCbTableFrom'=>$tableFrom,'idCbTableTo'=>$tableTo, 'code'=>'successNone', 'countTo'=>0];
            return view('backend.dict.search', $param);
        }

       /*Nếu từ có trong từ điển
       Tìm từ tương ứng ở bảng đích*/
       $nameTableTo = MyConstant::LANGUAGES_TABLE[$tableTo];
       switch ($nameTableTo) {
            case 'english':
                $resultTo = $englishService->getAllByColumn('id_mapping',$resultFrom->id_mapping);
                $countTo = $resultTo->count();
                break;
            case 'vietnamese':
                $resultTo = $vietnameseService->getAllByColumn('id_mapping',$resultFrom->id_mapping);
                $countTo = $resultTo->count();
                break;
            case 'japanese':
                $resultTo = $japaneseService->getAllByColumn('id_mapping',$resultFrom->id_mapping);
                $countTo = $resultTo->count();
        }

        // Hiển thị
        $param = ['listLanguage'=>$listLanguage,'listTypeOfWord'=>$listTypeOfWord, 'lastKey'=>$keyTraTu, 'idCbTypeWord'=>$typeWord, 'idCbTableFrom'=>$tableFrom,'idCbTableTo'=>$tableTo, 'code'=>'success', 'result'=>$resultTo, 'countTo'=>$countTo];
        return view('backend.dict.search', $param);


    }
    /*=================== /.Tra từ area ===============*/
}

