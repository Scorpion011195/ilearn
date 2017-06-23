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
            ['id_user'=>2,'name'=>'Nguyen Van B','address'=>'Dia chi 2','phone'=>'01666752251','date_of_birth'=>'1995/02/11'],
            ['id_user'=>3,'name'=>'Nguyen Van C','address'=>'Dia chi 3','phone'=>'01666752252','date_of_birth'=>'1995/03/11'],
            ['id_user'=>4,'name'=>'Nguyen Van D','address'=>'Dia chi 4','phone'=>'01666752253','date_of_birth'=>'1995/04/11'],
            ['id_user'=>5,'name'=>'Nguyen Van E','address'=>'Dia chi 5','phone'=>'01666752254','date_of_birth'=>'1995/05/11'],
            ['id_user'=>6,'name'=>'Nguyen Van F','address'=>'Dia chi 6','phone'=>'01666752255','date_of_birth'=>'1995/06/11'],
            ['id_user'=>7,'name'=>'Nguyen Van G','address'=>'Dia chi 7','phone'=>'01666752256','date_of_birth'=>'1995/07/11']
            ]);
    }
}
