<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
    <meta name="description" content="ShopEase Admin - Dynamic inquiry routing and support controls." />
    <title>ShopEase Admin | Customer Inquiries</title>
    
    <!-- Google Fonts & Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    
    <style>
        /* ============================================
           RESET & GLOBAL STYLES
        ============================================ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #ff6600;
            --primary-dark: #e05a00;
            --primary-light: #ffefe5;
            --primary-gradient: linear-gradient(135deg, #ff6600 0%, #ff9944 100%);
            --secondary: #2c3e66;
            --dark: #1a1f2c;
            --gray-dark: #2d3748;
            --gray: #4a5568;
            --gray-light: #edf2f7;
            --bg-light: #f8fafc;
            --white: #ffffff;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --info: #3b82f6;
            --shadow-xs: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
            --radius-sm: 0.5rem;
            --radius: 0.75rem;
            --radius-lg: 1rem;
            --radius-xl: 1.5rem;
            --transition-fast: 0.15s ease;
            --transition: 0.25s ease;
            --transition-slow: 0.3s ease;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', sans-serif;
            background: var(--bg-light);
            color: var(--dark);
            line-height: 1.5;
            overflow-x: hidden;
        }

        /* ============================================
           ADMIN CONTAINER LAYOUT
        ============================================ */
        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        /* ============================================
           SIDEBAR - Modern Dark Theme
        ============================================ */
        .sidebar {
            width: 280px;
            background: linear-gradient(145deg, #0a1a2a 0%, #0f2a3a 100%);
            color: #e2e8f0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            transition: transform var(--transition-slow);
            z-index: 1000;
        }

        .sidebar-header {
            padding: 1.8rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            background: linear-gradient(90deg, rgba(255, 102, 0, 0.1), transparent);
        }

        .sidebar-header h3 {
            font-size: 1.6rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            background: linear-gradient(135deg, #fff, var(--primary));
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }

        .sidebar-header h3 i {
            color: var(--primary);
            margin-right: 8px;
            background: none;
            background-clip: unset;
            -webkit-background-clip: unset;
        }

        .sidebar-header p {
            font-size: 0.7rem;
            opacity: 0.6;
            margin-top: 0.4rem;
            letter-spacing: 0.5px;
        }

        .sidebar-nav {
            padding: 1.2rem 0;
        }

        .nav-item {
            padding: 0.85rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: var(--transition-fast);
            font-weight: 500;
            cursor: pointer;
            margin: 0.2rem 0.8rem;
            border-radius: var(--radius);
        }

        .nav-item:hover {
            background: rgba(255, 102, 0, 0.12);
            color: var(--primary);
            transform: translateX(4px);
        }

        .nav-item.active {
            background: linear-gradient(90deg, rgba(255, 102, 0, 0.2), transparent);
            color: var(--primary);
            border-left: 3px solid var(--primary);
        }

        .nav-item i {
            width: 24px;
            font-size: 1.1rem;
            text-align: center;
        }

        /* ============================================
           MAIN CONTENT AREA
        ============================================ */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 1.8rem;
            transition: margin-left var(--transition-slow);
            width: calc(100% - 280px);
        }

        /* ============================================
           TOP BAR / HEADER
        ============================================ */
        .top-bar {
            background: var(--white);
            padding: 1rem 1.8rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            border: 1px solid rgba(0, 0, 0, 0.03);
        }

        .page-title h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .admin-info {
            display: flex;
            align-items: center;
            gap: 1rem;
            background: var(--bg-light);
            padding: 0.4rem 1rem;
            border-radius: 2.5rem;
        }

        .admin-avatar {
            width: 40px;
            height: 40px;
            background: var(--primary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: var(--transition-fast);
            border: none;
        }

        /* ============================================
           STATISTICS CARDS
        ============================================ */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--white);
            padding: 1.4rem 1.6rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            transition: all var(--transition);
            border: 1px solid rgba(0, 0, 0, 0.02);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--primary);
            border-radius: 4px 0 0 4px;
        }

        .stat-card h3 {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: var(--gray);
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .stat-number {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--dark);
            line-height: 1.2;
        }

        .stat-card.active-prod::before { background: var(--success); }
        .stat-card.low-stock::before { background: var(--warning); }
        .stat-card.out-stock::before { background: var(--danger); }

        /* ============================================
           PANEL AND CONTROLS
        ============================================ */
        .products-panel {
            background: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            border: 1px solid rgba(0, 0, 0, 0.04);
        }

        .panel-header {
            padding: 1.2rem 1.5rem;
            border-bottom: 1px solid var(--gray-light);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .panel-header h3 {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .action-bar {
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .search-input {
            padding: 0.5rem 1.2rem;
            border-radius: 2rem;
            border: 1px solid var(--gray-light);
            background: var(--bg-light);
            font-family: inherit;
            font-size: 0.85rem;
            width: 280px;
            transition: var(--transition-fast);
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary);
            background: var(--white);
        }

        /* ============================================
           TABLE STYLES (Structured Like Products)
        ============================================ */
        .table-container {
            overflow-x: auto;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 950px;
        }

        th {
            padding: 1rem 1.2rem;
            text-align: left;
            background: #fafbfc;
            font-weight: 600;
            color: var(--gray-dark);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1.5px solid var(--gray-light);
        }

        td {
            padding: 1rem 1.2rem;
            text-align: left;
            border-bottom: 1px solid var(--gray-light);
            vertical-align: middle;
            font-size: 0.9rem;
        }

        tr { transition: background var(--transition-fast); }
        tr:hover { background: #fefef8; }
        tr:last-child td { border-bottom: none; }

        /* Media Column styling modeled directly after Product Item Details */
        .product-media {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .product-thumbnail {
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: var(--radius-sm);
            background: var(--primary-light);
            color: var(--primary);
            border: 1px solid var(--gray-light);
            font-size: 1.1rem;
        }

        .product-title {
            font-weight: 600;
            color: var(--dark);
        }

        /* ============================================
           BADGES
        ============================================ */
        .badge {
            padding: 0.3rem 0.9rem;
            border-radius: 2rem;
            font-size: 0.7rem;
            font-weight: 700;
            display: inline-block;
            letter-spacing: 0.3px;
        }

        /* Status colors mapping directly to Product stock signals */
        .badge-instock { background: #fee2e2; color: #991b1b; }      /* Pending -> High attention red */
        .badge-lowstock { background: #fef3c7; color: #d97706; }     /* Processing -> Warning amber */
        .badge-outstock { background: #d1fae5; color: #065f46; }     /* Resolved -> Success green */

        /* ============================================
           BUTTONS
        ============================================ */
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn {
            padding: 0.45rem 1rem;
            border-radius: 2rem;
            font-size: 0.75rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-fast);
            border: none;
            font-family: inherit;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            text-decoration: none;
        }

        .btn-primary { background: var(--primary); color: white; }
        .btn-primary:hover { background: var(--primary-dark); }
        .btn-outline { background: transparent; border: 1px solid var(--gray-light); color: var(--gray-dark); }
        .btn-outline:hover { border-color: var(--primary); color: var(--primary); }
        .btn-danger { background: transparent; color: var(--danger); border: 1px solid rgba(239, 68, 68, 0.2); }
        .btn-danger:hover { background: var(--danger); color: white; }

        /* Mobile Layout Handling */
        .mobile-header-row {
            display: none;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            background: var(--white);
            border-bottom: 1px solid var(--gray-light);
        }

        .menu-btn {
            background: transparent;
            border: 1px solid var(--gray-light);
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-weight: 600;
            cursor: pointer;
        }

        #drawer-toggle { display: none; }

        /* ============================================
           RESPONSIVE BREAKPOINTS
        ============================================ */
        @media (max-width: 768px) {
            .mobile-header-row { display: flex; }
            .sidebar { transform: translateX(-100%); }
            .main-content { margin-left: 0; padding: 1rem; width: 100%; }
            .top-bar { display: none; }
            
            #drawer-toggle:checked ~ .admin-container .sidebar {
                transform: translateX(0);
            }
            .action-bar { flex-direction: column; align-items: stretch; width: 100%; }
            .search-input { width: 100%; }
        }

        @media (prefers-color-scheme: dark) {
            :root {
                --bg-light: #0f172a;
                --white: #1e293b;
                --dark: #f1f5f9;
                --gray-dark: #cbd5e1;
                --gray: #94a3b8;
                --gray-light: #334155;
            }
            body { background: #0f172a; }
            .top-bar, .stat-card, .products-panel, .search-input { border-color: #334155; }
            th { background: #1e293b; }
        }
    </style>
</head>
<body>

    <input type="checkbox" id="drawer-toggle">
    
    <div class="mobile-header-row">
        <h3 class="text-primary"><i class="fas fa-store"></i> ShopEase</h3>
        <label for="drawer-toggle" class="menu-btn"><i class="fas fa-bars"></i> Menu</label>
    </div>

    <div class="admin-container">
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h3><i class="fas fa-shopping-bag"></i> ShopEase</h3>
                <p>ADMIN CONTROL PANEL</p>
            </div>
            <nav class="sidebar-nav">
                <a href="{{url('/admin/inquiry')}}" class="nav-item active">
                    <i class="fas fa-envelope"></i> Inquiries
                </a>
                <a href="{{url('/admin/order')}}" class="nav-item">
                    <i class="fas fa-shopping-cart"></i> Orders
                </a>
                <a href="{{url('/admin/customer')}}" class="nav-item">
                    <i class="fas fa-users"></i> Customers
                </a>
                <a href="{{url('/admin/vendors')}}" class="nav-item">
                    <i class="fas fa-store"></i> Vendors
                </a>
                <a href="{{url('/admin/product')}}" class="nav-item">
                    <i class="fas fa-box"></i> Products
                </a>
                <a href="{{url('/admin/report')}}" class="nav-item">
                    <i class="fas fa-chart-line"></i> Reports
                </a>
            </nav>
        </aside>

        <!-- MAIN CONTENT AREA -->
        <main class="main-content">

            <!-- TOP BAR / HEADER -->
            <header class="top-bar">
                <div class="page-title">
                    <h1><i class="fas fa-envelope text-primary"></i> Customer Inquiries</h1>
                </div>
                <div class="admin-info">
                    <span class="text-gray" style="font-size: 0.85rem; font-weight: 500;">Welcome, Admin</span>
                    <button class="admin-avatar">A</button>
                </div>
            </header>

            <!-- STATS COUNTERS -->
            <section class="stats-grid">
                <div class="stat-card active-prod">
                    <h3>Total Tickets</h3>
                    <div class="stat-number">{{ $total }}</div>
                </div>
                <div class="stat-card low-stock">
                    <h3>Pending Review</h3>
                    <div class="stat-number">{{ $pending }}</div>
                </div>
                <div class="stat-card out-stock">
                    <h3>In Progress</h3>
                    <div class="stat-number">{{ $processing }}</div>
                </div>
            </section>

            <!-- INQUIRIES MANAGEMENT PANEL -->
            <div class="products-panel">
                <div class="panel-header">
                    <h3><i class="fas fa-comment-dots text-primary"></i> Active Tickets</h3>
                    <div class="action-bar">
                        <input type="text" id="searchInquiry" class="search-input" placeholder="Search customer, ID, or messages..." />
                    </div>
                </div>
                
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Customer Details</th>
                                <th>Ticket ID</th>
                                <th>Associated Order ID</th>
                                <th>Message Preview</th>
                                <th>Created Date</th>
                                <th>Status</th>
                                <th style="text-align: right;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($inquiry as $inq)
                            <tr>
                                <td>
                                    <!-- Structured explicitly like the product name/category media row layout -->
                                    <div class="product-media">
                                        <div class="product-thumbnail">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div>
                                            <div class="product-title">{{ $inq->user->name }}</div>
                                            <span style="font-size: 0.75rem; color: var(--gray);">Customer Account</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span style="font-family: monospace; font-weight: 600;">#100{{ $inq->id }}</span></td>
                                <td><strong>#100{{ $inq->order_id }}</strong></td>
                                <td>
                                    <div style="max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; color: var(--gray);">
                                        {{ $inq->message }}
                                    </div>
                                </td>
                                <td>{{ $inq->created_at }}</td>
                                <td>
                                    <!-- Dynamic Badge Status Selector matching Product UI styling -->
                                    @if($inq->status == 'pending')
                                        <span class="badge badge-instock">Pending</span>
                                    @elseif($inq->status == 'processing')
                                        <span class="badge badge-lowstock">In Progress</span>
                                    @else
                                        <span class="badge badge-outstock">Resolved</span>
                                    @endif
                                </td>
                                <td style="text-align: right;">
                                    <div class="action-buttons" style="justify-content: flex-end;">
                                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-reply"></i> Reply</a>
                                        <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

</body>
</html>