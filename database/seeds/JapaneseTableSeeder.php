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
            ['id'=>1,'word'=>'{"type":"名詞","word":"こんにちは"}','listen'=>'','explain'=>'','id_mapping'=>1]
            ]);
    }
}
