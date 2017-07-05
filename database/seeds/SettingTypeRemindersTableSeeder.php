<?php

use Illuminate\Database\Seeder;

class SettingTypeRemindersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting_type_reminders')->insert([
            ['id_reminder'=>1,'type'=>'Từ'],
            ['id_reminder'=>2,'type'=>'Nghĩa'],
            ['id_reminder'=>3,'type'=>'Từ và nghĩa']
            ]);
    }
}
