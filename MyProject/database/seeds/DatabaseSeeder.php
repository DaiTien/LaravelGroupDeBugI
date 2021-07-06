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
            'lastname'  => "admin",
            'firstname' => "admin",
            'group_id' => "1",
            'email'     => 'admin@gmail.com',
            'password'  => Hash::make('12345'),
        ]);
        DB::table('user_groups')->insert([
            'name'   => "admin",
            'status' => "1",

        ]);
        DB::table('user_groups')->insert([
            'name'   => "customer",
            'status' => "0",

        ]);
        DB::table('introduces')->insert([
            'title'   => 'This is introduce about my team',
            'summary' => 'This is summary about my team',
            'image'   => 'upload/debug_team.jpg',
            'content' => 'This is content about my team',
            'slug'    => Str::slug('This is introduce about my team', '-')
        ]);

        //price ticker
        DB::table('price_tickets')->insert([
            'name'  => "Người lớn",
            'price' => "60000",

        ]);
        DB::table('price_tickets')->insert([
            'name'  => "Trẻ em",
            'price' => "30000",

        ]);
        DB::table('price_tickets')->insert([
            'name'  => "HS-SV",
            'price' => "45000",

        ]);
    }
}
