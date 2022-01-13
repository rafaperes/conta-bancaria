<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\user\StoreUserRequest;
use App\User;
use App\Account;
use App\Helpers\Helper;

class UserController extends Controller
{
    /**
     * Retorna view para criar uma nova conta.
     *
     */
    public function create()
    {
        $title = 'Criar conta';
        return view('account.create', compact('title'));
    }

    /**
     * Cria um novo usuário e conta.
     *
     * @param  App\Http\Requests\user\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        try {

            DB::beginTransaction();

            $user = new User;
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->password = bcrypt($request->password);
            $user->cpf      = Helper::onlyNumbers($request->cpf);
            $user->save();

            $account = new Account;
            $account->user           = $user->id;
            $account->number_account = mt_Rand(100000,999999);
            $account->balance        = 0.00;
            $account->bank_name      = 'Larabank';
            $account->active         = 1;
            $account->save();

            DB::commit();

            return redirect()->route('login')->with('success', 'Uusário criado com sucesso.');

        } catch (\Exception $e) {
            //Cancela todas as operações em caso de erro
            DB::rollback();
            return redirect()->route('create.account')->with('error', 'Ocorreu um erro.');
        }
    }
}
