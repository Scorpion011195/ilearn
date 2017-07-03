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
use App\Http\Requests\AdminAddWordRequest;
use App\Http\Requests\AdminSearchWordRequest;
use App\Http\Requests\AdminUpdateWordRequest;
use Illuminate\Support\MessageBag;


class DictionaryManagementController extends Controller
{
    function home()
    {
        $languageService = new LanguageService(new Language);
        $listLanguage = $languageService->getAll();

        $listTypeOfWord = MyConstant::TYPE_OF_WORD_VIETNAMESE;

        $param = ['listLanguage'=>$listLanguage,'listTypeOfWord'=>$listTypeOfWord,'idTableNguon'=> 1,'idTableDich'=>2,'idLoaiTu'=>6, 'lastTxtTu'=>'', 'lastTxtNghia'=>'', 'code'=>'none'];
        return view('backend.dict.create', $param);
    }

    /*=================== Add word area ===============*/
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

        if($count>0){
            foreach ($result as $row){
                $arrWord = json_decode($row->word);
                // Word existed in from-table
                if($typeWord == $arrWord->type){
                    return true;
                }
            }
            // Word doesn't exist in from-table
            return false;
        }
        else{
            // Word doesn't exist in from-table
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

    // Create word
    function createWord(AdminAddWordRequest $request)
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

        // Params
        $param = ['listLanguage'=>$listLanguage,'listTypeOfWord'=>$listTypeOfWord,'idTableNguon'=> $idTableNguon,'idTableDich'=>$idTableDich,'idLoaiTu'=>$idLoaiTu];

        // Check input?
        if(empty($txtTu)){
            return view('backend.dict.create', $param);
        }
        else if(empty($txtNghia)){
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

        $typeWordInVietnamese = MyConstant::TYPE_OF_WORD_VIETNAMESE[$idLoaiTu];

        // If this word existed
        if($isExitsFrom){
            // If this mean existed
            if($isExitsTo){
                // Word existed
                $errors = new MessageBag(['FailedCannotFind' => 'Từ "'.$txtTu.'" ('.$typeWordInVietnamese.') đã có trong hệ thống']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
            // If this mean doesn't exist
            else{
                // Get id_mapping of from-word
                $resultFrom = $tableServiceFrom->findWordWithType($columnWord, $txtTu, $typeWordFrom);
                $idMapping = $resultFrom->id_mapping;

                // Add mean to to-table
                $addContentTo = ['word'=>'{"type":"'.$typeWordTo.'","word":"'.$txtNghia.'"}',
                                   'listen'=>'',
                                   'explain'=>$taNghia,
                                   'id_mapping'=>$idMapping];
                $this->insertTable($tableServiceTo, $addContentTo);

                // Display result
                $errors = new MessageBag(['Success' => 'Đã thêm từ "'.$txtNghia.'" ('.$typeWordInVietnamese.') vào hệ thống']);
                return redirect()->back()->withInput()->withErrors($errors);
            }

        }
        // If this word doesn't exist
        else{
            // If this mean existed
            if($isExitsTo){
                // Get id_mapping of mean
                $resultTo = $tableServiceTo->findWordWithType($columnWord, $txtNghia, $typeWordTo);
                $idMapping = $resultTo->id_mapping;

                // Add word to from-table
                $addContentFrom = ['word'=>'{"type":"'.$typeWordFrom.'","word":"'.$txtTu.'"}',
                                   'listen'=>'',
                                   'explain'=>$taTu,
                                   'id_mapping'=>$idMapping];
                $this->insertTable($tableServiceFrom, $addContentFrom);

                // Set result
                $errors = new MessageBag(['Success' => 'Đã thêm từ "'.$txtTu.'" ('.$typeWordInVietnamese.') vào hệ thống']);
            }
            // If this mean doesn't exist
            else{
                // Get max id_mapping of entire table
                $idMapping = $this->getMaxIdMapping()+1;

                // Add to from-table
                $addContentFrom = ['word'=>'{"type":"'.$typeWordFrom.'","word":"'.$txtTu.'"}',
                                   'listen'=>'',
                                   'explain'=>$taTu,
                                   'id_mapping'=>$idMapping];
                $this->insertTable($tableServiceFrom, $addContentFrom);

                // Add to to-table
                $addContentTo = ['word'=>'{"type":"'.$typeWordTo.'","word":"'.$txtNghia.'"}',
                                   'listen'=>'',
                                   'explain'=>$taNghia,
                                   'id_mapping'=>$idMapping];
                $this->insertTable($tableServiceTo, $addContentTo);

                // Set result
                $errors = new MessageBag(['Success' => 'Đã thêm từ "'.$txtTu.'" ('.$typeWordInVietnamese.') và nghĩa "'.$txtNghia.'" vào hệ thống']);
            }

            // Display result
            return redirect()->back()->withInput()->withErrors($errors);

        }
    }

    function insertTable($tableService, $attributes){
        $tableService->create($attributes);
    }
    /*=================== /.Add word area ===============*/


    /*=================== Search word area ===============*/
    function displaySearch(){
        $languageService = new LanguageService(new Language);
        $listLanguage = $languageService->getAll();

        $listTypeOfWord = MyConstant::TYPE_OF_WORD_VIETNAMESE;

        $param = ['listLanguage'=>$listLanguage,'listTypeOfWord'=>$listTypeOfWord, 'idCbTypeWord'=>1, 'idCbTableFrom'=>1,'idCbTableTo'=>2, 'countTo'=>0];
        return view('backend.dict.search', $param);
    }

    function getSearch(AdminSearchWordRequest $request){
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

       // Find word in from-table
       $nameTableFrom = MyConstant::LANGUAGES_TABLE[$tableFrom];
       switch ($nameTableFrom) {
            case 'english':
                $typeWordFrom = MyConstant::TYPE_OF_WORD_ENGLISH[$typeWord];
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

        // If word doesn't exist
        if($countFrom<=0){
            $param = ['listLanguage'=>$listLanguage,'listTypeOfWord'=>$listTypeOfWord, 'lastKey'=>$keyTraTu, 'idCbTypeWord'=>$typeWord, 'idCbTableFrom'=>$tableFrom,'idCbTableTo'=>$tableTo, 'code'=>'FailedCannotFind', 'countTo'=>0];
                return view('backend.dict.search', $param);
        }
        else{
            /* If word existed
           Find mean in to-table */
           $nameTableTo = MyConstant::LANGUAGES_TABLE[$tableTo];
           switch ($nameTableTo) {
                case 'english':
                    $resultTo = $englishService->getAllByIdMappingOrderById('id_mapping',$resultFrom->id_mapping);
                    $countTo = $resultTo->count();
                    break;
                case 'vietnamese':
                    $resultTo = $vietnameseService->getAllByIdMappingOrderById('id_mapping',$resultFrom->id_mapping);
                    $countTo = $resultTo->count();
                    break;
                case 'japanese':
                    $resultTo = $japaneseService->getAllByIdMappingOrderById('id_mapping',$resultFrom->id_mapping);
                    $countTo = $resultTo->count();
            }

            // If cann't find mean
            if($countTo<=0){
                $param = ['listLanguage'=>$listLanguage,'listTypeOfWord'=>$listTypeOfWord, 'lastKey'=>$keyTraTu, 'idCbTypeWord'=>$typeWord, 'idCbTableFrom'=>$tableFrom,'idCbTableTo'=>$tableTo, 'code'=>'FailedCannotFind', 'countTo'=>0];
                return view('backend.dict.search', $param);
            }
            // If find mean successful
            else{
                $param = ['listLanguage'=>$listLanguage,'listTypeOfWord'=>$listTypeOfWord, 'lastKey'=>$keyTraTu, 'idCbTypeWord'=>$typeWord, 'idCbTableFrom'=>$tableFrom,'idCbTableTo'=>$tableTo, 'code'=>'Success', 'result'=>$resultTo, 'countTo'=>$countTo];
                return view('backend.dict.search', $param);
            }
        }
    }
    /*=================== /.Search area ===============*/


    /*=================== Delete word area ===============*/
    function deleteWord(Request $request){
        // Input
        $idWord = $request->idWord;
        $table = $request->table;

        // Init
        $englishService = new EnglishService(new English);
        $vietnameseService = new VietnameseService(new Vietnamese);
        $japaneseService = new JapaneseService(new Japanese);
        $column = 'id';

        switch ($table) {
            case 'english':
                $englishService->deleteByColumn($column, $idWord);
                break;
            case 'vietnamese':
                $vietnameseService->deleteByColumn($column, $idWord);
                break;
            case 'japanese':
                $$japaneseService->deleteByColumn($column, $idWord);
        }

        $dataResponse = ["data"=>"OK"];
        return json_encode($dataResponse);
    }
    /*=================== /.Delete word area ===============*/


    /*=================== Update word area ===============*/
    function updateWord(Request $request){
        // Input
        $idWord = $request->idWord;
        $table = $request->table;
        $updateWord = $request->updateWord;
        $updateExplain = $request->updateExplain;

        $column = 'id';

        switch ($table) {
            case 'english':
                $service = new EnglishService(new English);
                break;
            case 'vietnamese':
                $service = new VietnameseService(new Vietnamese);
                break;
            case 'japanese':
                $service = new JapaneseService(new Japanese);
        }

        $beforeResult = $service->getByColumn($column, $idWord);
        $arrBeforeWord = json_decode($beforeResult->word);
        $arrBeforeWord->word = $updateWord;
        $jsonAfterWord = json_encode($arrBeforeWord, JSON_UNESCAPED_UNICODE);
        $attributes = ['word'=>$jsonAfterWord, 'explain'=>$updateExplain];
        $service->updateByColumn($column, $idWord, $attributes);

        $dataResponse = ['idWord'=>$idWord,"word"=>$updateWord,"explain"=>$updateExplain];
        return json_encode($dataResponse);
    }
    /*=================== /.Update word area ===============*/
}

