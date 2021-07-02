<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
        DB::table('user_groups')->insert([
            'name' => "admin",
            'status' => "1",
            
        ]);
        DB::table('user_groups')->insert([
            'name' => "customer",
            'status' => "0",
            
        ]);
        \Illuminate\Support\Facades\DB::table('introduces')->insert([
            'title'=>'This is introduce about my team',
            'summary'=>'This is summary about my team',
            'image'=>'upload/debug_team.jpg',
            'content'=>'This is content about my team',
            'slug'=> Str::slug('This is introduce about my team','-')
        ]);

    }
}
