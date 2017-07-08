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
            ['id_user' => 1,'username' => 'user01','password' => bcrypt('user01'),'id_history' => 1,'id_status' => 1,'email'=>'a@gmail.com','id_role'=>5,'created_at'=>'2016-11-01 14:17:21'],
            ['id_user' => 2,'username' => 'user02','password' => bcrypt('user02'),'id_history' => 2,'id_status' => 1,'email'=>'b@gmail.com','id_role'=>5,'created_at'=>'2015-10-01 14:17:21'],
            ['id_user' => 3,'username' => 'user03','password' => bcrypt('user03'),'id_history' => 3,'id_status' => 2,'email'=>'c@gmail.com','id_role'=>5,'created_at'=>'2016-11-12 14:17:21'],
            ['id_user' => 4,'username' => 'superadmin','password' => bcrypt('superadmin'),'id_history' => 4,'id_status' => 1,'email'=>'superadmin@gmail.com','id_role'=>1,'created_at'=>'2016-11-02 14:17:21'],
            ['id_user' => 5,'username' => 'admin1','password' => bcrypt('admin1'),'id_history' => 5,'id_status' => 1,'email'=>'admin@gmail.com','id_role'=>2,'created_at'=>'2017-02-11 14:17:21'],
            ['id_user' => 6,'username' => 'editor','password' => bcrypt('editor'),'id_history' => 6,'id_status' => 1,'email'=>'editor@gmail.com','id_role'=>3,'created_at'=>'2017-06-05 14:17:21'],
            ['id_user' => 7,'username' => 'contributor','password' => bcrypt('contributor'),'id_history' => 7,'id_status' => 1,'email'=>'contributor@gmail.com','id_role'=>4,'created_at'=>'2016-11-09 14:17:21']
            ]);
    }
}
