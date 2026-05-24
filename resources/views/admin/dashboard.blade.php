<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ShopEase Admin - Customer Inquiry Management">
    <title>ShopEase Admin | Inquiry Management</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #ff6600;
            --primary-dark: #e05a00;
            --primary-light: #ffefe5;
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
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --radius: 0.75rem;
            --radius-lg: 1rem;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: var(--bg-light);
            color: var(--dark);
            line-height: 1.5;
            overflow-x: hidden;
        }

        /* ========== ADMIN CONTAINER ========== */
        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        /* ========== SIDEBAR ========== */
        .sidebar {
            width: 280px;
            background: linear-gradient(135deg, #0f2b3d 0%, #1a3a4f 100%);
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            transition: all 0.3s ease;
            z-index: 100;
        }

        .sidebar-header {
            padding: 1.8rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h3 {
            font-size: 1.6rem;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .sidebar-header h3 i {
            color: var(--primary);
            margin-right: 8px;
        }

        .sidebar-header p {
            font-size: 0.75rem;
            opacity: 0.7;
            margin-top: 0.3rem;
        }

        .sidebar-nav {
            padding: 1.5rem 0;
        }

        .nav-item {
            padding: 0.85rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.2s ease;
            font-weight: 500;
            cursor: pointer;
        }

        .nav-item:hover {
            background: rgba(255, 102, 0, 0.15);
            color: var(--primary);
        }

        .nav-item.active {
            background: rgba(255, 102, 0, 0.2);
            color: var(--primary);
            border-left: 3px solid var(--primary);
        }

        .nav-item i {
            width: 24px;
            font-size: 1.1rem;
        }

        /* ========== MAIN CONTENT ========== */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 2rem;
        }

        /* ========== TOP BAR ========== */
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
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
        }

        .admin-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .admin-avatar {
            width: 40px;
            height: 40px;
            background: var(--primary-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-weight: bold;
        }

        /* ========== STATS CARDS ========== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--white);
            padding: 1.5rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .stat-card h3 {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--gray);
            margin-bottom: 0.6rem;
        }

        .stat-number {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--dark);
        }

        .stat-card.pending .stat-number { color: var(--warning); }
        .stat-card.processing .stat-number { color: var(--info); }
        .stat-card.resolved .stat-number { color: var(--success); }

       
        /* ========== BULK ACTIONS ========== */
        .bulk-actions {
            margin-bottom: 1rem;
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        /* ========== TABLE ========== */
        .table-container {
            background: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--gray-light);
        }

        th {
            background: #f9fafb;
            font-weight: 600;
            color: var(--gray-dark);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        tr:hover {
            background: #fefefe;
        }

        .checkbox-col {
            width: 40px;
        }

        /* Badges */
        .badge {
            padding: 0.25rem 0.75rem;
            border-radius: 2rem;
            font-size: 0.7rem;
            font-weight: 700;
            display: inline-block;
        }

        .badge-pending { background: #fef3c7; color: #d97706; }
        .badge-processing { background: #dbeafe; color: #2563eb; }
        .badge-resolved { background: #d1fae5; color: #059669; }
        .badge-closed { background: #e5e7eb; color: #4b5563; }

        .inquiry-type-badge {
            background: var(--primary-light);
            padding: 0.2rem 0.7rem;
            border-radius: 2rem;
            font-size: 0.7rem;
            font-weight: 600;
            color: var(--primary-dark);
            display: inline-block;
        }

        .inquiry-message-preview {
            max-width: 250px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: var(--gray);
            font-size: 0.85rem;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: var(--white);
            border-radius: var(--radius-lg);
            max-width: 750px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: var(--shadow-lg);
            animation: modalSlideIn 0.3s ease;
        }

        @keyframes modalSlideIn {
            from {
                transform: translateY(-30px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--gray-light);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(115deg, #0f2b3d 0%, #1a3a4f 100%);
            color: white;
            border-radius: var(--radius-lg) var(--radius-lg) 0 0;
        }

        .modal-header h3 {
            font-size: 1.3rem;
        }

        .modal-close {
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .modal-close:hover {
            opacity: 0.7;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .detail-section {
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--gray-light);
        }

        .detail-section h4 {
            color: var(--primary);
            margin-bottom: 1rem;
            font-size: 1rem;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 130px 1fr;
            gap: 0.8rem;
            margin-bottom: 0.8rem;
        }

        .detail-label {
            font-weight: 700;
            color: var(--gray-dark);
            font-size: 0.85rem;
        }

        .detail-value {
            color: var(--dark);
        }

        .message-box {
            background: var(--bg-light);
            padding: 1rem;
            border-radius: var(--radius);
            margin: 0.5rem 0;
            line-height: 1.6;
        }

        .response-box {
            margin-top: 1rem;
        }

        .response-box textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1.5px solid var(--gray-light);
            border-radius: var(--radius);
            font-family: inherit;
            resize: vertical;
            min-height: 100px;
        }

        .response-box textarea:focus {
            outline: none;
            border-color: var(--primary);
        }

        .status-select {
            padding: 0.5rem;
            border-radius: 0.5rem;
            border: 1.5px solid var(--gray-light);
            font-family: inherit;
        }

        .modal-footer {
            padding: 1.5rem;
            border-top: 1px solid var(--gray-light);
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            flex-wrap: wrap;
        }

        /* Pagination */
        .pagination {
            margin-top: 1.5rem;
            display: flex;
            gap: 0.5rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .page-btn {
            padding: 0.5rem 1rem;
            border: 1px solid var(--gray-light);
            background: var(--white);
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.2s;
        }

        .page-btn:hover, .page-btn.active {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        /* Alert */
        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem 1.5rem;
            border-radius: var(--radius);
            display: none;
            z-index: 2000;
            animation: slideInRight 0.3s ease;
            box-shadow: var(--shadow-lg);
        }

        .alert.show {
            display: block;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .alert-success {
            background: var(--success);
            color: white;
        }

        .alert-danger {
            background: var(--danger);
            color: white;
        }

        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--gray);
        }

        .empty-state i {
            font-size: 3rem;
            color: var(--gray-light);
            margin-bottom: 1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                position: fixed;
                z-index: 1000;
            }
            .main-content {
                margin-left: 0;
                padding: 1rem;
            }
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .detail-grid {
                grid-template-columns: 1fr;
                gap: 0.3rem;
            }
            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="admin-container">
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
                <a href="#" class="nav-item" id="order-item" onclick="insertOrder()">
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

        <!-- Main Content -->
        <main class="main-content" id="main-content">
            <div class="top-bar">
                <h1 class="page-title"><i class="fas fa-envelope" style="color: var(--primary);"></i> Customer Inquiries</h1>
                <div class="admin-info">
                    <span><i class="fas fa-user-circle"></i> Admin User</span>
                        <form method="POST" action="{{url('/vendor/logOut') }}">
                            @csrf
                            <button href="{{url('/vendor/logOut')}}" class="admin-avatar">👋 </button>
                        </form>
                   
                </div>
      
            </div>

            <!-- Statistics Cards -->
            <div class="stats-grid">
              
                <div class="stat-card">
                    <h3>Total Inquiries</h3>
                    <div class="stat-number" id="totalCount">{{$total}}</div>
                </div>
                 
                <div class="stat-card pending">
                    <h3>Pending</h3>
                    <div class="stat-number" id="pendingCount">{{$pending}}</div>
                </div>
                <div class="stat-card processing">
                    <h3>Processing</h3>
                    <div class="stat-number" id="processingCount">{{$processing}}</div>
                </div>
                <div class="stat-card resolved">
                    <h3>Resolved</h3>
                    <div class="stat-number" id="resolvedCount">{{$resolved}}</div>
                </div>
                
            </div>

            

            <!-- Bulk Actions -->
            <div class="bulk-actions">
                <span id="selectedCount" style="font-size: 0.8rem; color: var(--gray);"></span>
            </div>

            <!-- Inquiries Table -->
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Inquiry Type</th>
                            <th>Order ID</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @foreach($inquiry as $inq)
                    <tbody id="inquiriesTableBody">
                        <!-- Dynamic content -->
                         <td>{{$inq->id}}</td>
                         <td>{{$inq->users->name}}</td>
                         <td>{{$inq->order_id}}</td>
                         <td>{{$inq->message}}</td>
                         <td>{{$inq->status}}</td>
                         <td>{{$inq->created_at}}</td>
                         <td>
                            <button>Process</button>
                            <button>Resolve</button>
                         </td>
                    </tbody>
                    @endforeach
                </table>
            </div>

            <!-- Pagination -->
            <div class="pagination" id="pagination"></div>
        </main>
    </div>

    <!-- View/Resolve Modal -->
    <div id="inquiryModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-ticket-alt"></i> Inquiry Details</h3>
                <button class="modal-close" onclick="closeModal()">&times;</button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Dynamic content -->
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="closeModal()">Close</button>
                <button class="btn btn-success" onclick="resolveInquiry()" id="resolveBtn">
                    <i class="fas fa-check-circle"></i> Resolve & Close
                </button>
            </div>
        </div>
    </div>

    <!-- Alert Toast -->
    <div id="alertMessage" class="alert"></div>
    <script>
        let orders=document.getElementById('order-item')
        let customer=document.getElementById('customer-item')
        let product=document.getElementById('product-item')
        let report=document.getElementById('report-item')


        function insertOrder(){        
            let mainContent = document.getElementById('main-content');        
            mainContent.innerHTML = `        
            <div class="top-bar">           
            <h1 class="page-title">                
            <i class="fas fa-shopping-cart"></i> Orders            </h1>
            </div>        <div class="table-container">            
            <table>               
             <thead>                    
             <tr>                        
             <th>Order ID</th>                       
              <th>Customer</th>                       
               <th>Product</th>                        
               <th>Status</th>                        
               <th>Total</th> 
               <th>Action</th>                   
               </tr>                
               </thead>               
                <tbody>                   
                 <tr>                        
                 <td>#1001</td>                       
                  <td>Ram Sharma</td>                       
                   <td>Laptop</td>                        
                   <td>Pending</td>                      
                     <td>Rs. 45,000</td>                   
                      </tr>                    
                      <tr>                       
                       <td>#1002</td>                        
                       <td>Hari Karki</td>                        
                       <td>Mouse</td>                        
                       <td>Delivered</td>                        
                       <td>Rs. 2,500</td>                    </tr>                </tbody>            </table>        </div>        `;   
                       
                       }</script>




</body>
</html>