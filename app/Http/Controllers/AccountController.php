<?php

namespace App\Http\Controllers;

use App\Models\Account;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::all();

        return view('accounts.index', compact('accounts'));
    }
}
