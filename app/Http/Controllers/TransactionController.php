<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionModel;
use Barryvdh\DomPDF\Facade\Pdf;

class TransactionController extends Controller
{
    public function index()
    {
        // Ambil semua transaksi, urut dari yang terbaru
        $transactions = TransactionModel::orderBy('created_at', 'desc')->get();

        // Hitung saldo user
        $balance = $transactions->where('transaction_type', 'income')->sum('amount') 
                 - $transactions->where('transaction_type', 'expense')->sum('amount');

        // Kirim data ke view
        return view('transactions.index', [
            'transactions' => $transactions,
            'balance' => $balance,
        ]);
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'transactionType' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0',
            'description' => 'required|string|max:255',
        ]);

        // Create a new transaction
        TransactionModel::create([
            'transaction_type' => $request->transactionType,
            'amount' => $request->amount,
            'description' => $request->description,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Transaction added successfully!');
    }

    public function showTransaction()
    {
        $transactions = \App\Models\TransactionModel::orderBy('created_at', 'desc')->paginate(10); 

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

        return view('transactions', [
            'transactions' => $transactions,
            'balance' => $balance,
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
        ]);
    }

    public function exportPdf()
    {
        $transactions = TransactionModel::orderBy('created_at', 'desc')->get();

        $totalIncome = $transactions->where('transaction_type', 'income')->sum('amount');
        $totalExpense = $transactions->where('transaction_type', 'expense')->sum('amount');
        $balance = $totalIncome - $totalExpense;

        $pdf = Pdf::loadView('transactionsPdf', compact('transactions', 'totalIncome', 'totalExpense', 'balance'));
        return $pdf->download('transactions.pdf');
    }
}
