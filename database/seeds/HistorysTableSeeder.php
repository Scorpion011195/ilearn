<?php

use Illuminate\Database\Seeder;

class HistorysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('historys')->insert([
            ['id_history'=>1,'content'=>'[{"type_from"=>"Interjection","STT":1,"from":"english","to":"vietnamese","from_text":"hello","to_text":"xin ch\u00e0o","from_explain":"nothing","to_explain":"ko co gi","notification":"F"},
 {"type_from"=>"間投詞","STT":2,"from":"japanese","to":"vietnamese","from_text":"こんにちは","to_text":"xin ch\u00e0o","from_exlpain":"nothing","to_explain":"ko co gi","notification":"F"},
{"type_from"=>"Interjection","STT":3,"from":"english","to":"japanese","from_text":"hello","to_text":"こんにちは","from_exlpain":"nothing","to_explain":"ko co gi","notification":"F"}]'],
            ['id_history'=>2,'content'=>'[{"type_from"=>"Interjection","STT":1,"from":"english","to":"vietnamese","from_text":"hello","to_text":"xin ch\u00e0o","from_explain":"nothing","to_explain":"ko co gi","notification":"F"},
 {"type_from"=>"間投詞","STT":2,"from":"japanese","to":"vietnamese","from_text":"こんにちは","to_text":"xin ch\u00e0o","from_exlpain":"nothing","to_explain":"ko co gi","notification":"F"},
{"type_from"=>"Interjection","STT":3,"from":"english","to":"japanese","from_text":"hello","to_text":"こんにちは","from_exlpain":"nothing","to_explain":"ko co gi","notification":"F"}]'],
            ['id_history'=>3,'content'=>'[{"type_from"=>"Interjection","STT":1,"from":"english","to":"vietnamese","from_text":"hello","to_text":"xin ch\u00e0o","from_explain":"nothing","to_explain":"ko co gi","notification":"F"},
 {"type_from"=>"間投詞","STT":2,"from":"japanese","to":"vietnamese","from_text":"こんにちは","to_text":"xin ch\u00e0o","from_exlpain":"nothing","to_explain":"ko co gi","notification":"F"},
{"type_from"=>"Interjection","STT":3,"from":"english","to":"japanese","from_text":"hello","to_text":"こんにちは","from_exlpain":"nothing","to_explain":"ko co gi","notification":"F"}]'],
            ['id_history'=>4,'content'=>'[{"type_from"=>"Interjection","STT":1,"from":"english","to":"vietnamese","from_text":"hello","to_text":"xin ch\u00e0o","from_explain":"nothing","to_explain":"ko co gi","notification":"F"},
 {"type_from"=>"間投詞","STT":2,"from":"japanese","to":"vietnamese","from_text":"こんにちは","to_text":"xin ch\u00e0o","from_exlpain":"nothing","to_explain":"ko co gi","notification":"F"},
{"type_from"=>"Interjection","STT":3,"from":"english","to":"japanese","from_text":"hello","to_text":"こんにちは","from_exlpain":"nothing","to_explain":"ko co gi","notification":"F"}]'],
            ['id_history'=>5,'content'=>'[{"type_from"=>"Interjection","STT":1,"from":"english","to":"vietnamese","from_text":"hello","to_text":"xin ch\u00e0o","from_explain":"nothing","to_explain":"ko co gi","notification":"F"},
 {"type_from"=>"間投詞","STT":2,"from":"japanese","to":"vietnamese","from_text":"こんにちは","to_text":"xin ch\u00e0o","from_exlpain":"nothing","to_explain":"ko co gi","notification":"F"},
{"type_from"=>"Interjection","STT":3,"from":"english","to":"japanese","from_text":"hello","to_text":"こんにちは","from_exlpain":"nothing","to_explain":"ko co gi","notification":"F"}]'],
            ['id_history'=>6,'content'=>'[{"type_from"=>"Interjection","STT":1,"from":"english","to":"vietnamese","from_text":"hello","to_text":"xin ch\u00e0o","from_explain":"nothing","to_explain":"ko co gi","notification":"F"},
 {"type_from"=>"間投詞","STT":2,"from":"japanese","to":"vietnamese","from_text":"こんにちは","to_text":"xin ch\u00e0o","from_exlpain":"nothing","to_explain":"ko co gi","notification":"F"},
{"type_from"=>"Interjection","STT":3,"from":"english","to":"japanese","from_text":"hello","to_text":"こんにちは","from_exlpain":"nothing","to_explain":"ko co gi","notification":"F"}]'],
            ['id_history'=>7,'content'=>'[{"type_from"=>"Interjection","STT":1,"from":"english","to":"vietnamese","from_text":"hello","to_text":"xin ch\u00e0o","from_explain":"nothing","to_explain":"ko co gi","notification":"F"},
 {"type_from"=>"間投詞","STT":2,"from":"japanese","to":"vietnamese","from_text":"こんにちは","to_text":"xin ch\u00e0o","from_exlpain":"nothing","to_explain":"ko co gi","notification":"F"},
{"type_from"=>"Interjection","STT":3,"from":"english","to":"japanese","from_text":"hello","to_text":"こんにちは","from_exlpain":"nothing","to_explain":"ko co gi","notification":"F"}]']
            ]);
    }
}
