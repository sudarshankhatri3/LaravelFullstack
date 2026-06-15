<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="description" content="ShopEase Admin - Customer Inquiry Management">
    <title>ShopEase Admin | Inquiry Management</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
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
        .text-primary { color: var(--primary); }
        .text-success { color: var(--success); }
        .text-warning { color: var(--warning); }
        .text-danger { color: var(--danger); }
        .text-info { color: var(--info); }
        .text-gray { color: var(--gray); }
        .text-dark { color: var(--dark); }
        
        .bg-primary { background: var(--primary); }
        .bg-success { background: var(--success); }
        .bg-warning { background: var(--warning); }
        .bg-danger { background: var(--danger); }
        .bg-info { background: var(--info); }
        .bg-light { background: var(--bg-light); }
        
        .mt-1 { margin-top: 0.25rem; }
        .mt-2 { margin-top: 0.5rem; }
        .mt-3 { margin-top: 1rem; }
        .mt-4 { margin-top: 1.5rem; }
        .mb-1 { margin-bottom: 0.25rem; }
        .mb-2 { margin-bottom: 0.5rem; }
        .mb-3 { margin-bottom: 1rem; }
        .mb-4 { margin-bottom: 1.5rem; }
        
        .p-1 { padding: 0.25rem; }
        .p-2 { padding: 0.5rem; }
        .p-3 { padding: 1rem; }
        .p-4 { padding: 1.5rem; }
        
        .flex { display: flex; }
        .flex-col { flex-direction: column; }
        .items-center { align-items: center; }
        .justify-between { justify-content: space-between; }
        .justify-center { justify-content: center; }
        .gap-1 { gap: 0.25rem; }
        .gap-2 { gap: 0.5rem; }
        .gap-3 { gap: 1rem; }
        .gap-4 { gap: 1.5rem; }
        
        .w-full { width: 100%; }
        .h-full { height: 100%; }
        
        .rounded { border-radius: var(--radius); }
        .rounded-lg { border-radius: var(--radius-lg); }
        .rounded-xl { border-radius: var(--radius-xl); }
        .rounded-full { border-radius: 9999px; }
        
        .shadow-xs { box-shadow: var(--shadow-xs); }
        .shadow-sm { box-shadow: var(--shadow-sm); }
        .shadow-md { box-shadow: var(--shadow-md); }
        .shadow-lg { box-shadow: var(--shadow-lg); }
        .shadow-xl { box-shadow: var(--shadow-xl); }

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
            color: var(--primary);
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
        .stat-card.pending .stat-number { color: var(--warning); }
        .stat-card.processing .stat-number { color: var(--info); }
        .stat-card.resolved .stat-number { color: var(--success); }
        
        .stat-card.pending::before { background: var(--warning); }
        .stat-card.processing::before { background: var(--info); }
        .stat-card.resolved::before { background: var(--success); }

        /* ============================================
           BULK ACTIONS BAR
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
/* 
        tr:hover {
            background: #fefef8;
        } */

        tr:last-child td {
            border-bottom: none;
        }

        .checkbox-col {
            width: 40px;
            text-align: center;
        }

        /* Product image styling */
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

        .badge-pending { background: #fef3c7; color: #d97706; }
        .badge-processing { background: #dbeafe; color: #2563eb; }
        .badge-resolved { background: #d1fae5; color: #059669; }
        .badge-closed { background: #e5e7eb; color: #4b5563; }
        .badge-success { background: var(--success); color: white; }
        .badge-warning { background: var(--warning); color: white; }
        .badge-danger { background: var(--danger); color: white; }
        .badge-info { background: var(--info); color: white; }

        .inquiry-type-badge {
            background: var(--primary-light);
            padding: 0.25rem 0.8rem;
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

        .page-btn:hover {
            background: var(--primary);
            border-color: var(--primary);
            /* color: white; */
            transform: translateY(-1px);
        }

        .page-btn.active {
            background: var(--primary);
            border-color: var(--primary);
            /* color: white; */
        }

        /* ============================================
           MODAL DIALOG
        ============================================ */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: var(--white);
            border-radius: var(--radius-xl);
            max-width: 750px;
            width: 90%;
            max-height: 85vh;
            overflow-y: auto;
            box-shadow: var(--shadow-xl);
            animation: modalSlideIn 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }

        @keyframes modalSlideIn {
            from {
                transform: translateY(-40px) scale(0.96);
                opacity: 0;
            }
            to {
                transform: translateY(0) scale(1);
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
            border-radius: var(--radius-xl) var(--radius-xl) 0 0;
        }

        .modal-header h3 {
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .modal-close {
            background: none;
            border: none;
            color: white;
            font-size: 1.6rem;
            cursor: pointer;
            transition: opacity var(--transition-fast);
            line-height: 1;
        }

        .modal-close:hover {
            opacity: 0.7;
            transform: scale(1.1);
        }

        .modal-body {
            padding: 1.5rem;
        }

        .detail-section {
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--gray-light);
        }

        .detail-section:last-child {
            border-bottom: none;
        }

        .detail-section h4 {
            color: var(--primary);
            margin-bottom: 1rem;
            font-size: 1rem;
            font-weight: 700;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 140px 1fr;
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
            word-break: break-word;
        }

        .message-box {
            background: var(--bg-light);
            padding: 1rem 1.2rem;
            border-radius: var(--radius);
            margin: 0.5rem 0;
            line-height: 1.6;
            border-left: 3px solid var(--primary);
        }

        .response-box {
            margin-top: 1rem;
        }

        .response-box textarea {
            width: 100%;
            padding: 0.85rem;
            border: 1.5px solid var(--gray-light);
            border-radius: var(--radius);
            font-family: inherit;
            resize: vertical;
            min-height: 100px;
            transition: var(--transition-fast);
        }

        .response-box textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(255, 102, 0, 0.1);
        }

        .status-select {
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            border: 1.5px solid var(--gray-light);
            font-family: inherit;
            font-size: 0.85rem;
            background: white;
            cursor: pointer;
        }

        .modal-footer {
            padding: 1.2rem 1.5rem;
            border-top: 1px solid var(--gray-light);
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            flex-wrap: wrap;
            background: var(--bg-light);
            border-radius: 0 0 var(--radius-xl) var(--radius-xl);
        }

        /* ============================================
           ALERT NOTIFICATIONS
        ============================================ */
        .alert {
            position: fixed;
            top: 24px;
            right: 24px;
            padding: 1rem 1.5rem;
            border-radius: var(--radius);
            display: none;
            z-index: 2000;
            animation: slideInRight 0.3s ease;
            box-shadow: var(--shadow-lg);
            font-weight: 500;
        }

        .alert.show {
            display: block;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(120px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .alert-success {
            background: linear-gradient(135deg, var(--success), #059669);
            color: white;
        }

        .alert-danger {
            background: linear-gradient(135deg, var(--danger), #dc2626);
            color: white;
        }

        .alert-info {
            background: linear-gradient(135deg, var(--info), #2563eb);
            color: white;
        }

        /* ============================================
           EMPTY STATE
        ============================================ */
        .empty-state {
            text-align: center;
            padding: 3.5rem;
            color: var(--gray);
        }

        .empty-state i {
            font-size: 3.5rem;
            color: var(--gray-light);
            margin-bottom: 1rem;
            opacity: 0.7;
        }

        .empty-state p {
            font-size: 0.95rem;
        }

        /* ============================================
           FULLY RESPONSIVE BREAKPOINTS
        ============================================ */
        
        /* Tablet & Medium Screens (768px - 1023px) */
        @media (max-width: 1023px) {
            .sidebar {
                width: 260px;
            }
            .main-content {
                margin-left: 260px;
                padding: 1.5rem;
            }
            .stats-grid {
                gap: 1rem;
            }
            .stat-number {
                font-size: 1.8rem;
            }
        }

        /* Tablet Portrait & Mobile Landscape (576px - 767px) */
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
            
            .detail-grid {
                grid-template-columns: 1fr;
                gap: 0.3rem;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
            
            .modal-content {
                width: 95%;
                margin: 1rem;
            }
            
            .modal-header h3 {
                font-size: 1.1rem;
            }
        }

        /* Mobile Portrait (320px - 575px) */
        @media (max-width: 575px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .main-content {
                padding: 0.875rem;
            }
            
            .top-bar {
                margin-bottom: 1rem;
            }
            
            .sidebar-header h3 {
                font-size: 1.3rem;
            }
            
            .nav-item {
                padding: 0.7rem 1.2rem;
                margin: 0.1rem 0.5rem;
            }
            
            th, td {
                padding: 0.75rem;
                font-size: 0.8rem;
            }
            
            td img {
                width: 40px;
                height: 40px;
            }
            
            .stat-number {
                font-size: 1.3rem;
            }
            
            .modal-header {
                padding: 1rem;
            }
            
            .modal-body {
                padding: 1rem;
            }
            
            .modal-footer {
                padding: 1rem;
            }
        }

        /* Extra Small Devices (below 320px) */
        @media (max-width: 319px) {
            .main-content {
                padding: 0.5rem;
            }
            
            .page-title {
                font-size: 1rem;
            }
            
            .stat-card h3 {
                font-size: 0.65rem;
            }
            
            .stat-number {
                font-size: 1.1rem;
            }
        }

        /* Touch Device Optimizations */
        @media (hover: none) and (pointer: coarse) {
            .btn, .nav-item, .stat-card, .page-btn, .modal-close {
                cursor: pointer;
                -webkit-tap-highlight-color: transparent;
            }
            
            button, .btn, select, input {
                min-height: 44px;
            }
            
            .btn-sm {
                min-height: 36px;
            }
        }

        /* Print Styles */
        @media print {
            .sidebar, .top-bar, .bulk-actions, .pagination, .action-buttons {
                display: none;
            }
            
            .main-content {
                margin-left: 0;
                padding: 0;
            }
            
            .table-container {
                box-shadow: none;
            }
            
            th, td {
                border: 1px solid #ddd;
            }
        }

        /* Dark Mode Support (Prefers Color Scheme) */
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
            
            .top-bar, .stat-card, .table-container, .bulk-actions {
                border-color: #334155;
            }
            
            th {
                background: #1e293b;
            }
            
            .message-box {
                background: #0f172a;
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
                <a href="{{url('/admin/inquiry')}}" class="nav-item active">
                    <i class="fas fa-envelope"></i> Inquiries
                </a>
                <a href="{{ url('/admin/orders') }}" class="nav-item" id="order-item">
                    <i class="fas fa-shopping-cart"></i> Orders
                </a>
                <a href="{{url('/admin/customer')}}" class="nav-item" id="customer-item">
                    <i class="fas fa-users"></i> Customers
                </a>
                <a href="{{url('/admin/vendors')}}" class="nav-item" id="product-item">
                    <i class="fas fa-box"></i> Vendors
                </a>
                <a href="{{url('/admin/product')}}" class="nav-item" id="product-item">
                    <i class="fas fa-box"></i> Products
                </a>
                <a href="{{'/admin/report'}}" class="nav-item" id="report-item">
                    <i class="fas fa-chart-line"></i> Reports
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content" id="main-content">
            <div class="top-bar">
                <h1 class="page-title"><i class="fas fa-envelope"></i> Customer Inquiries</h1>
                <div class="admin-info">
                    <span><i class="fas fa-user-circle"></i> Admin User</span>
                    <form method="POST" action="{{url('/vendor/logOut')}}">
                        @csrf
                        <button type="submit" class="admin-avatar" aria-label="Logout">👋</button>
                    </form>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Total Product</h3>
                    <div class="stat-number" id="totalCount">{{$totalProduct ?? 0}}</div>
                </div>
                <div class="stat-card pending">
                    <h3>In Stock</h3>
                    <div class="stat-number" id="pendingCount">{{$inStock ?? 0}}</div>
                </div>
                <div class="stat-card processing">
                    <h3>Coming Soon</h3>
                    <div class="stat-number" id="processingCount">{{$comingStock ?? 0}}</div>
                </div>
                <div class="stat-card resolved">
                    <h3>Out of Stock</h3>
                    <div class="stat-number" id="resolvedCount">{{$outOfStock ?? 0}}</div>
                </div>
            </div>

            <!-- Bulk Actions -->
            <div class="bulk-actions">
                <span id="selectedCount" style="font-size: 0.8rem; color: var(--gray);"></span>
            </div>

            <!-- Products Table -->
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Model</th>
                            <th>Discount(%)</th>
                            <th>Stock</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="inquiriesTableBody">
                        @forelse($product ?? [] as $prod)
                        <tr>
                            <td>#100{{$prod->id}}</td>
                            <td>{{$prod->title ?? 'N/A'}}</td>
                            <td>{{$prod->quantity ?? 0}}</td>
                            <td>${{number_format($prod->price ?? 0, 2)}}</td>
                            <td>{{$prod->model ?? '-'}}</td>
                            <td>{{$prod->discount ?? 0}}%</td>
                            <td>
                                <span class="badge {{($prod->stock ?? 0) <= 0 ? 'badge-danger' : (($prod->stock ?? 0) < 10 ? 'badge-warning' : 'badge-success')}}">
                                    {{$prod->stock ?? 0}}
                                </span>
                            </td>
                            <td><img src="{{$prod->image ?? 'https://placehold.co/50x50'}}" alt="product" loading="lazy"></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-sm btn-outline" onclick="viewProduct({{$prod->id}})"><i class="fas fa-eye"></i> View</button>
                                    <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="empty-state">
                                <i class="fas fa-box-open"></i>
                                <p>No products found</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>