<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'bishishe@yahoo.com',
            'username'=>'bishisheAdmin',
            'role'=>'admin',
            'status'=>'1',
            'password'=>Hash::make("SwuV8PdsrP7ZjHHF")
        ]);
    }
}
