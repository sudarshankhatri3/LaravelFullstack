<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
    <meta name="description" content="ShopEase Admin - Manage and respond to customer inquiries, support tickets, and messages." />
    <title>ShopEase Admin | Inquiry Management</title>
    
    <!-- Google Fonts & Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet" />
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
            --info: #3b82f6;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.05);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.08);
            --radius-lg: 1rem;
            --radius-md: 0.75rem;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: var(--admin-bg);
            color: var(--text-dark);
            line-height: 1.5;
        }

        /* Dashboard Layout */
        .dashboard {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        /* SIDEBAR */
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

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 1.8rem 2rem 2rem;
            width: calc(100% - 280px);
            transition: margin-left 0.3s ease;
        }

        /* Top Bar */
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
            cursor: pointer;
        }

        .admin-profile img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
            gap: 1.2rem;
            margin-bottom: 2.5rem;
        }

        .stat-card {
            background: var(--card-bg);
            padding: 1.2rem;
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
        }

        /* Inquiry Table & Cards */
        .inquiries-panel {
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

        .inquiry-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }

        .inquiry-table th {
            text-align: left;
            padding: 1rem 1.2rem;
            background: #f8fafc;
            font-weight: 600;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border-light);
            font-size: 0.85rem;
        }

        .inquiry-table td {
            padding: 1rem 1.2rem;
            border-bottom: 1px solid var(--border-light);
            vertical-align: middle;
            font-size: 0.9rem;
        }

        /* Status badges */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 0.25rem 0.75rem;
            border-radius: 2rem;
            font-size: 0.75rem;
            font-weight: 600;
            white-space: nowrap;
        }

        .status-badge.new {
            background: #fee2e2;
            color: #991b1b;
        }

        .status-badge.in-progress {
            background: #ffedd5;
            color: #9a3412;
        }

        .status-badge.resolved {
            background: #d1fae5;
            color: #065f46;
        }

        .status-badge.responded {
            background: #dbeafe;
            color: #1e40af;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .btn-reply {
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
            text-decoration: none;
        }

        .btn-view {
            background: #3b82f6;
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
            text-decoration: none;
        }

        .btn-update-status {
            background: #64748b;
            border: none;
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 2rem;
            font-weight: 600;
            font-size: 0.75rem;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-reply:hover, .btn-view:hover, .btn-update-status:hover {
            transform: translateY(-1px);
            filter: brightness(1.05);
        }

        /* Quick reply modal (inline form) */
        .reply-form-container {
            margin-top: 0.5rem;
            background: #f8fafc;
            border-radius: 0.75rem;
            padding: 0.75rem;
            display: none;
            border: 1px solid var(--border-light);
        }

        .reply-form-container.active {
            display: block;
        }

        .reply-textarea {
            width: 100%;
            padding: 0.5rem;
            border-radius: 0.5rem;
            border: 1px solid var(--border-light);
            font-family: inherit;
            font-size: 0.8rem;
            margin-bottom: 0.5rem;
            resize: vertical;
        }

        .send-reply-btn {
            background: var(--primary);
            color: white;
            border: none;
            padding: 0.3rem 1rem;
            border-radius: 1.5rem;
            font-size: 0.7rem;
            font-weight: 600;
            cursor: pointer;
        }

        /* Mobile menu */
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
            margin: 1rem 1rem 0 1rem;
            width: fit-content;
        }

        #menu-toggle {
            display: none;
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 999;
        }

        #menu-toggle:checked ~ .sidebar-overlay,
        #menu-toggle:checked ~ .sidebar {
            display: block;
        }
        #menu-toggle:checked ~ .sidebar {
            transform: translateX(0) !important;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .main-content { padding: 1.2rem; }
            .stat-number { font-size: 1.8rem; }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                position: fixed;
                z-index: 1100;
                width: 280px;
            }
            .main-content { margin-left: 0 !important; width: 100%; padding: 1rem; }
            .mobile-menu-toggle { display: inline-flex !important; }
            .top-bar { flex-direction: column; align-items: flex-start; }
            .stats-grid { grid-template-columns: repeat(auto-fit, minmax(200px,1fr)); }
            .inquiry-table { min-width: 880px; }
        }

        @media (max-width: 640px) {
            .stat-number { font-size: 1.5rem; }
            .filter-group { flex-direction: column; align-items: stretch; width: 100%; }
            .filter-group select, .filter-group input { width: 100%; }
        }

        @media (min-width: 769px) {
            .sidebar { transform: translateX(0) !important; position: fixed; }
            .mobile-menu-toggle, .sidebar-overlay { display: none !important; }
            .main-content { margin-left: 280px; }
        }

        .message-preview {
            max-width: 220px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: var(--text-muted);
            font-size: 0.8rem;
        }
        .customer-name {
            font-weight: 600;
        }
        .inquiry-subject {
            font-weight: 500;
        }
        .flash-message {
            background: #d1fae5;
            color: #065f46;
            padding: 0.875rem 1.25rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-left: 4px solid #10b981;
        }
    </style>
</head>
<body>

<input type="checkbox" id="menu-toggle" style="display: none;">
<label for="menu-toggle" class="mobile-menu-toggle"><i class="fas fa-bars"></i> Menu</label>

<div class="dashboard">
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <h3><i class="fas fa-store"></i> ShopEase</h3>
            <p>Admin Control Panel</p>
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
            <a href="{{url('/admin/vendor')}}" class="nav-item">
                <i class="fas fa-box"></i> Vendors
            </a>
            <a href="{{url('/admin/product')}}" class="nav-item">
                <i class="fas fa-box"></i> Products
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-chart-line"></i> Reports
            </a>
        </nav>
    </aside>
    <label for="menu-toggle" class="sidebar-overlay"></label>

    <!-- MAIN CONTENT: INQUIRY MANAGEMENT -->
    <main class="main-content">
        <!-- Flash Messages -->
        <div id="flashContainer"></div>

        <div class="top-bar">
            <div class="page-title">
                <h1><i class="fas fa-headset" style="color: var(--primary);"></i> Customer Inquiries</h1>
                <p style="font-size: 0.85rem; color: var(--text-muted);">Manage support tickets, respond to customers, and track resolutions.</p>
            </div>
            <div class="admin-profile">
                <i class="fas fa-bell" style="color: var(--text-muted);"></i>
                <div>Admin</div>
                <img src="https://ui-avatars.com/api/?background=ff6600&color=fff&name=Admin" alt="admin">
            </div>
        </div>

        <!-- Stats Summary (Dynamic) -->
        <div class="stats-grid" id="statsGrid">
            <div class="stat-card">
                <h3>Total Inquiries</h3>
                <div class="stat-number" id="totalInquiries">{{$total}}</div>
            </div>
            <div class="stat-card">
                <h3>Pending</h3>
                <div class="stat-number" id="newInquiries">{{$pending}}</div>
            </div>
            <div class="stat-card">
                <h3>Progress</h3>
                <div class="stat-number" id="inProgressCount">{{$processing}}</div>
            </div>
            <div class="stat-card">
                <h3>Resolved</h3>
                <div class="stat-number" id="resolvedCount">{{$resolved}}</div>
            </div>
            <div class="stat-card">
                <h3>Avg Response Time</h3>
                <div class="stat-number" id="avgResponse">--</div>
            </div>
        </div>

        <!-- Inquiries Panel -->
        <div class="inquiries-panel">
            <div class="panel-header">
                <h3><i class="fas fa-comment-dots"></i> All Support Tickets</h3>
                <div class="filter-group">
                    <input type="text" id="searchInquiry" placeholder="Search by name, email, or subject..." />
                </div>
            </div>
            <div style="overflow-x: auto;">
                <table class="inquiry-table" id="inquiryTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Subject</th>
                            <th>Message Preview</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="inquiryTableBody">
                       @foreach($inquiry as $inq)
                        <tr>
                            <td>#100{{$inq->id}}</td>
                            <td>{{$inq->user->name}}</td>
                            <td>#100{{$inq->order_id}}</td>
                            <td>{{$inq->message}}</td>
                            <td>{{$inq->status}}</td>
                            <td>{{$inq->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="noDataMsg" style="padding: 2rem; text-align: center; color: #64748b; display: none;">
                <i class="fas fa-inbox" style="font-size: 2rem; margin-bottom: 0.5rem; display: block;"></i>
                No inquiries found
            </div>
        </div>
    </main>
</div>
</body>
</html>