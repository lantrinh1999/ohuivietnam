<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [];
        $users[] = [
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'refferal_code' => 'ohuivietnam',
            'point_reward' => 500000,
            'role' => 500,
            'status' => 1,
        ];

        if (DB::table('users')->count() <= 0) {
            DB::table('users')->insert($users);
        }
    }
}
