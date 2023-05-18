<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function create(Account $account)
    {
        return view('transactions.create', compact('account'));
    }

    public function store(Request $request, Account $account)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'type' => 'required',
            'date' => 'required|date',
        ]);

        $transaction = new Transaction();
        $transaction->account_id = $account->id;
        $transaction->amount = $request->input('amount');
        $transaction->type = $request->input('type');
        $transaction->date = $request->input('date');
        $transaction->save();

        // Update the account balance based on transaction type
        if ($transaction->type === 'debit') {
            $account->balance -= $transaction->amount;
        } else {
            $account->balance += $transaction->amount;
        }
        $account->save();

        return redirect()->route('accounts.index')->with('success', 'Transaction added successfully.');
    }
}
