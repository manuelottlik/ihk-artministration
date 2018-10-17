<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Artministrator",
            'email' => env('APP_ADMIN_EMAIL'),
            'password' => bcrypt(env('APP_ADMIN_PW')),
        ]);
    }
}
