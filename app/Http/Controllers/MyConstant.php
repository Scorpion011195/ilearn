<?php

namespace App\Http\Controllers;

// This is a file to define some objests
// Do not remove it!
class MyConstant
{
    // Table languages in database
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

    // Table setting_type_reminders
    const TYPE_REMINDERS = ['1'=>'Từ',
                            '2'=>'Nghĩa',
                            '3'=>'Từ và nghĩa'];

    const ROLE = ['superadmin'=>'1',
                  'admin'=>'2',
                  'editor'=>'3',
                  'contributor'=>'4',
                  'user'=>'5'
                 ];
    // Type time to Remind ( minutes )
    const TYPE_TIME_REMINDERS = ['5','10','15','30','45','60'];

    /*This is not a constant
    Instance of submitions table
    init array to statistic*/
    static $arr_statistic_word = array(['STT'=>1,'from'=>'english','to'=>'vietnamese','from_text'=>'hello','to_text'=>'xin chào','quanlity'=>0,'type_from'=>'Interjection','status'=>'Added']);
}
