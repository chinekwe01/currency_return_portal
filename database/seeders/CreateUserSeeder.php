<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'User',
               'email'=>'user@chinekwe.co',
               'type'=>0,
               'password'=> bcrypt('asdfasdf'),
            ],
            [
               'name'=>'Super Admin User',
               'email'=>'super-admin@chinekwe.co',
               'type'=>1,
               'password'=> bcrypt('asdfasdf'),
            ],
            [
               'name'=>'Manager User',
               'email'=>'manager@chinekwe.co',
               'type'=> 2,
               'password'=> bcrypt('asdfasdf'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
