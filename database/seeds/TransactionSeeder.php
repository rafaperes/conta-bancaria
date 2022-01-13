<?php

use Illuminate\Database\Seeder;
use App\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            ['user' => 1, 'account' => 1, 'type' => 1, 'withdraw' => '0.00', 'deposit' => '5.00', 'created_at' => '2022-01-13 12:00:00', 'updated_at' => '2022-01-13 12:00:00'],
            ['user' => 1, 'account' => 1, 'type' => 1, 'withdraw' => '0.00', 'deposit' => '15.00', 'created_at' => '2022-01-13 12:00:00', 'updated_at' => '2022-01-13 12:00:00'],
            ['user' => 1, 'account' => 1, 'type' => 2, 'withdraw' => '5.00', 'deposit' => '0.00', 'created_at' => '2022-01-13 12:00:00', 'updated_at' => '2022-01-13 12:00:00'],
            ['user' => 1, 'account' => 1, 'type' => 1, 'withdraw' => '0.00', 'deposit' => '10.00', 'created_at' => '2022-02-13 12:00:00', 'updated_at' => '2022-02-13 12:00:00'],
            ['user' => 1, 'account' => 1, 'type' => 1, 'withdraw' => '0.00', 'deposit' => '20.00', 'created_at' => '2022-02-13 12:00:00', 'updated_at' => '2022-02-13 12:00:00'],
            ['user' => 1, 'account' => 1, 'type' => 2, 'withdraw' => '10.00', 'deposit' => '0.00', 'created_at' => '2022-02-13 12:00:00', 'updated_at' => '2022-02-13 12:00:00'],
            ['user' => 1, 'account' => 1, 'type' => 1, 'withdraw' => '0.00', 'deposit' => '50.00', 'created_at' => '2022-03-13 12:00:00', 'updated_at' => '2022-03-13 12:00:00'],
            ['user' => 1, 'account' => 1, 'type' => 2, 'withdraw' => '25.00', 'deposit' => '0.00', 'created_at' => '2022-03-13 12:00:00', 'updated_at' => '2022-03-13 12:00:00'],
            ['user' => 1, 'account' => 1, 'type' => 2, 'withdraw' => '25.00', 'deposit' => '0.00', 'created_at' => '2022-03-13 12:00:00', 'updated_at' => '2022-03-13 12:00:00']
        ];

        Transaction::insert($data);
    }
}
