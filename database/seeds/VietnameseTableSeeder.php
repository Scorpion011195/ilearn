<?php

use Illuminate\Database\Seeder;

class VietnameseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vietnamese')->insert([
            ['id_vietnamese'=>1,'word'=>'{"type":"Thán từ","word":"xin chào"}','listen'=>'','explain'=>'','id_mapping'=>1],
            ['id_vietnamese'=>2,'word'=>'{"type":"Danh từ","word":"câu chào"}','listen'=>'','explain'=>'','id_mapping'=>1],
            ['id_vietnameses'=>3,'word'=>'{"type":"Danh từ","word":"quyển sách"}','listen'=>'','explain'=>'','id_mapping'=>2],
            ['id_vietnamesese'=>4,'word'=>'{"type":"Danh từ","word":"học sinh"}','listen'=>'','explain'=>'','id_mapping'=>3],
            ['id_vietnamesese'=>5,'word'=>'{"type":"Danh từ","word":"sinh viên"}','listen'=>'','explain'=>'','id_mapping'=>3]
            ]);
    }
}

