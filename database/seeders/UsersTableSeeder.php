<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name'=>'lama',
        'email'=>'lama@gmail.com',
        'password'=>'Lama@123',
        'phone'=>'0799',
        'gender'=>'female',
        'role'=>'admin',
               
        ]); 
    }
}
