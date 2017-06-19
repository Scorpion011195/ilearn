<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            ['id_user'=>1,'time_to_remind'=>15,'id_reminder'=>1],
            ['id_user'=>2,'time_to_remind'=>30,'id_reminder'=>2],
            ['id_user'=>3,'time_to_remind'=>45,'id_reminder'=>3]
            ]);
    }
}
