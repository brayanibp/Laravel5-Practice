<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        // php artisan db:seed
        DB::table('users')->insert([
            'name' => 'Brayan Bernal',
            'email' => 'manolo27093430@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
