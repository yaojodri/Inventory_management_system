<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction; // Make sure this is imported

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     $accounts = Auth::user()->accounts;
    //     $transactions = Auth::user()->accounts->flatMap->transactions; // Get transactions related to the user's accounts
    //     return view('home', compact('accounts', 'transactions'));
    // }
}

