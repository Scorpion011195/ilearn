<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['id_user' => 1,'username' => 'user01','password' => bcrypt('secret'),'id_history' => 1,'id_status' => 1,'email'=>'a@gmail.com','id_role'=>5],
            ['id_user' => 2,'username' => 'user02','password' => bcrypt('secret'),'id_history' => 2,'id_status' => 1,'email'=>'b@gmail.com','id_role'=>5],
            ['id_user' => 3,'username' => 'user03','password' => bcrypt('secret'),'id_history' => 3,'id_status' => 2,'email'=>'c@gmail.com','id_role'=>5],
            ['id_user' => 4,'username' => 'admin01','password' => bcrypt('admin01'),'id_history' => 4,'id_status' => 1,'email'=>'admin01@gmail.com','id_role'=>1],
            ['id_user' => 5,'username' => 'admin02','password' => bcrypt('admin02'),'id_history' => 5,'id_status' => 1,'email'=>'admin02@gmail.com','id_role'=>2],
            ['id_user' => 6,'username' => 'admin03','password' => bcrypt('admin03'),'id_history' => 6,'id_status' => 1,'email'=>'admin03@gmail.com','id_role'=>3],
            ['id_user' => 7,'username' => 'admin04','password' => bcrypt('admin04'),'id_history' => 7,'id_status' => 1,'email'=>'admin04@gmail.com','id_role'=>4]
            ]);
    }
}
