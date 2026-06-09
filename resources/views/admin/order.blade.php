<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
    <meta name="description" content="Admin Dashboard - Manage and approve customer orders for ShopEase." />
    <title>ShopEase Admin | Order Management</title>

    <!-- Google Fonts & Font Awesome -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #ff6600;
            --primary-dark: #e05a00;
            --primary-light: #fff0e6;
            --admin-bg: #f1f5f9;
            --card-bg: #ffffff;
            --sidebar-dark: #0f172a;
            --text-dark: #0f172a;
            --text-muted: #475569;
            --border-light: #e2e8f0;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.08);
            --radius-lg: 1rem;
            --radius-md: 0.75rem;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: var(--admin-bg);
            color: var(--text-dark);
            line-height: 1.5;
        }

        /* dashboard layout */
        .dashboard {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        /* SIDEBAR (admin style) */
        .sidebar {
            width: 280px;
            background: var(--sidebar-dark);
            color: #e2e8f0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            transition: transform 0.3s ease-in-out;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 1.8rem 1.5rem;
            border-bottom: 1px solid #1e293b;
            margin-bottom: 1.5rem;
        }

        .sidebar-header h3 {
            font-size: 1.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: white;
        }

        .sidebar-header h3 i {
            color: var(--primary);
        }

        .sidebar-header p {
            font-size: 0.75rem;
            color: #94a3b8;
            margin-top: 0.5rem;
        }

        .sidebar-nav {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0.8rem 1.5rem;
            margin: 0.3rem 1rem;
            border-radius: 0.75rem;
            color: #cbd5e1;
            text-decoration: none;
            transition: 0.2s;
            font-weight: 500;
        }

        .nav-item i {
            width: 24px;
            font-size: 1.2rem;
        }

        .nav-item.active,
        .nav-item:hover {
            background: rgba(255, 102, 0, 0.15);
            color: var(--primary);
        }

        /* main content */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 1.8rem 2rem 2rem;
            width: calc(100% - 280px);
            transition: margin-left 0.3s ease;
        }

        /* top header */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 2rem;
            background: var(--card-bg);
            padding: 0.8rem 1.5rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
        }

        .page-title h1 {
            font-size: 1.6rem;
            font-weight: 700;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            background: var(--admin-bg);
            padding: 0.4rem 1rem;
            border-radius: 2rem;
        }

        .admin-profile img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* stats cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
            gap: 1.2rem;
            margin-bottom: 2.5rem;
        }

        .stat-card {
            background: var(--card-bg);
            padding: 1.2rem 1.2rem;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-sm);
            border-left: 4px solid var(--primary);
            transition: 0.2s;
        }

        .stat-card h3 {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
            margin-bottom: 0.5rem;
        }

        .stat-number {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--text-dark);
            word-break: break-word;
        }

        /* order table */
        .orders-panel {
            background: var(--card-bg);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            overflow-x: auto;
            width: 100%;
        }

        .panel-header {
            padding: 1.2rem 1.5rem;
            border-bottom: 1px solid var(--border-light);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .filter-group {
            display: flex;
            gap: 0.8rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .filter-group select,
        .filter-group input {
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            border: 1px solid var(--border-light);
            background: white;
            font-family: inherit;
            font-size: 0.85rem;
        }

        .orders-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }

        .orders-table th {
            text-align: left;
            padding: 1rem 1.2rem;
            background: #f8fafc;
            font-weight: 600;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border-light);
            font-size: 0.85rem;
        }

        .orders-table td {
            padding: 1rem 1.2rem;
            border-bottom: 1px solid var(--border-light);
            vertical-align: middle;
            font-size: 0.9rem;
        }

        /* product image styling */
        .product-thumb {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 0.5rem;
            background: #f1f5f9;
            display: block;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #fef3c7;
            color: #b45309;
            padding: 0.25rem 0.75rem;
            border-radius: 2rem;
            font-size: 0.75rem;
            font-weight: 600;
            white-space: nowrap;
        }

        .status-badge.approved {
            background: #d1fae5;
            color: #065f46;
        }

        .status-badge.pending {
            background: #ffedd5;
            color: #9a3412;
        }

        .status-badge.shipped {
            background: #dbeafe;
            color: #1e40af;
        }

        .status-badge.delivered {
            background: #dcfce7;
            color: #166534;
        }

        /* Action forms inside table */
        .action-form {
            display: inline-flex;
            gap: 0.5rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .status-select {
            padding: 0.4rem 0.75rem;
            border-radius: 2rem;
            border: 1px solid var(--border-light);
            background: white;
            font-family: inherit;
            font-size: 0.75rem;
            font-weight: 500;
            cursor: pointer;
        }

        .btn-update {
            background: var(--primary);
            border: none;
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 2rem;
            font-weight: 600;
            font-size: 0.75rem;
            cursor: pointer;
            transition: 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-update:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        /* Mobile menu toggle */
        .mobile-menu-toggle {
            display: none;
            background: var(--primary);
            color: white;
            border: none;
            font-size: 1rem;
            padding: 0.6rem 1.2rem;
            border-radius: 2rem;
            cursor: pointer;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            transition: all 0.2s;
            margin: 1rem 1rem 0 1rem;
            width: fit-content;
        }

        .mobile-menu-toggle:hover {
            background: var(--primary-dark);
        }

        /* Sidebar overlay */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            transition: all 0.3s;
        }

        /* Pure CSS checkbox hack for mobile menu */
        #menu-toggle {
            display: none;
        }

        #menu-toggle:checked~.sidebar-overlay,
        #menu-toggle:checked~.sidebar {
            display: block;
        }

        #menu-toggle:checked~.sidebar {
            transform: translateX(0) !important;
        }

        #menu-toggle:checked~.sidebar-overlay {
            display: block;
        }

        /* ---------- RESPONSIVE CSS ---------- */
        @media (max-width: 1024px) {
            .main-content {
                padding: 1.2rem;
            }
            .stats-grid {
                gap: 1rem;
            }
            .stat-number {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                position: fixed;
                z-index: 1100;
                width: 280px;
                height: 100vh;
                box-shadow: 2px 0 12px rgba(0, 0, 0, 0.15);
            }
            .main-content {
                margin-left: 0 !important;
                width: 100%;
                padding: 1rem;
            }
            .mobile-menu-toggle {
                display: inline-flex !important;
            }
            .top-bar {
                flex-direction: column;
                align-items: flex-start;
                padding: 1rem;
            }
            .page-title h1 {
                font-size: 1.3rem;
            }
            .admin-profile {
                width: 100%;
                justify-content: flex-end;
            }
            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 1rem;
            }
            .stat-card {
                padding: 1rem;
            }
            .stat-number {
                font-size: 1.6rem;
            }
            .panel-header {
                flex-direction: column;
                align-items: stretch;
                gap: 1rem;
                padding: 1rem;
            }
            .filter-group {
                justify-content: flex-start;
                flex-wrap: wrap;
            }
            .orders-table {
                min-width: 900px;
            }
            .product-thumb {
                width: 40px;
                height: 40px;
            }
            .action-form {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
        }

        @media (max-width: 640px) {
            .main-content {
                padding: 0.875rem;
            }
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 0.875rem;
            }
            .stat-number {
                font-size: 1.5rem;
            }
            .page-title h1 {
                font-size: 1.2rem;
            }
            .filter-group {
                flex-direction: column;
                align-items: stretch;
                width: 100%;
            }
            .filter-group select,
            .filter-group input {
                width: 100%;
            }
            .product-thumb {
                width: 35px;
                height: 35px;
            }
        }

        @media (max-width: 480px) {
            .main-content {
                padding: 0.75rem;
            }
            .stat-number {
                font-size: 1.3rem;
            }
            .page-title h1 {
                font-size: 1.1rem;
            }
            .orders-table {
                min-width: 800px;
            }
            .product-thumb {
                width: 32px;
                height: 32px;
            }
        }

        @media (min-width: 769px) {
            .sidebar {
                transform: translateX(0) !important;
                position: fixed;
            }
            .mobile-menu-toggle {
                display: none !important;
            }
            .sidebar-overlay {
                display: none !important;
            }
            .main-content {
                margin-left: 280px;
            }
        }

        .orders-table td:last-child {
            min-width: 180px;
        }
    </style>
</head>

<body>
    <!-- Pure CSS Mobile Menu Toggle - No JavaScript -->
    <input type="checkbox" id="menu-toggle" style="display: none;">
    
    <label for="menu-toggle" class="mobile-menu-toggle">
        <i class="fas fa-bars"></i> Menu
    </label>

    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h3><i class="fas fa-store"></i> ShopEase</h3>
                <p>Admin Control Panel</p>
            </div>
            <nav class="sidebar-nav">
                <a href="#" class="nav-item">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="#" class="nav-item active">
                    <i class="fas fa-envelope"></i> Inquiries
                </a>
                <a href="{{ url('/admin/orders') }}" class="nav-item" id="order-item">
                    <i class="fas fa-shopping-cart"></i> Orders
                </a>
                <a href="#" class="nav-item" id="customer-item">
                    <i class="fas fa-users"></i> Customers
                </a>
                <a href="#" class="nav-item" id="product-item">
                    <i class="fas fa-box"></i> Products
                </a>
                <a href="#" class="nav-item" id="report-item">
                    <i class="fas fa-chart-line"></i> Reports
                </a>
            </nav>
        </aside>

        <!-- Sidebar Overlay (for mobile) -->
        <label for="menu-toggle" class="sidebar-overlay"></label>

        <!-- MAIN CONTENT -->
        <main class="main-content">
            <!-- Success Message Flash (shows after redirect) -->
            @if(session('success'))
            <div style="background: #d1fae5; color: #065f46; padding: 0.875rem 1.25rem; border-radius: 0.75rem; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.75rem; border-left: 4px solid #10b981;">
                <i class="fas fa-check-circle" style="font-size: 1.25rem;"></i>
                <span>{{ session('success') }}</span>
            </div>
            @endif

            @if(session('error'))
            <div style="background: #fee2e2; color: #991b1b; padding: 0.875rem 1.25rem; border-radius: 0.75rem; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.75rem; border-left: 4px solid #ef4444;">
                <i class="fas fa-exclamation-circle" style="font-size: 1.25rem;"></i>
                <span>{{ session('error') }}</span>
            </div>
            @endif

            <div class="top-bar">
                <div class="page-title">
                    <h1><i class="fas fa-clipboard-list" style="color: var(--primary);"></i> Order Management</h1>
                    <p style="font-size: 0.85rem; color: var(--text-muted);">Review and approve customer orders</p>
                </div>
                <div class="admin-profile">
                    <i class="fas fa-bell" style="color: var(--text-muted);"></i>
                    <span>Admin</span>
                    <img src="https://ui-avatars.com/api/?background=ff6600&color=fff&name=Admin" alt="admin">
                </div>
            </div>

            <!-- stats summary -->
            <div class="stats-grid" id="statsGrid">
                <div class="stat-card">
                    <h3>Total Orders</h3>
                    <div class="stat-number" id="totalOrders">{{ $totalOrder ?? 0 }}</div>
                </div>
                <div class="stat-card">
                    <h3>Pending Approval</h3>
                    <div class="stat-number" id="pendingOrders">{{ $pendingOrder ?? 0 }}</div>
                </div>
                <div class="stat-card">
                    <h3>Approved</h3>
                    <div class="stat-number" id="approvedOrders">{{ $approvedOrder ?? 0 }}</div>
                </div>
                <div class="stat-card">
                    <h3>Revenue (Approved)</h3>
                    <div class="stat-number" id="totalRevenue">${{ $total_amount ?? 0 }}</div>
                </div>
            </div>

            <!-- orders table -->
            <div class="orders-panel">
                <div class="panel-header">
                    <h3><i class="fas fa-truck"></i> Recent Orders</h3>
                    <div class="filter-group">
                        <select id="filterStatus">
                            <option value="all">All Orders</option>
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="shipped">Shipped</option>
                            <option value="delivered">Delivered</option>
                        </select>
                        <input type="text" id="searchOrder" placeholder="Search by order ID or customer..." />
                    </div>
                </div>
                <div style="overflow-x: auto;">
                    <table class="orders-table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Products</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Unit price</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="ordersTableBody">
                            @forelse ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->first_name  }} {{ $order->user->last_name  }}</td>
                                <td>{{ $order->title ?? 'Product' }}</td>
                                <td><img src="{{ $order->image }}" alt="product image" class="product-thumb"></td>
                                <td>{{ $order->quantity ?? 1 }}</td>
                                <td>${{ number_format($order->unit_price ?? 0, 2) }}</td>
                                <td>{{ $order->created_at ? $order->created_at->format('Y-m-d') : ($order->date ?? now()->format('Y-m-d')) }}</td>
                                <td>{{$order->status}}</td>
                                <td>
                                    <form action="{{ url('admin/orders/'.$order->id.'/status') }}" method="POST" class="action-form">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" class="status-select">
                                            <option value="" disabled selected>Choose status</option>
                                           <option value="approved" {{ $order->status == 'approved'}}>Approved</option>
                                            <option value="shipped" {{ $order->status == 'shipped'}}>Shipped</option>
                                            <option value="delivered" {{ $order->status == 'delivered'}}>Delivered</option>
                                        </select>
                                        <button type="submit" class="btn-update">
                                            <i class="fas fa-save"></i> Update
                                        </button>
                                    </form>
                                 </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" style="text-align: center; padding: 3rem;">
                                    <i class="fas fa-inbox" style="font-size: 2rem; color: #cbd5e1; margin-bottom: 0.5rem; display: block;"></i>
                                    No orders found
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div style="padding: 1rem; text-align: center; font-size: 0.8rem; color: #64748b;" id="noOrdersMsg"></div>
            </div>
        </main>
    </div>
</body>

</html>