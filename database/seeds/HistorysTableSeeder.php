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
            ['id_history'=>1,'content'=>'{"from":"english","to":"vietnamese","from_text":"Hello","to_text":"Xin chào","explain":"a greeting","notification":"F"}'],
            ['id_history'=>2,'content'=>'{"from":"english","to":"vietnamese","from_text":"Hello","to_text":"Xin chào","explain":"a greeting","notification":"F"}'],
            ['id_history'=>3,'content'=>'{"from":"english","to":"vietnamese","from_text":"Hello","to_text":"Xin chào","explain":"a greeting","notification":"F"}']
            ]);
    }
}
