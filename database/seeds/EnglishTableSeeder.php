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
            ['id'=>1,'word'=>'{"type":"Noun","word":"hello"}','listen'=>'','explain'=>'','id_mapping'=>1],
            ['id'=>2,'word'=>'{"type":"Noun","word":"book"}','listen'=>'','explain'=>'','id_mapping'=>2],
            ['id'=>3,'word'=>'{"type":"Verd","word":"book"}','listen'=>'','explain'=>'','id_mapping'=>3]
        ]);
    }
}
