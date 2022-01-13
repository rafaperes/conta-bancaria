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
     * Retorna os dados para popular o gráfico de histórico mensal.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataChart()
    {
        $historic = Transaction::transactionHistoric();

        $result[] = ['Mês','Depósito total', 'Saque total'];
        foreach ($historic as $key => $value) {
            $result[++$key] = [
                Helper::monthName($value->month), 
                $value->deposit, 
                $value->withdraw
            ];
        }

        return response()->json($result);
    }

    /**
     * Retorna view dos gráficos.
     *
     * @return \Illuminate\Http\Response
     */
    public function chart()
    {
        $title = 'Gráficos';
        
        return view('account.chart', compact('title'));
    }

}