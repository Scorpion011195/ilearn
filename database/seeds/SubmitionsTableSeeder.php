<?php

use Illuminate\Database\Seeder;

class SubmitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('submitions')->insert([
            ['STT'=>1,'from'=>'english','to'=>'vietnamese','from_text'=>'hello','to_text'=>'hin chào','quanlity'=>0,'status'=>'added']
            ]);
    }
}
