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
            ['id_english'=>1,'word'=>'{"type":"interjection","word":"hello"}','listen'=>'','explain'=>'','id_mapping'=>1],
            ['id_english'=>2,'word'=>'{"type":"noun","word":"book"}','listen'=>'','explain'=>'','id_mapping'=>2],
            ['id_english'=>3,'word'=>'{"type":"interjection","word":"hi"}','listen'=>'','explain'=>'','id_mapping'=>1],
            ['id_english'=>4,'word'=>'{"type":"noun","word":"student"}','listen'=>'','explain'=>'','id_mapping'=>3],
            ['id_english'=>5,'word'=>'{"type":"noun","word":"teacher"}','listen'=>'','explain'=>'','id_mapping'=>4]
        ]);
    }
}
