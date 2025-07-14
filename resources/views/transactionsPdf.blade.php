<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Transaction Report | MoneyFlow</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            color: #1e293b;
            line-height: 1.6;
            padding: 20px;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #6366f1;
        }
        
        .logo {
            font-size: 24px;
            font-weight: 700;
            color: #6366f1;
            display: flex;
            align-items: center;
        }
        
        .logo i {
            margin-right: 10px;
        }
        
        .report-title {
            font-size: 24px;
            font-weight: 600;
            color: #1e293b;
            margin: 0;
        }
        
        .report-date {
            color: #64748b;
            font-size: 14px;
            margin-top: 5px;
        }
        
        .summary-cards {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
        }
        
        .summary-card {
            flex: 1;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }
        
        .income-card {
            background-color: rgba(16, 185, 129, 0.1);
            border-left: 4px solid #10b981;
        }
        
        .expense-card {
            background-color: rgba(239, 68, 68, 0.1);
            border-left: 4px solid #ef4444;
        }
        
        .balance-card {
            background-color: rgba(99, 102, 241, 0.1);
            border-left: 4px solid #6366f1;
        }
        
        .card-title {
            font-size: 14px;
            font-weight: 500;
            color: #64748b;
            margin-bottom: 10px;
        }
        
        .card-value {
            font-size: 20px;
            font-weight: 600;
        }
        
        .income-value {
            color: #10b981;
        }
        
        .expense-value {
            color: #ef4444;
        }
        
        .balance-value {
            color: #6366f1;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 12px;
        }
        
        thead {
            background-color: #6366f1;
            color: white;
        }
        
        th {
            padding: 12px 15px;
            text-align: left;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.5px;
        }
        
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #e2e8f0;
        }
        
        tr:nth-child(even) {
            background-color: #f8fafc;
        }
        
        .income-row {
            color: #10b981;
        }
        
        .expense-row {
            color: #ef4444;
        }
        
        .type-badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 500;
        }
        
        .income-badge {
            background-color: rgba(16, 185, 129, 0.1);
            color: #10b981;
        }
        
        .expense-badge {
            background-color: rgba(239, 68, 68, 0.1);
            color: #ef4444;
        }
        
        .footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #e2e8f0;
            font-size: 11px;
            color: #64748b;
            text-align: center;
        }
        
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <div class="header">
        <div>
            <div class="logo">
                <i>💰</i> MoneyFlow
            </div>
            <div class="report-date">
                Generated on: {{ now()->format('F j, Y \a\t h:i A') }}
            </div>
        </div>
        <h1 class="report-title">Transaction Report</h1>
    </div>
    
    <div class="summary-cards">
        <div class="summary-card income-card">
            <div class="card-title">Total Income</div>
            <div class="card-value income-value">${{ number_format($totalIncome, 2) }}</div>
        </div>
        
        <div class="summary-card expense-card">
            <div class="card-title">Total Expense</div>
            <div class="card-value expense-value">-${{ number_format($totalExpense, 2) }}</div>
        </div>
        
        <div class="summary-card balance-card">
            <div class="card-title">Current Balance</div>
            <div class="card-value balance-value">${{ number_format($balance, 2) }}</div>
        </div>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Description</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $index => $transaction)
            <tr class="{{ $transaction->transaction_type === 'income' ? 'income-row' : 'expense-row' }}">
                <td>{{ $index + 1 }}</td>
                <td>{{ $transaction->description }}</td>
                <td>
                    <span class="type-badge {{ $transaction->transaction_type === 'income' ? 'income-badge' : 'expense-badge' }}">
                        {{ ucfirst($transaction->transaction_type) }}
                    </span>
                </td>
                <td>
                    {{ $transaction->transaction_type === 'income' 
                        ? '+$' . number_format($transaction->amount, 2) 
                        : '-$' . number_format($transaction->amount, 2) }}
                </td>
                <td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('M j, Y - h:i A') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="footer">
        <p>© {{ date('Y') }} MoneyFlow. All rights reserved.</p>
        <p>This report was generated automatically. For any questions, please contact support.</p>
    </div>
</body>
</html> 