<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
    <meta name="description" content="ShopEase Admin - Manage products, inventory, pricing, and visibility across the marketplace." />
    <title>ShopEase Admin | Product Management</title>
    
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
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
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
            font-size: 2rem;
            font-weight: 800;
            color: var(--text-dark);
        }

        .stat-sub {
            font-size: 0.7rem;
            color: var(--text-muted);
            margin-top: 0.25rem;
        }

        /* Products Panel */
        .products-panel {
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

        .btn-add {
            background: var(--primary);
            color: white;
            border: none;
            padding: 0.5rem 1.2rem;
            border-radius: 2rem;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.2s;
        }

        .btn-add:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .product-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1100px;
        }

        .product-table th {
            text-align: left;
            padding: 1rem 1.2rem;
            background: #f8fafc;
            font-weight: 600;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border-light);
            font-size: 0.85rem;
        }

        .product-table td {
            padding: 1rem 1.2rem;
            border-bottom: 1px solid var(--border-light);
            vertical-align: middle;
            font-size: 0.9rem;
        }

        .product-thumb {
            width: 52px;
            height: 52px;
            object-fit: cover;
            border-radius: 0.5rem;
            background: #f1f5f9;
            display: block;
        }

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

        .status-badge.active {
            background: #d1fae5;
            color: #065f46;
        }

        .status-badge.inactive {
            background: #fee2e2;
            color: #991b1b;
        }

        .status-badge.draft {
            background: #ffedd5;
            color: #9a3412;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .btn-edit {
            background: var(--info);
            border: none;
            color: white;
            padding: 0.35rem 0.9rem;
            border-radius: 1.5rem;
            font-weight: 600;
            font-size: 0.7rem;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-toggle {
            background: var(--warning);
            border: none;
            color: white;
            padding: 0.35rem 0.9rem;
            border-radius: 1.5rem;
            font-weight: 600;
            font-size: 0.7rem;
            cursor: pointer;
        }

        .btn-delete {
            background: var(--danger);
            border: none;
            color: white;
            padding: 0.35rem 0.9rem;
            border-radius: 1.5rem;
            font-weight: 600;
            font-size: 0.7rem;
            cursor: pointer;
        }

        .inventory-input {
            width: 70px;
            padding: 0.3rem;
            border-radius: 0.5rem;
            border: 1px solid var(--border-light);
            text-align: center;
        }

        .update-stock {
            background: #64748b;
            border: none;
            color: white;
            padding: 0.25rem 0.6rem;
            border-radius: 1rem;
            font-size: 0.65rem;
            cursor: pointer;
            margin-left: 0.3rem;
        }

        /* Modal (Add/Edit Product) */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 2000;
            justify-content: center;
            align-items: center;
        }

        .modal-container {
            background: white;
            border-radius: 1rem;
            width: 90%;
            max-width: 550px;
            padding: 1.8rem;
            box-shadow: var(--shadow-md);
            animation: fadeInUp 0.2s ease;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px);}
            to { opacity: 1; transform: translateY(0);}
        }

        .modal-container h3 {
            margin-bottom: 1.2rem;
            font-size: 1.4rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.3rem;
            font-size: 0.85rem;
        }

        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 0.6rem;
            border-radius: 0.6rem;
            border: 1px solid var(--border-light);
            font-family: inherit;
        }

        .modal-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 0.8rem;
            margin-top: 1.5rem;
        }

        /* Mobile Menu */
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
            .stat-number { font-size: 1.6rem; }
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
            .stats-grid { grid-template-columns: repeat(auto-fit, minmax(180px,1fr)); }
            .product-table { min-width: 900px; }
        }

        @media (max-width: 640px) {
            .stat-number { font-size: 1.4rem; }
            .filter-group { flex-direction: column; align-items: stretch; width: 100%; }
            .filter-group select, .filter-group input { width: 100%; }
        }

        @media (min-width: 769px) {
            .sidebar { transform: translateX(0) !important; position: fixed; }
            .mobile-menu-toggle, .sidebar-overlay { display: none !important; }
            .main-content { margin-left: 280px; }
        }

        .flash-message {
            padding: 0.875rem 1.25rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-left: 4px solid;
        }
        .flash-success { background: #d1fae5; color: #065f46; border-left-color: #10b981; }
        .flash-error { background: #fee2e2; color: #991b1b; border-left-color: #ef4444; }
        .flash-info { background: #dbeafe; color: #1e40af; border-left-color: #3b82f6; }
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
                <a href="{{url('/admin/dashboard')}}" class="nav-item">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="{{url('/admin/inquiry')}}" class="nav-item active">
                    <i class="fas fa-envelope"></i> Inquiries
                </a>
                <a href="{{ url('/admin/orders') }}" class="nav-item" id="order-item">
                    <i class="fas fa-shopping-cart"></i> Orders
                </a>
                <a href="{{url('/admin/customer')}}" class="nav-item" id="customer-item">
                    <i class="fas fa-users"></i> Customers
                </a>
                <a href="{{url('admin/vendor')}}" class="nav-item" id="product-item">
                    <i class="fas fa-box"></i> Vendors
                </a>
                <a href="{{url('/admin/product')}}" class="nav-item" id="product-item">
                    <i class="fas fa-box"></i> Products
                </a>
                <a href="#" class="nav-item" id="report-item">
                    <i class="fas fa-chart-line"></i> Reports
                </a>
            </nav>
    </aside>
    <label for="menu-toggle" class="sidebar-overlay"></label>

    <!-- MAIN CONTENT: PRODUCT MANAGEMENT -->
    <main class="main-content">
        <div id="flashContainer"></div>

        <div class="top-bar">
            <div class="page-title">
                <h1><i class="fas fa-cube" style="color: var(--primary);"></i> Product Catalog</h1>
                <p style="font-size: 0.85rem; color: var(--text-muted);">Manage inventory, pricing, and product visibility.</p>
            </div>
            <div class="admin-profile">
                <i class="fas fa-bell"></i>
                <div>Admin</div>
                <img src="https://ui-avatars.com/api/?background=ff6600&color=fff&name=Admin" alt="admin">
            </div>
        </div>

        <!-- Stats Summary -->
        <div class="stats-grid" id="statsGrid">
            <div class="stat-card"><h3>Total Products</h3><div class="stat-number" id="totalProducts">0</div></div>
            <div class="stat-card"><h3>Active</h3><div class="stat-number" id="activeProducts">0</div></div>
            <div class="stat-card"><h3>Low Stock (<10)</h3><div class="stat-number" id="lowStockCount">0</div></div>
            <div class="stat-card"><h3>Out of Stock</h3><div class="stat-number" id="outOfStockCount">0</div></div>
            <div class="stat-card"><h3>Total Value</h3><div class="stat-number" id="totalInventoryValue">$0</div><div class="stat-sub">(stock value)</div></div>
        </div>

        <div class="products-panel">
            <div class="panel-header">
                <h3><i class="fas fa-list-ul"></i> All Products</h3>
                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <div class="filter-group">
                        <select id="statusFilter">
                            <option value="all">All Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="draft">Draft</option>
                        </select>
                        <input type="text" id="searchProduct" placeholder="Search by name, SKU, category..." />
                    </div>
                    <button class="btn-add" id="openAddModalBtn"><i class="fas fa-plus"></i> Add Product</button>
                </div>
            </div>
            <div style="overflow-x: auto;">
                <table class="product-table" id="productTable">
                    <thead>
                        <tr><th>Image</th><th>ID/SKU</th><th>Product Name</th><th>Category</th><th>Price</th><th>Stock</th><th>Status</th><th>Actions</th></tr>
                    </thead>
                    <tbody id="productTableBody"></tbody>
                </table>
            </div>
            <div id="noDataMsg" style="padding: 2rem; text-align: center; color: #64748b; display: none;">
                <i class="fas fa-box-open" style="font-size: 2rem; margin-bottom: 0.5rem; display: block;"></i>
                No products found. Click "Add Product" to get started.
            </div>
        </div>
    </main>
</div>

<!-- Modal Add/Edit Product -->
<div id="productModal" class="modal-overlay">
    <div class="modal-container">
        <h3 id="modalTitle">Add New Product</h3>
        <form id="productForm">
            <input type="hidden" id="editId" value="">
            <div class="form-group"><label>Product Name *</label><input type="text" id="prodName" required></div>
            <div class="form-group"><label>SKU</label><input type="text" id="prodSku" placeholder="Unique code"></div>
            <div class="form-group"><label>Category</label><input type="text" id="prodCategory" placeholder="Electronics, Clothing, etc"></div>
            <div class="form-group"><label>Price ($)</label><input type="number" step="0.01" id="prodPrice" required></div>
            <div class="form-group"><label>Stock Quantity</label><input type="number" id="prodStock" value="0"></div>
            <div class="form-group"><label>Image URL</label><input type="text" id="prodImage" placeholder="https://..."></div>
            <div class="form-group"><label>Status</label><select id="prodStatus"><option value="active">Active</option><option value="inactive">Inactive</option><option value="draft">Draft</option></select></div>
            <div class="modal-buttons"><button type="button" class="btn-toggle" style="background:#94a3b8;" id="closeModalBtn">Cancel</button><button type="submit" class="btn-add" style="background:var(--primary);">Save Product</button></div>
        </form>
    </div>
</div>
</body>
</html>