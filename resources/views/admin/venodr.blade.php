<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
        <meta name="description" content="ShopEase Admin - Complete management for marketplace vendors and suppliers" />
        <title>ShopEase Admin | Vendor Management</title>

        <!-- Google Fonts & Font Awesome -->
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap"
            rel="stylesheet" />
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
                --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
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
           UTILITY CLASSES
        ============================================ */
            .text-primary {
                color: var(--primary);
            }

            .text-success {
                color: var(--success);
            }

            .text-warning {
                color: var(--warning);
            }

            .text-danger {
                color: var(--danger);
            }

            .text-info {
                color: var(--info);
            }

            .text-gray {
                color: var(--gray);
            }

            .text-dark {
                color: var(--dark);
            }

            .bg-primary {
                background: var(--primary);
            }

            .bg-success {
                background: var(--success);
            }

            .bg-warning {
                background: var(--warning);
            }

            .bg-danger {
                background: var(--danger);
            }

            .bg-info {
                background: var(--info);
            }

            .bg-light {
                background: var(--bg-light);
            }

            .mt-1 {
                margin-top: 0.25rem;
            }

            .mt-2 {
                margin-top: 0.5rem;
            }

            .mt-3 {
                margin-top: 1rem;
            }

            .mt-4 {
                margin-top: 1.5rem;
            }

            .mb-1 {
                margin-bottom: 0.25rem;
            }

            .mb-2 {
                margin-bottom: 0.5rem;
            }

            .mb-3 {
                margin-bottom: 1rem;
            }

            .mb-4 {
                margin-bottom: 1.5rem;
            }

            .p-1 {
                padding: 0.25rem;
            }

            .p-2 {
                padding: 0.5rem;
            }

            .p-3 {
                padding: 1rem;
            }

            .p-4 {
                padding: 1.5rem;
            }

            .flex {
                display: flex;
            }

            .flex-col {
                flex-direction: column;
            }

            .items-center {
                align-items: center;
            }

            .justify-between {
                justify-content: space-between;
            }

            .justify-center {
                justify-content: center;
            }

            .gap-1 {
                gap: 0.25rem;
            }

            .gap-2 {
                gap: 0.5rem;
            }

            .gap-3 {
                gap: 1rem;
            }

            .gap-4 {
                gap: 1.5rem;
            }

            .w-full {
                width: 100%;
            }

            .h-full {
                height: 100%;
            }

            .rounded {
                border-radius: var(--radius);
            }

            .rounded-lg {
                border-radius: var(--radius-lg);
            }

            .rounded-xl {
                border-radius: var(--radius-xl);
            }

            .rounded-full {
                border-radius: 9999px;
            }

            .shadow-xs {
                box-shadow: var(--shadow-xs);
            }

            .shadow-sm {
                box-shadow: var(--shadow-sm);
            }

            .shadow-md {
                box-shadow: var(--shadow-md);
            }

            .shadow-lg {
                box-shadow: var(--shadow-lg);
            }

            .shadow-xl {
                box-shadow: var(--shadow-xl);
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
                z-index: 100;
                scrollbar-width: thin;
            }

            .sidebar::-webkit-scrollbar {
                width: 5px;
            }

            .sidebar::-webkit-scrollbar-track {
                background: rgba(255, 255, 255, 0.05);
            }

            .sidebar::-webkit-scrollbar-thumb {
                background: var(--primary);
                border-radius: 10px;
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
                position: relative;
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

            .page-title {
                font-size: 1.5rem;
                font-weight: 700;
                color: var(--dark);
                display: flex;
                align-items: center;
                gap: 0.75rem;
            }

            .page-title i {
                color: var(--primary);
                font-size: 1.6rem;
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

            .admin-avatar:hover {
                transform: scale(1.05);
                box-shadow: var(--shadow-md);
            }

            /* ============================================
           STATISTICS CARDS
        ============================================ */
            .stats-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
                gap: 1.5rem;
                margin-bottom: 2rem;
            }

            .stat-card {
                background: var(--white);
                padding: 1.4rem 1.6rem;
                border-radius: var(--radius-lg);
                box-shadow: var(--shadow-sm);
                transition: all var(--transition);
                cursor: pointer;
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

            .stat-card:hover {
                transform: translateY(-4px);
                box-shadow: var(--shadow-lg);
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

            /* Card variants */
            .stat-card.pending .stat-number {
                color: var(--warning);
            }

            .stat-card.processing .stat-number {
                color: var(--info);
            }

            .stat-card.resolved .stat-number {
                color: var(--success);
            }

            .stat-card.pending::before {
                background: var(--warning);
            }

            .stat-card.processing::before {
                background: var(--info);
            }

            .stat-card.resolved::before {
                background: var(--success);
            }

            /* ============================================
           BULK ACTIONS BAR & CONTROLS
        ============================================ */
            .bulk-actions {
                margin-bottom: 1rem;
                display: flex;
                gap: 1rem;
                align-items: center;
                flex-wrap: wrap;
                background: var(--white);
                padding: 0.75rem 1rem;
                border-radius: var(--radius);
                box-shadow: var(--shadow-xs);
            }

            /* ============================================
           TABLE STYLES - Modern & Clean
        ============================================ */
            .table-container {
                background: var(--white);
                border-radius: var(--radius-lg);
                box-shadow: var(--shadow-sm);
                overflow-x: auto;
                border: 1px solid rgba(0, 0, 0, 0.04);
            }

            table {
                width: 100%;
                border-collapse: collapse;
                min-width: 800px;
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

            tr {
                transition: background var(--transition-fast);
            }

            tr:hover {
                background: #fefef8;
            }

            tr:last-child td {
                border-bottom: none;
            }

            .checkbox-col {
                width: 40px;
                text-align: center;
            }

            td img {
                width: 50px;
                height: 50px;
                object-fit: cover;
                border-radius: var(--radius-sm);
                background: var(--gray-light);
                border: 1px solid var(--gray-light);
            }

            /* ============================================
           BADGES & TAGS
        ============================================ */
            .badge {
                padding: 0.3rem 0.9rem;
                border-radius: 2rem;
                font-size: 0.7rem;
                font-weight: 700;
                display: inline-block;
                letter-spacing: 0.3px;
            }

            .badge-pending {
                background: #fef3c7;
                color: #d97706;
            }

            .badge-processing {
                background: #dbeafe;
                color: #2563eb;
            }

            .badge-resolved {
                background: #d1fae5;
                color: #059669;
            }

            .badge-closed {
                background: #e5e7eb;
                color: #4b5563;
            }

            .badge-success {
                background: var(--success);
                color: white;
            }

            .badge-warning {
                background: var(--warning);
                color: white;
            }

            .badge-danger {
                background: var(--danger);
                color: white;
            }

            .badge-info {
                background: var(--info);
                color: white;
            }

            /* ============================================
           ACTION BUTTONS
        ============================================ */
            .action-buttons {
                display: flex;
                gap: 0.6rem;
                flex-wrap: wrap;
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
            }

            .btn-primary {
                background: var(--primary);
                color: white;
            }

            .btn-primary:hover {
                background: var(--primary-dark);
                transform: translateY(-1px);
            }

            .btn-outline {
                background: transparent;
                border: 1px solid var(--gray-light);
                color: var(--gray-dark);
            }

            .btn-outline:hover {
                border-color: var(--primary);
                color: var(--primary);
            }

            .btn-danger {
                background: var(--danger);
                color: white;
            }

            .btn-danger:hover {
                background: #dc2626;
            }

            .btn-sm {
                padding: 0.35rem 0.8rem;
                font-size: 0.7rem;
            }

            /* ============================================
           PAGINATION
        ============================================ */
            .pagination {
                margin-top: 1.8rem;
                display: flex;
                gap: 0.5rem;
                justify-content: center;
                flex-wrap: wrap;
            }

            .page-btn {
                padding: 0.5rem 1rem;
                min-width: 2.5rem;
                border: 1px solid var(--gray-light);
                background: var(--white);
                border-radius: 0.5rem;
                cursor: pointer;
                transition: all var(--transition-fast);
                font-weight: 500;
            }

            .page-btn:hover,
            .page-btn.active {
                background: var(--primary);
                border-color: var(--primary);
                color: white;
                transform: translateY(-1px);
            }

            /* ============================================
           RESPONSIVE BREAKPOINTS
        ============================================ */
            @media (max-width: 1023px) {
                .sidebar {
                    width: 260px;
                }

                .main-content {
                    margin-left: 260px;
                    padding: 1.5rem;
                    width: calc(100% - 260px);
                }

                .stat-number {
                    font-size: 1.8rem;
                }
            }

            @media (max-width: 767px) {
                .sidebar {
                    transform: translateX(-100%);
                    position: fixed;
                    z-index: 1000;
                    width: 280px;
                }

                .main-content {
                    margin-left: 0;
                    padding: 1rem;
                    width: 100%;
                }

                .stats-grid {
                    grid-template-columns: repeat(2, 1fr);
                    gap: 0.875rem;
                }

                .stat-card {
                    padding: 1rem 1.2rem;
                }

                .stat-number {
                    font-size: 1.5rem;
                }

                .top-bar {
                    flex-direction: column;
                    align-items: flex-start;
                    padding: 1rem;
                }

                .page-title {
                    font-size: 1.2rem;
                }

                .action-buttons {
                    flex-direction: column;
                }

                .btn {
                    width: 100%;
                    justify-content: center;
                }
            }

            @media (max-width: 575px) {
                .stats-grid {
                    grid-template-columns: 1fr;
                }

                .main-content {
                    padding: 0.875rem;
                }

                th,
                td {
                    padding: 0.75rem;
                    font-size: 0.8rem;
                }
            }

            /* Dark Mode Support */
            @media (prefers-color-scheme: dark) {
                :root {
                    --bg-light: #0f172a;
                    --white: #1e293b;
                    --dark: #f1f5f9;
                    --gray-dark: #cbd5e1;
                    --gray: #94a3b8;
                    --gray-light: #334155;
                }

                body {
                    background: #0f172a;
                }

                .top-bar,
                .stat-card,
                .table-container,
                .bulk-actions {
                    border-color: #334155;
                }

                th {
                    background: #1e293b;
                }
            }
        </style>
    </head>

    <body>

        <div class="admin-container">
            <!-- SIDEBAR -->
            <aside class="sidebar">
                <div class="sidebar-header">
                    <h3><i class="fas fa-store"></i> ShopEase</h3>
                    <p>Admin Control Panel</p>
                </div>
                <nav class="sidebar-nav">
                    <a href="{{ url('/admin/inquiry') }}" class="nav-item active">
                        <i class="fas fa-envelope"></i> Inquiries
                    </a>
                    <a href="{{ url('/admin/order') }}" class="nav-item">
                        <i class="fas fa-shopping-cart"></i> Orders
                    </a>
                    <a href="{{ url('/admin/customer') }}" class="nav-item">
                        <i class="fas fa-users"></i> Customers
                    </a>
                    <a href="{{ url('/admin/vendors') }}" class="nav-item">
                        <i class="fas fa-box"></i> Vendors
                    </a>
                    <a href="{{ url('/admin/product') }}" class="nav-item">
                        <i class="fas fa-box"></i> Products
                    </a>
                    <a href="#" class="nav-item">
                        <i class="fas fa-chart-line"></i> Reports
                    </a>
                </nav>
            </aside>

            <!-- MAIN CONTENT AREA -->
            <main class="main-content">

                <!-- TOP BAR / HEADER -->
                <header class="top-bar">
                    <div class="page-title">
                        <i class="fas fa-store"></i> Vendor Management
                    </div>
                    <div class="admin-info">
                        <span class="text-gray" style="font-size: 0.85rem; font-weight: 500;">Welcome, Admin</span>
                        <button class="admin-avatar">A</button>
                    </div>
                </header>

                <!-- STATISTICS CARDS -->
                <section class="stats-grid">
                    <div class="stat-card resolved">
                        <h3>Active Vendors</h3>
                        <div class="stat-number">142</div>
                    </div>
                    <div class="stat-card processing">
                        <h3>Total Products Offered</h3>
                        <div class="stat-number">4,812</div>
                    </div>
                    <div class="stat-card pending">
                        <h3>Pending Approvals</h3>
                        <div class="stat-number">9</div>
                    </div>
                </section>

                <!-- BULK ACTIONS CONTROL BAR -->
                <div class="bulk-actions">
                    <button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add New Vendor</button>
                    <button class="btn btn-outline btn-sm"><i class="fas fa-file-export"></i> Export Selected</button>
                    <button class="btn btn-danger btn-sm"><i class="fas fa-ban"></i> Suspend Selected</button>
                </div>

                <!-- VENDOR TABLE CONTENT -->
                <div class="tab-content active">
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th class="checkbox-col"><input type="checkbox"></th>
                                    <th>Vendor ID</th>
                                    <th>Store Name</th>
                                    <th>Contact Person</th>
                                    <th>Status</th>
                                    <th>Active Listings</th>
                                    <th style="text-align: right;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="checkbox-col"><input type="checkbox"></td>
                                    <td><strong>#V-4401</strong></td>
                                    <td>Apex Electronics</td>
                                    <td>Marcus Aurelius</td>
                                    <td><span class="badge badge-resolved">Approved</span></td>
                                    <td>312 Items</td>
                                    <td style="text-align: right;">
                                        <div class="action-buttons" style="justify-content: flex-end;">
                                            <button class="btn btn-outline btn-sm"><i class="fas fa-chart-line"></i>
                                                Sales</button>
                                            <button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>
                                                Manage</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="checkbox-col"><input type="checkbox"></td>
                                    <td><strong>#V-3912</strong></td>
                                    <td>Vogue Apparel Co.</td>
                                    <td>Sarah Jenkins</td>
                                    <td><span class="badge badge-pending">Pending Review</span></td>
                                    <td>0 Items</td>
                                    <td style="text-align: right;">
                                        <div class="action-buttons" style="justify-content: flex-end;">
                                            <button class="btn btn-outline btn-sm"><i class="fas fa-file-alt"></i>
                                                Docs</button>
                                            <button class="btn btn-primary btn-sm"><i class="fas fa-check"></i>
                                                Approve</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- PAGINATION -->
                    <div class="pagination">
                        <button class="page-btn"><i class="fas fa-chevron-left"></i></button>
                        <button class="page-btn active">1</button>
                        <button class="page-btn">2</button>
                        <button class="page-btn"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>

            </main>
        </div>

    </body>

</html>
