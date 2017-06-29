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
            ['id'=>1,'word'=>'{"type":"Danh từ","word":"chào"}','listen'=>'','explain'=>'','id_mapping'=>1],
            ['id'=>2,'word'=>'{"type":"Danh từ","word":"câu chào"}','listen'=>'','explain'=>'','id_mapping'=>1],
            ['id'=>3,'word'=>'{"type":"Danh từ","word":"tiếng chào"}','listen'=>'','explain'=>'','id_mapping'=>1],
            ['id'=>4,'word'=>'{"type":"Danh từ","word":"sách"}','listen'=>'','explain'=>'','id_mapping'=>2],
            ['id'=>5,'word'=>'{"type":"Danh từ","word":"sổ sách"}','listen'=>'','explain'=>'','id_mapping'=>2],
            ['id'=>6,'word'=>'{"type":"Động từ","word":"ghi"}','listen'=>'','explain'=>'','id_mapping'=>3],
            ['id'=>7,'word'=>'{"type":"Động từ","word":"chép"}','listen'=>'','explain'=>'','id_mapping'=>3],
            ['id'=>8,'word'=>'{"type":"Động từ","word":"đặt trước"}','listen'=>'','explain'=>'','id_mapping'=>3],
            ['id'=>9,'word'=>'{"type":"Động từ","word":"ghi vào sổ"}','listen'=>'','explain'=>'','id_mapping'=>3]
            ]);
    }
}

