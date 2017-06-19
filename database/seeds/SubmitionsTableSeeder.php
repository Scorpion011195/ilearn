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
            ['id_submition'=>1,'from_text'=>'hello','to_text'=>'xin chào','from_id_language'=>1,'to_id_language'=>2,'explain_from_text'=>'','no_of_visits'=>200],
            ['id_submition'=>2,'from_text'=>'xin chào','to_text'=>'hello','from_id_language'=>2,'to_id_language'=>1,'explain_from_text'=>'','no_of_visits'=>300]
            ]);
    }
}
