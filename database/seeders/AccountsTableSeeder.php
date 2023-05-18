<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounts = [
            ['name' => 'Account 1', 'balance' => 1000.00],
            ['name' => 'Account 2', 'balance' => 500.00],
            ['name' => 'Account 3', 'balance' => 250.00],
            ['name' => 'Account 4', 'balance' => 1500.00],
            ['name' => 'Account 5', 'balance' => 750.00],
        ];

        DB::table('accounts')->insert($accounts);
    }
}
