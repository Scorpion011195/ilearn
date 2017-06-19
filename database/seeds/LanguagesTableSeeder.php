<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            ['id_language'=>1,'language'=>'english'],
            ['id_language'=>2,'language'=>'vietnamese'],
            ['id_language'=>3,'language'=>'japanese']
            ]);
    }
}
