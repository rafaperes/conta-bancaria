<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Account;
use App\Transaction;
use App\Helpers\Helper;

class TransactionsController extends Controller
{
    /**
     * Retorna todas as transações realizadas pelo usuários.
     * Filtro para retornar transações em datas específicas.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->date_init) and isset($request->date_final)) {
            $dateInit = $request->date_init . " 00:00:00";
            $dateFinal = $request->date_final . " 23:59:59";

            $transactions = Transaction::where('user', Auth::user()->id)->orderBy('id', 'DESC')->whereBetween('created_at', [$dateInit, $dateFinal])->paginate(15);
        } else {
            $transactions = Transaction::where('user', Auth::user()->id)->orderBy('id', 'DESC')->paginate(15);
        }

        $title = 'Minhas Transações';

        return view('transactions.index', compact('title', 'transactions'));
    }

    /**
     * Retorna form para criar uma nova transação.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Nova transação'; 
        $data = Account::where('user', Auth::user()->id)->first();

        return view('transactions.create', compact('title', 'data'));
    }

    /**
     * Verifica o tipo da transação.
     * Caso seja saque, verifica se o usuário possui saldo para efetuar ação
     * Realização transação
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'value.required' => 'O campo valor é obrigatório.',
        ];

        $request->validate([
            'type' => 'required',
            'value' => 'required',
        ], $messages);

        try {

            DB::beginTransaction();

            $user = Auth::user()->id;
            $account = Account::where('user', $user)->first();

            $value = Helper::formatMoneyDB($request->value);

            $transaction = new Transaction;
            $transaction->user = $user;
            $transaction->account = $account->id;
            $transaction->type = $request->type;

            if ($request->type == 1) {
                $account->balance = $account->balance + $value;
                $transaction->deposit = $value;
            } else if ($request->type == 2) {
                if ($value > $account->balance) {
                    return redirect()->back()->with('error', 'O valor máximo de saque disponível é de R$ ' . $account->balance . ' reais.');
                } else {
                    $account->balance = $account->balance - $value;
                    $transaction->withdraw = $value;
                }
            }

            $account->save();
            $transaction->save();

            DB::commit();

            return redirect()->route('transaction.create')->with('success', 'Transação feita com sucesso.');

        } catch (\Exception $e) {
            //Cancela todas as operações em caso de erro
            DB::rollback();
            return redirect()->route('transaction.create')->with('error', 'Ocorreu um erro.');
        }
    }

}