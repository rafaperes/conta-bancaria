<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    protected $table = 'transactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user', 'bank_account', 'withdraw', 'deposit',
    ];

    /**
     * Retorna os dados para gerar o gráfico com o histórico de transações dos meses do ano atual.
     *
     * @var array
     */
    public static function transactionHistoric()
    {
        return Transaction::select(
                    DB::raw('SUM(withdraw) as withdraw'),
                    DB::raw('SUM(deposit) as deposit'),
                    DB::raw('MONTH(created_at) as month')
                )->where([
                    [DB::raw('YEAR(created_at)'), date('Y')],
                    ['user', Auth::user()->id],
                ])
                ->groupByRaw('month')
                ->get(); 
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function account()
    {
        return $this->belongsTo(BankAccount::class, 'account', 'id');
    }
}