@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Accounts</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Account Number</th>
                <th>Balance</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($accounts as $account)
                <tr>
                    <td>{{ $account->account_number }}</td>
                    <td>{{ $account->balance }}</td>
                    <td>
                        <a href="{{ route('accounts.show', $account) }}" class="btn btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('transfer') }}" class="btn btn-primary">Transfer Funds</a>
    <a href="{{ route('deposit') }}" class="btn btn-success">Deposit Funds</a>
    <a href="{{ route('withdraw') }}" class="btn btn-danger">Withdraw Funds</a>
    <a href="{{ route('accounts.show') }}">View Details</a>

</div>
@endsection


 <!-- $account->id -->