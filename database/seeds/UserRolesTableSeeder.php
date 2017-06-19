<?php

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            ['id_role'=>1,'role'=>'superadmin'],
            ['id_role'=>2,'role'=>'admin'],
            ['id_role'=>3,'role'=>'mod'],
            ['id_role'=>4,'role'=>'editor'],
            ['id_role'=>5,'role'=>'user']
            ]);
    }
}
