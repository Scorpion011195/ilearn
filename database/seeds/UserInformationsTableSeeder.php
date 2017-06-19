<?php

use Illuminate\Database\Seeder;

class UserInformationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_informations')->insert([
            ['id_user'=>1,'name'=>'Nguyen Van A','address'=>'Dia chi 1','phone'=>'01666752250','date_of_birth'=>'1995/01/11'],
            ['id_user'=>2,'name'=>'Nguyen Van B','address'=>'Dia chi 2','phone'=>'01666752251','date_of_birth'=>'1995/01/11'],
            ['id_user'=>3,'name'=>'Nguyen Van C','address'=>'Dia chi 3','phone'=>'01666752252','date_of_birth'=>'1995/01/11']
            ]);
    }
}
