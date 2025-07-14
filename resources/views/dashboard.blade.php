<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <title>MoneyFlow | Financial Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --primary-light: #818cf8;
            --primary-dark: #4f46e5;
            --success: #10b981;
            --danger: #ef4444;
            --dark: #1e293b;
            --light: #f8fafc;
            --gray: #94a3b8;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f1f5f9;
            color: var(--dark);
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand, .nav-link {
            color: white !important;
            font-weight: 600;
        }
        
        .navbar-brand {
            font-size: 1.5rem;
            display: flex;
            align-items: center;
        }
        
        .navbar-brand i {
            margin-right: 10px;
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            font-weight: 600;
            padding: 1rem 1.5rem;
        }
        
        .balance-card {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
        }
        
        .balance-card .card-header {
            background-color: transparent;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
        }
        
        .balance-amount {
            font-size: 2.5rem;
            font-weight: 700;
        }
        
        .transaction-item {
            border-left: 4px solid;
            margin-bottom: 0.75rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .transaction-item:hover {
            transform: translateX(5px);
        }
        
        .income-item {
            border-left-color: var(--success);
        }
        
        .expense-item {
            border-left-color: var(--danger);
        }
        
        .badge-income {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }
        
        .badge-expense {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid #e2e8f0;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 0.25rem rgba(99, 102, 241, 0.25);
        }
        
        .btn-primary {
            background-color: var(--primary);
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        .btn-see-more {
            background-color: transparent;
            color: var(--primary);
            border: 1px solid var(--primary);
            border-radius: 8px;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }
        
        .btn-see-more:hover {
            background-color: var(--primary);
            color: white;
        }
        
        .section-title {
            position: relative;
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--primary-light));
            border-radius: 2px;
        }
        
        .stat-card {
            display: flex;
            align-items: center;
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 1.5rem;
        }
        
        .income-icon {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }
        
        .expense-icon {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-cash-stack"></i> MoneyFlow
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('dashboard')}}">
                            <i class="bi bi-speedometer2 me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('showTransaction')}}">
                            <i class="bi bi-list-check me-1"></i> Transactions
                        </a>
                    </li>
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                        <form action="{{ url('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm">
                                <i class="bi bi-box-arrow-right me-1"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <h3 class="section-title">Dashboard Overview</h3>
        
        <div class="row g-4 mb-4">
            <div class="col-md-6 col-lg-4">
                <div class="card balance-card">
                    <div class="card-header d-flex align-items-center">
                        <i class="bi bi-wallet2 me-2"></i>
                        <h5 class="card-title mb-0">Account Balance</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h2 class="balance-amount mb-0">${{ number_format($balance, 2) }}</h2>
                            <span class="badge bg-white text-primary ms-3">
                                <i class="bi bi-arrow-up-circle-fill me-1"></i> 2.5%
                            </span>
                        </div>
                        <p class="mt-2 mb-0 opacity-75">Your current available balance</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body stat-card">
                        <div class="stat-icon income-icon">
                            <i class="bi bi-arrow-down-circle"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Total Income</h6>
                            <h4 class="mb-0 text-success">${{ number_format($totalIncome, 2) }}</h4>
                            <small class="text-muted">+12% from last month</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body stat-card">
                        <div class="stat-icon expense-icon">
                            <i class="bi bi-arrow-up-circle"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Total Expenses</h6>
                            <h4 class="mb-0 text-danger">${{ number_format($totalExpense, 2) }}</h4>
                            <small class="text-muted">+5% from last month</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="bi bi-clock-history me-2"></i> Recent Transactions
                        </h5>
                        <a href="{{ url('showTransaction') }}" class="btn btn-sm btn-see-more">View All</a>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            @foreach($transactions->take(5) as $transaction)
                            <div class="list-group-item transaction-item {{ $transaction->transaction_type == 'income' ? 'income-item' : 'expense-item' }}">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">{{ $transaction->description }}</h6>
                                        <small class="text-muted">{{ $transaction->created_at->format('M d, Y h:i A') }}</small>
                                    </div>
                                    <span class="badge {{ $transaction->transaction_type == 'income' ? 'badge-income' : 'badge-expense' }} p-2">
                                        {{ $transaction->transaction_type == 'income' ? '+' : '-' }}${{ number_format($transaction->amount, 2) }}
                                    </span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="bi bi-plus-circle me-2"></i> Add Transaction
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('transactionData') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="transactionType" class="form-label">Type</label>
                                <select class="form-select" id="transactionType" name="transactionType" required>
                                    <option value="income">Income</option>
                                    <option value="expense">Expense</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="amount" name="amount" 
                                           placeholder="0.00" step="0.01" min="0" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    placeholder="What's this for?" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-1"></i> Add Transaction
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-white py-4 mt-5">
        <div class="container text-center text-muted">
            <p class="mb-0">© 2023 MoneyFlow. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>
    <script>
        // Simple animation for cards when page loads
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
</body>

</html>