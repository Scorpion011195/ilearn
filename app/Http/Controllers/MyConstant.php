<?php

namespace App\Http\Controllers;

// This is a file to define some objests
// Do not remove it!
class MyConstant
{
    // Mảng này khớp với table languages trong database
    const LANGUAGES_TABLE = ['1'=>'english','2'=>'vietnamese','3'=>'japanese'];

    const TYPE_OF_WORD_ENGLISH = ['1'=>'Noun',
                                  '2'=>'Verb',
                                  '3'=>'Adjective',
                                  '4'=>'Adverb',
                                  '5'=>'Preposition',
                                  '6'=>'Interjection'];

    const TYPE_OF_WORD_VIETNAMESE = ['1'=>'Danh từ',
                                      '2'=>'Động từ',
                                      '3'=>'Tính từ',
                                      '4'=>'Trạng từ',
                                      '5'=>'Giới từ',
                                      '6'=>'Thán từ'];

    const TYPE_OF_WORD_JAPANESE = ['1'=>'名詞',
                                  '2'=>'動詞',
                                  '3'=>'形容詞',
                                  '4'=>'副詞',
                                  '5'=>'前置詞',
                                  '6'=>'間投詞'];

    /*This is not a constant
    Instance of submitions table
    init array to statistic*/
    static $arr_statistic_word = array(['STT'=>1,'from'=>'english','to'=>'vietnamese','from_text'=>'hello','to_text'=>'xin chào','quanlity'=>0,'status'=>'added']);
}
