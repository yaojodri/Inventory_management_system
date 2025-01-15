@extends('layouts.app')

@section('content')
<div class="container">

<div class="row">
<div class="col-md-2 sidebar" id="sidebar">
    <h2>Menu</h2>
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('transactions') }}">Transactions</a>
    <a href="{{ route('transfer') }}">Transfer Funds</a>
    <a href="{{ route('accounts.deposit') }}">Deposit Funds</a>
    <a href="{{ route('accounts.withdraw') }}">Withdraw Funds</a>
    <a href="{{ route('profile') }}">Profile</a>
</div>

        <div class="col-md-10 offset-md-2 main-content" id="main-content">
            <div class="toggle-btn" id="toggle-btn">☰</div>


    <h2>Transactions</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Type</th>
                <th>Amount</th>
                <th>Account</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->type }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->account->account_number }}</td>
                    <td>{{ $transaction->created_at->format('d/m/Y H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
