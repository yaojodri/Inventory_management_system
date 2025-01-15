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
    <a href="{{ route('accounts.show') }}">View Details</a>

</div>

        <div class="col-md-10 offset-md-2 main-content" id="main-content">
            <div class="toggle-btn" id="toggle-btn">☰</div>

            <h2>Transfer Funds</h2>
            <form action="{{ route('transfer.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="from_account">From Account</label>
                    <select name="from_account" id="from_account" class="form-control">
    @forelse($accounts as $account)
        <option value="{{ $account->id }}">{{ $account->account_number }} - Balance: {{ $account->balance }}</option>
    @empty
        <option value="">No accounts available</option>
    @endforelse
</select>

                </div>
                <div class="form-group">
                    <label for="to_account">To Account</label>
                    <input type="text" name="to_account" id="to_account" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" id="amount" class="form-control" step="0.01" required>
                </div>
                <button type="submit" class="btn btn-primary">Transfer</button>
            </form>

            <h2>Deposit Funds</h2>
            <form action="{{ route('deposit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="account_id">Account</label>
                    <select name="account_id" id="account_id" class="form-control">
                        @foreach($accounts as $account)
                            <option value="{{ $account->id }}">{{ $account->account_number }} - Balance: {{ $account->balance }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" id="amount" class="form-control" step="0.01" required>
                </div>
                <button type="submit" class="btn btn-primary">Deposit</button>
            </form>

            <h2>Withdraw Funds</h2>
            <form action="{{ route('withdraw') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="account_id">Account</label>
                    <select name="account_id" id="account_id" class="form-control">
                        @foreach($accounts as $account)
                            <option value="{{ $account->id }}">{{ $account->account_number }} - Balance: {{ $account->balance }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" id="amount" class="form-control" step="0.01" required>
                </div>
                <button type="submit" class="btn btn-primary">Withdraw</button>
            </form>
        </div>
    </div>
</div>
@endsection
