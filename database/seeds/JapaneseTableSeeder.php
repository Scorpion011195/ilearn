<?php

use Illuminate\Database\Seeder;

class JapaneseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('japanese')->insert([
            ['id_japanese'=>1,'word'=>'{"type":"interjection","word":"こんにちは"}','listen'=>'','explain'=>'','id_mapping'=>1]
            ]);
    }
}
