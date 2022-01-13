<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Account;
use App\Transaction;
use App\Helpers\Helper;

class AccountsController extends Controller
{

    /**
     * Retorna os dados da conta e dados pessoais do usuário.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Home';
        $bank = Account::where('user', Auth::user()->id)->first();
        
        return view('account.index', compact('title', 'bank'));
    }

    /**
     * Gráficos com dados sobre a conta.
     *
     * @return \Illuminate\Http\Response
     */
    public function chart()
    {
        $title = 'Gráficos';
        $historic = Transaction::transactionHistoric();

        $result[] = ['Mês','Depósito total', 'Saque total'];
        foreach ($historic as $key => $value) {
            $result[++$key] = [
                Helper::monthName($value->month), 
                $value->deposit, 
                $value->withdraw
            ];
        }

        $result = json_encode($result);
        
        return view('account.chart', compact('title', 'result'));
    }

}
