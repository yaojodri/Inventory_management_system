@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Deposit Funds</h2>
    <form action="{{ route('accounts.deposit') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="account_id">Select Account</label>
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
</div>
@endsection

