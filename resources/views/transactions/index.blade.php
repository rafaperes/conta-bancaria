@extends('layouts.app')

@section('title', $title)

@section('content')

<div class="card shadow my-3">
    <div class="card-header bg-secondary py-3">
        <h6 class="m-0 font-weight-bold text-white text-uppercase">Filtrar transações</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('transactions') }}" method="GET">

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Data de início:</label>
                    <input type="date" name="date_init" id="date_init" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label for="">Data final:</label>
                    <input type="date" name="date_final" id="date_final" class="form-control">
                </div>
            </div>

            <a href="{{ route('transactions') }}" class="btn btn-danger btn-sm">Limpar</a>
            <input type="submit" class="btn btn-success btn-sm" value="Filtrar">

        </form>
    </div>
</div>
@if ($transactions->count() === 0)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fas fa-exclamation-triangle"></i>
    Nenhuma transação foi encontrada.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@else
<div class="row">
    @foreach ($transactions as $transaction)
    <div class="col-md-4">
        <div class="card shadow my-3">
            @if ($transaction->type == 1)
            <div class="card-header bg-success py-3">
                <h6 class="m-0 font-weight-bold text-white text-uppercase">
                    {{ Helper::typeTransaction($transaction->type) }}
                </h6>
            </div>
            <div class="card-body">
                <p class="m-0">Valor: R$ {{ Helper::formatMoney($transaction->deposit) }}</p>
                <p class="m-0">Data: {{ Helper::formatData($transaction->created_at) }}</p>
            </div>
            @else
            <div class="card-header bg-danger py-3">
                <h6 class="m-0 font-weight-bold text-white text-uppercase">
                    {{ Helper::typeTransaction($transaction->type) }}
                </h6>
            </div>
            <div class="card-body">
                <p class="m-0">Valor: R$ {{ Helper::formatMoney($transaction->withdraw) }}</p>
                <p class="m-0">Data: {{ Helper::formatData($transaction->created_at) }}</p>
            </div>
            @endif
        </div>
    </div>
    @endforeach
</div>
@endif

{{ $transactions->links() }}

@endsection