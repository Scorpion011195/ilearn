<?php

use Illuminate\Database\Seeder;

class StatussTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuss')->insert([
            ['id_status'=>1,'status'=>'normal'],
            ['id_status'=>2,'status'=>'banned']
            ]);
    }
}
