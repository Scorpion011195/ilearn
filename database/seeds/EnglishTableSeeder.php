<?php

use Illuminate\Database\Seeder;

class EnglishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('english')->insert([
            ['id'=>1,'word'=>'{"type":"Interjection","word":"hello"}','listen'=>'','explain'=>'','id_mapping'=>1],
            ['id'=>2,'word'=>'{"type":"Noun","word":"book"}','listen'=>'','explain'=>'','id_mapping'=>2],
            ['id'=>3,'word'=>'{"type":"Interjection","word":"hi"}','listen'=>'','explain'=>'','id_mapping'=>1],
            ['id'=>4,'word'=>'{"type":"Noun","word":"student"}','listen'=>'','explain'=>'','id_mapping'=>3],
            ['id'=>5,'word'=>'{"type":"Noun","word":"teacher"}','listen'=>'','explain'=>'','id_mapping'=>4]
        ]);
    }
}
