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
            ['id_history'=>1,'content'=>'[{"STT":1,"from":"english","to":"vietnamese","from_text":"Hello","to_text":"Xin ch\u00e0o","from_expain":"nothing","to_explain":"ko co gi","notification":"F"},{"STT":2,"from":"english","to":"vietnamese","from_text":"Hello","to_text":"Xin ch\u00e0o","from_expain":"nothing","to_explain":"ko co gi","notification":"F"},{"STT":3,"from":"english","to":"vietnamese","from_text":"Hello","to_text":"Xin ch\u00e0o","from_expain":"nothing","to_explain":"ko co gi","notification":"F"}]'],
            ['id_history'=>2,'content'=>'[{"STT":1,"from":"english","to":"vietnamese","from_text":"Hello","to_text":"Xin ch\u00e0o","from_expain":"nothing","to_explain":"ko co gi","notification":"F"},{"STT":2,"from":"english","to":"vietnamese","from_text":"Hello","to_text":"Xin ch\u00e0o","from_expain":"nothing","to_explain":"ko co gi","notification":"F"},{"STT":3,"from":"english","to":"vietnamese","from_text":"Hello","to_text":"Xin ch\u00e0o","from_expain":"nothing","to_explain":"ko co gi","notification":"F"}]'],
            ['id_history'=>3,'content'=>'[{"STT":1,"from":"english","to":"vietnamese","from_text":"Hello","to_text":"Xin ch\u00e0o","from_expain":"nothing","to_explain":"ko co gi","notification":"F"},{"STT":2,"from":"english","to":"vietnamese","from_text":"Hello","to_text":"Xin ch\u00e0o","from_expain":"nothing","to_explain":"ko co gi","notification":"F"},{"STT":3,"from":"english","to":"vietnamese","from_text":"Hello","to_text":"Xin ch\u00e0o","from_expain":"nothing","to_explain":"ko co gi","notification":"F"}]'],
            ['id_history'=>4,'content'=>'[{"STT":1,"from":"english","to":"vietnamese","from_text":"Hello","to_text":"Xin ch\u00e0o","from_expain":"nothing","to_explain":"ko co gi","notification":"F"},{"STT":2,"from":"english","to":"vietnamese","from_text":"Hello","to_text":"Xin ch\u00e0o","from_expain":"nothing","to_explain":"ko co gi","notification":"F"},{"STT":3,"from":"english","to":"vietnamese","from_text":"Hello","to_text":"Xin ch\u00e0o","from_expain":"nothing","to_explain":"ko co gi","notification":"F"}]'],
            ['id_history'=>5,'content'=>'[{"STT":1,"from":"english","to":"vietnamese","from_text":"Hello","to_text":"Xin ch\u00e0o","from_expain":"nothing","to_explain":"ko co gi","notification":"F"},{"STT":2,"from":"english","to":"vietnamese","from_text":"Hello","to_text":"Xin ch\u00e0o","from_expain":"nothing","to_explain":"ko co gi","notification":"F"},{"STT":3,"from":"english","to":"vietnamese","from_text":"Hello","to_text":"Xin ch\u00e0o","from_expain":"nothing","to_explain":"ko co gi","notification":"F"}]'],
            ['id_history'=>6,'content'=>'[{"STT":1,"from":"english","to":"vietnamese","from_text":"Hello","to_text":"Xin ch\u00e0o","from_expain":"nothing","to_explain":"ko co gi","notification":"F"},{"STT":2,"from":"english","to":"vietnamese","from_text":"Hello","to_text":"Xin ch\u00e0o","from_expain":"nothing","to_explain":"ko co gi","notification":"F"},{"STT":3,"from":"english","to":"vietnamese","from_text":"Hello","to_text":"Xin ch\u00e0o","from_expain":"nothing","to_explain":"ko co gi","notification":"F"}]'],
            ['id_history'=>7,'content'=>'[{"STT":1,"from":"english","to":"vietnamese","from_text":"Hello","to_text":"Xin ch\u00e0o","from_expain":"nothing","to_explain":"ko co gi","notification":"F"},{"STT":2,"from":"english","to":"vietnamese","from_text":"Hello","to_text":"Xin ch\u00e0o","from_expain":"nothing","to_explain":"ko co gi","notification":"F"},{"STT":3,"from":"english","to":"vietnamese","from_text":"Hello","to_text":"Xin ch\u00e0o","from_expain":"nothing","to_explain":"ko co gi","notification":"F"}]']
            ]);
    }
}
