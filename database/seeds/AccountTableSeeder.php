<?php

use Illuminate\Database\Seeder;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounts = [];
        $accounts[] = [
            'user_id' => '1',
            'name' => 'Admin',
        ];

        if (DB::table('accounts')->count() <= 0) {
            DB::table('accounts')->insert($accounts);
        }
    }
}
