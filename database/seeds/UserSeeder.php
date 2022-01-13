<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Transaction;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'      => 'Teste',
            'email'     => 'teste@mail.com',
            'cpf'       => '12345678911',
            'password'  => bcrypt('12345'),
        ]);

        $account = $user->account()->create([
            'number_account' => 123456,
            'balance'        => 40.00,
            'bank_name'      => 'Larabank',
            'active'         => 1,
        ]);

        $data = [
            ['user' => $user->id, 'account' => $account->id, 'type' => 1, 'withdraw' => '0.00', 'deposit' => '5.00', 'created_at' => '2022-01-13 12:00:00', 'updated_at' => '2022-01-13 12:00:00'],
            ['user' => $user->id, 'account' => $account->id, 'type' => 1, 'withdraw' => '0.00', 'deposit' => '15.00', 'created_at' => '2022-01-13 12:00:00', 'updated_at' => '2022-01-13 12:00:00'],
            ['user' => $user->id, 'account' => $account->id, 'type' => 2, 'withdraw' => '5.00', 'deposit' => '0.00', 'created_at' => '2022-01-13 12:00:00', 'updated_at' => '2022-01-13 12:00:00'],
            ['user' => $user->id, 'account' => $account->id, 'type' => 1, 'withdraw' => '0.00', 'deposit' => '10.00', 'created_at' => '2022-02-13 12:00:00', 'updated_at' => '2022-02-13 12:00:00'],
            ['user' => $user->id, 'account' => $account->id, 'type' => 1, 'withdraw' => '0.00', 'deposit' => '20.00', 'created_at' => '2022-02-13 12:00:00', 'updated_at' => '2022-02-13 12:00:00'],
            ['user' => $user->id, 'account' => $account->id, 'type' => 2, 'withdraw' => '10.00', 'deposit' => '0.00', 'created_at' => '2022-02-13 12:00:00', 'updated_at' => '2022-02-13 12:00:00'],
            ['user' => $user->id, 'account' => $account->id, 'type' => 1, 'withdraw' => '0.00', 'deposit' => '50.00', 'created_at' => '2022-03-13 12:00:00', 'updated_at' => '2022-03-13 12:00:00'],
            ['user' => $user->id, 'account' => $account->id, 'type' => 2, 'withdraw' => '25.00', 'deposit' => '0.00', 'created_at' => '2022-03-13 12:00:00', 'updated_at' => '2022-03-13 12:00:00'],
            ['user' => $user->id, 'account' => $account->id, 'type' => 2, 'withdraw' => '20.00', 'deposit' => '0.00', 'created_at' => '2022-03-13 12:00:00', 'updated_at' => '2022-03-13 12:00:00']
        ];

        Transaction::insert($data);
    }
}
