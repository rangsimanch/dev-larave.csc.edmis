<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$mO9tStrUQlHdKLHGrBisr.AJfUp/fYBzmGMsnu35d72t0txW2G3BC',
                'remember_token' => null,
                'approved'       => 1,
                'workphone'      => '',
            ],
        ];

        User::insert($users);
    }
}
