@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<a href="{{ route('transaction.create') }}" class="btn btn-success btn-sm">
    <i class="fas fa-money-check-alt"></i>
    Nova transação
</a>

<div class="row">
    <div class="col-xl-3 col-md-6 mt-3">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Saldo disponível</div>
                        <div class="h5 mb-0 font-weight-bold text-success">R$ {{ Helper::formatMoney($bank->balance) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-uppercase">Minha conta</h6>
            </div>
            <div class="card-body">
                <p> Conta: {{ $bank->number_account }} </p>
                <p> Banco: {{ $bank->bank_name }} </p>
                <p> Abertura da conta: {{ Helper::formatData($bank->created_at) }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-uppercase">Meus dados</h6>
            </div>
            <div class="card-body">
                <p> Nome: {{ $bank->users->name }}</p>
                <p> Email: {{ $bank->users->email }}</p>
                <p> CPF: {{ Helper::format_cpf_cnpj($bank->users->cpf) }}</p>
            </div>
        </div>
    </div>
</div>

@endsection