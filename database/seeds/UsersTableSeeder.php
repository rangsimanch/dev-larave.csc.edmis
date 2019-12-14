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
                'password'       => '$2y$10$ls4qoQQ9X9kA80t4rMubxO0gxjluV5r216IaSEiCTal6Kv2oWnJia',
                'remember_token' => null,
                'approved'       => 1,
                'workphone'      => '',
            ],
        ];

        User::insert($users);
    }
}
