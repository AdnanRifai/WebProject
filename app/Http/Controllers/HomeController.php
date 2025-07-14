<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionModel;


class HomeController extends Controller
{
    public function  dashboard()
    {
       $transactions = \App\Models\TransactionModel::orderBy('created_at', 'desc')->get();

        // Total income
        $totalIncome = $transactions
            ->where('transaction_type', 'income')
            ->sum('amount');

        // Total expense
        $totalExpense = $transactions
            ->where('transaction_type', 'expense')
            ->sum('amount');

        // Saldo akhir
        $balance = $totalIncome - $totalExpense;

        return view('dashboard', [
            'transactions' => $transactions,
            'balance' => $balance,
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
        ]);
    }
}
