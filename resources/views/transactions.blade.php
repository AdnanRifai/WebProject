<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <title>Transactions | MoneyFlow</title>
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
        
        .nav-link.active {
            position: relative;
        }
        
        .nav-link.active:after {
            content: '';
            position: absolute;
            left: 0.75rem;
            right: 0.75rem;
            bottom: 5px;
            height: 3px;
            background-color: white;
            border-radius: 3px;
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }
        
        .table-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
        }
        
        .table th {
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            padding: 1rem 1.5rem;
        }
        
        .table td {
            padding: 1rem 1.5rem;
            vertical-align: middle;
        }
        
        .table-hover tbody tr {
            transition: all 0.2s ease;
        }
        
        .table-hover tbody tr:hover {
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        .badge-income {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
            padding: 0.5rem 0.75rem;
            border-radius: 8px;
            font-weight: 500;
        }
        
        .badge-expense {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
            padding: 0.5rem 0.75rem;
            border-radius: 8px;
            font-weight: 500;
        }
        
        .balance-card {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .balance-amount {
            font-size: 2rem;
            font-weight: 700;
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
        
        .empty-state {
            padding: 3rem;
            text-align: center;
        }
        
        .empty-state i {
            font-size: 3rem;
            color: var(--gray);
            margin-bottom: 1rem;
        }
        
        .btn-outline-light {
            border-radius: 8px;
            font-weight: 500;
        }
        
        .btn-outline-light:hover {
            background-color: white;
            color: var(--primary) !important;
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
                        <a class="nav-link" href="{{url('dashboard')}}">
                            <i class="bi bi-speedometer2 me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('showTransaction')}}">
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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="section-title mb-0">
                <i class="bi bi-list-check me-2"></i> Transaction History
            </h3>
            <div class="d-flex">
                <a href="{{ url('export-transactions') }}" class="btn btn-primary me-2">
                    <i class="bi bi-download me-1"></i> Export
                </a>
            </div>
        </div>
        
        <div class="balance-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="mb-2 opacity-75">Current Balance</h6>
                    <h2 class="balance-amount mb-0">${{ number_format($balance, 2) }}</h2>
                </div>
                <div class="text-end">
                    <h6 class="mb-2 opacity-75">Total Transactions</h6>
                    <h4 class="mb-0">{{ $transactions->count() }}</h4>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-header">
                        <tr>
                            <th style="width: 50px;">#</th>
                            <th>Description</th>
                            <th style="width: 120px;">Type</th>
                            <th style="width: 150px;">Amount</th>
                            <th style="width: 180px;">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $index => $transaction)
                        <tr>
                            <td class="fw-bold">{{ $index + 1 }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="icon-container me-3">
                                        @if($transaction->transaction_type === 'income')
                                        <i class="bi bi-arrow-down-circle text-success"></i>
                                        @else
                                        <i class="bi bi-arrow-up-circle text-danger"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <h6 class="mb-0">{{ $transaction->description }}</h6>
                                        <small class="text-muted">{{ $transaction->category ?? 'Uncategorized' }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="{{ $transaction->transaction_type === 'income' ? 'badge-income' : 'badge-expense' }}">
                                    {{ ucfirst($transaction->transaction_type) }}
                                </span>
                            </td>
                            <td class="fw-bold {{ $transaction->transaction_type === 'income' ? 'text-success' : 'text-danger' }}">
                                {{ $transaction->transaction_type === 'income' ? '+' : '-' }}${{ number_format($transaction->amount, 2) }}
                            </td>
                            <td>
                                <div class="d-flex flex-column">
                                    <span>{{\Carbon\Carbon::parse($transaction->created_at)->format('d M Y')}}</span>
                                    <small class="text-muted">{{\Carbon\Carbon::parse($transaction->created_at)->format('h:i A')}}</small>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">
                                <div class="empty-state">
                                    <i class="bi bi-wallet2"></i>
                                    <h5 class="mb-2">No Transactions Found</h5>
                                    <p class="text-muted">Start by adding your first transaction</p>
                                    <a href="{{url('dashboard')}}" class="btn btn-primary mt-2">
                                        <i class="bi bi-plus-circle me-1"></i> Add Transaction
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        @if($transactions->hasPages())
        <div class="d-flex justify-content-center mt-4">
            <nav>
                <ul class="pagination">
                    @if($transactions->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">Previous</span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $transactions->previousPageUrl() }}">Previous</a>
                    </li>
                    @endif

                    @foreach(range(1, $transactions->lastPage()) as $i)
                    <li class="page-item {{ $transactions->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="{{ $transactions->url($i) }}">{{ $i }}</a>
                    </li>
                    @endforeach

                    @if($transactions->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $transactions->nextPageUrl() }}">Next</a>
                    </li>
                    @else
                    <li class="page-item disabled">
                        <span class="page-link">Next</span>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
        @endif
    </div>

    <footer class="bg-white py-4 mt-5">
        <div class="container text-center text-muted">
            <p class="mb-0">© 2023 MoneyFlow. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>
    <script>
        // Simple animation for table rows when page loads
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach((row, index) => {
                setTimeout(() => {
                    row.style.opacity = '1';
                    row.style.transform = 'translateX(0)';
                }, index * 50);
            });
        });
    </script>
</body>

</html>