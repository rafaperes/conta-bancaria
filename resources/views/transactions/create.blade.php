@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<a href="{{ route('account') }}" class="btn btn-primary btn-sm mb-3">
    <i class="fas fa-caret-left"></i>
    Voltar
</a>

@component('alerts/alert')

@endcomponent

<div class="card shadow mt-3">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-uppercase">{{ $title }}</h6>
    </div>
    <div class="card-body">


        <p class="badge badge-success">Saldo disponível: {{ Helper::formatMoney($data->balance) }}</p>

        <form action="{{ route('transaction.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="">Tipo de transação:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" id="inlineRadio1"
                        value="1" required>
                    <label class="form-check-label" for="inlineRadio1">Depósito</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" id="inlineRadio2"
                        value="2">
                    <label class="form-check-label" for="inlineRadio2">Saque</label>
                </div>
            </div>

            <div class="form-group">
                <label for="">Valor</label>
                <input type="text" name="value" class="form-control money" placeholder="Valor" required>
            </div>

            <input type="submit" class="btn btn-success" value="Confirmar">

        </form>

    </div>
</div>
@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
@endpush