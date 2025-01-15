<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index() {
        $user = Auth::user();
    
        if (!$user) {
            // Handle unauthenticated access
            return redirect()->route('login')->withErrors(['You need to log in first.']);
        }
    
        $accounts = $user->accounts;
        return view('accounts.index', compact('accounts'));
    }
    
    public function show($id) {
        $account = Account::findOrFail($id);
        return view('accounts.show', compact('account'));
    }
    

    public function create() {
        return view('accounts.create');
    }

    public function store(Request $request) {
        $request->validate([
            'account_number' => 'required|unique:accounts',
            'balance' => 'required|numeric',
        ]);

        Auth::user()->accounts()->create($request->all());
        return redirect()->route('accounts.index');
    }

    public function deposit(Request $request) {

        $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'amount' => 'required|numeric|min:0.01',
        ]);


    $account = Account::find($request->account_id);
    $account->balance += $request->amount;
    $account->save();

       // Record the transaction
       Transaction::create([
        'account_id' => $account->id,
        'type' => 'credit',
        'amount' => $request->amount,
    ]);
    
    return redirect()->route('accounts.index')->with('success', 'Deposit successful.');
    
}


public function withdraw(Request $request) {
    $request->validate([
        'account_id' => 'required|exists:accounts,id',
        'amount' => 'required|numeric|min:0.01',
    ]);

    $account = Account::find($request->account_id);

    if ($account->balance < $request->amount) {
        return back()->withErrors(['Insufficient funds in the account.']);
    }

    $account->balance -= $request->amount;
    $account->save();

    // Record the transaction
    Transaction::create([
        'account_id' => $account->id,
        'type' => 'debit',
        'amount' => $request->amount,
    ]);

    return redirect()->route('accounts.index')->with('success', 'Withdrawal successful.');
}
}
