<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EnglishTableSeeder::class);
        $this->call(HistorysTableSeeder::class);
        $this->call(JapaneseTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(SettingTypeRemindersTableSeeder::class);
        $this->call(StatussTableSeeder::class);
        $this->call(SubmitionsTableSeeder::class);
        $this->call(UserInformationsTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(VietnameseTableSeeder::class);
    }
}
