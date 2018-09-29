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
        $this->call(AdminTableSeeder::class);
        $this->call(SettingTableSeeder::class);
    }
}

class AdminTableSeeder extends Seeder {

    public function run()
    {
        DB::table('admins')->delete();

        App\Admin::create(['username' => 'laxusgee', 'email' => 'ola_leykan@yahoo.com', 'password' => '$2y$10$x6XP5B7Ub1REmJMkPA1d4ulOGMNXE99lPQhQpIUljzyedFAFz9.Cy', 'role' => '0', 'is_active' => 1 ]);
    }

}

class SettingTableSeeder extends Seeder {

    public function run()
    {
        DB::table('settings')->delete();

        App\Setting::create(['name' => 'admin_email', 'value' => 'ola_leykan@yahoo.com', 'is_constant' => 1, 'piority' => 0]);
        App\Setting::create(['name' => 'facebook_url', 'value' => 'http://https://www.facebook.com/Spleetng-279307109260985/', 'is_constant' => 1, 'piority' => 0]);
		App\Setting::create(['name' => 'twitter_url', 'value' => 'http://https://twitter.com/spleetng', 'is_constant' => 1, 'piority' => 0]);
		App\Setting::create(['name' => 'instagram_url', 'value' => 'http://https://www.instagram.com/spleetng/', 'is_constant' => 1, 'piority' => 0]);
        App\Setting::create(['name' => 'address', 'value' => 'Awesome Road, Ikoyi, Lagos.', 'is_constant' => 1, 'piority' => 0]);
        App\Setting::create(['name' => 'phone_no', 'value' => '+234-(0)-7017605038', 'is_constant' => 1, 'piority' => 0]);
    }

}