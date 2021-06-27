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
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'lastname' => "admin",
            'firstname' => "",
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345'),
        ]);
    }
}
