<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Category Manager | Add + Remove (Title & Description only)</title>
    <!-- Google Fonts + Font Awesome 6 -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f1f5f9;
            font-family: 'Inter', sans-serif;
            padding: 2rem 1.5rem;
            color: #0f172a;
        }

        /* main container */
        .category-wrapper {
            max-width: 1300px;
            margin: 0 auto;
        }

        /* header section */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1.2rem;
            margin-bottom: 2rem;
            background: white;
            padding: 1.2rem 2rem;
            border-radius: 1.8rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
            border: 1px solid #eef2f8;
        }

        .title-section h1 {
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(135deg, #1e293b, #2d3a4f);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .title-section h1 i {
            background: linear-gradient(145deg, #3b82f6, #8b5cf6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .title-section p {
            color: #475569;
            font-size: 0.85rem;
            margin-top: 6px;
        }

        .stats-badge {
            background: #eff6ff;
            padding: 8px 20px;
            border-radius: 60px;
            font-weight: 600;
            font-size: 0.9rem;
            color: #1e40af;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* ADD CATEGORY BUTTON (prominent CTA) */
        .add-category-btn {
            background: linear-gradient(105deg, #3b82f6, #2563eb);
            border: none;
            padding: 12px 28px;
            border-radius: 60px;
            font-weight: 600;
            font-size: 0.9rem;
            color: white;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 6px 14px rgba(59,130,246,0.25);
            font-family: inherit;
        }

        .add-category-btn:hover {
            background: linear-gradient(105deg, #2563eb, #1d4ed8);
            transform: translateY(-2px);
            box-shadow: 0 12px 20px -10px rgba(37,99,235,0.4);
        }

        .add-category-btn:active {
            transform: translateY(1px);
        }

       

        .form-group {
            margin-bottom: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group label {
            font-weight: 600;
            font-size: 0.85rem;
            color: #334155;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #e2e8f0;
            border-radius: 20px;
            font-family: 'Inter', sans-serif;
            font-size: 0.9rem;
            transition: 0.2s;
            outline: none;
        }

        .form-group input:focus, .form-group textarea:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59,130,246,0.15);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

      
        .close-modal-label {
            cursor: pointer;
        }

        /* category grid */
        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 1.6rem;
            margin: 1.8rem 0 1.5rem;
        }

        /* category card */
        .category-card {
            background: white;
            border-radius: 1.6rem;
            padding: 1.4rem 1.5rem 1.5rem;
            transition: transform 0.2s ease, box-shadow 0.2s;
            border: 1px solid #eef2f8;
            box-shadow: 0 6px 14px -8px rgba(0, 0, 0, 0.06);
            display: flex;
            flex-direction: column;
        }

        .category-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 30px -12px rgba(0, 0, 0, 0.12);
            border-color: #e0e7ff;
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .cat-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(145deg, #eef2ff, #ffffff);
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            color: #3b82f6;
            border: 1px solid #e2e8f0;
        }

        .remove-btn {
            background: transparent;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            padding: 8px 14px;
            border-radius: 60px;
            transition: all 0.2s;
            color: #94a3b8;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-weight: 500;
            font-family: inherit;
        }

        .remove-btn:hover {
            background: #fee2e2;
            color: #dc2626;
            transform: scale(1.02);
        }

        .category-title {
            font-size: 1.35rem;
            font-weight: 700;
            margin-bottom: 0.7rem;
            color: #0f172a;
            display: flex;
            align-items: center;
            gap: 8px;
            word-break: break-word;
        }

        .category-description {
            color: #475569;
            font-size: 0.9rem;
            line-height: 1.5;
            background: #f8fafc;
            padding: 12px 14px;
            border-radius: 20px;
            border-left: 3px solid #cbd5e1;
            word-break: break-word;
            flex: 1;
        }

        .card-footer {
            margin-top: 12px;
            font-size: 0.65rem;
            color: #94a3b8;
            border-top: 1px solid #edf2f7;
            padding-top: 10px;
            display: flex;
            justify-content: flex-end;
        }

        .empty-state {
            text-align: center;
            background: white;
            border-radius: 2rem;
            padding: 3rem 2rem;
            border: 1px solid #eef2f6;
            display: none;
            margin: 1.5rem 0;
        }

        .info-note {
            background: #fefce8;
            border-radius: 1rem;
            padding: 0.8rem 1.2rem;
            margin-top: 1rem;
            font-size: 0.75rem;
            color: #854d0e;
            border: 1px solid #fde047;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        @media (max-width: 760px) {
            body { padding: 1rem; }
            .page-header { flex-direction: column; align-items: stretch; }
            .add-category-btn { justify-content: center; }
            .category-grid { grid-template-columns: 1fr; }
        }

        .remove-btn {
            position: relative;
        }
        .remove-btn:hover::after {
            content: "Remove category";
            position: absolute;
            bottom: -34px;
            right: 0;
            background: #1e293b;
            color: white;
            font-size: 0.7rem;
            padding: 4px 10px;
            border-radius: 20px;
            white-space: nowrap;
            z-index: 10;
            pointer-events: none;
        }
        @media (max-width: 640px) {
            .remove-btn:hover::after { display: none; }
        }
    </style>
</head>
<body>

<div class="category-wrapper">
    <!-- Header with add button and stats -->
    <div class="page-header">
        <div class="title-section">
            <h1>
                <i class="fas fa-folder-tree"></i> 
                Category Manager
            </h1>
            <p><i class="fas fa-tag"></i> Each category stores only <strong>Title</strong> + <strong>Description</strong> • Add or remove instantly</p>
        </div>
        <div style="display: flex; gap: 15px; align-items: center;">
            <div class="stats-badge" id="statsCount">
                <i class="fas fa-list-ul"></i> 
                <span id="categoryCount">6</span> categories
            </div>
            <!-- ADD CATEGORY BUTTON (opens modal) -->
            <a href="{{url('/admin/category')}}" for="addModalToggle" class="add-category-btn">
                <i class="fas fa-plus-circle"></i> Add Category
</a>
        </div>
    </div>

    <!-- hidden checkbox for modal -->
    <input type="checkbox" id="addModalToggle" style="display: none;">
    
    

    <!-- Category Grid Container (dynamic) -->
    <div id="categoryGrid" class="category-grid">
        <!-- categories will be injected via JS, but initial static backup will be replaced -->
    </div>

    <!-- Empty state (hidden by default) -->
    <div id="emptyState" class="empty-state">
        <i class="fas fa-folder-open" style="font-size: 3rem; color: #cbd5e1;"></i>
        <h3 style="margin: 1rem 0 0.5rem;">No categories yet</h3>
        <p style="color: #5b6e8c;">Click the "Add Category" button to create your first category (title + description).</p>
        <label for="addModalToggle" class="add-category-btn" style="margin-top: 1rem; display: inline-flex;">+ Add your first category</label>
    </div>
    
    @foreach($category as $cat)
    <div class="info-note">
        <i class="fas fa-database"></i>
        <span><strong>Backend ready:</strong> Each category only stores <strong>{{$cat->category}}</strong> and <strong>{{$cat->description}}</strong>. Use "Add Category" to create new entries, and each card has a remove button to delete. Fully functional front-end demo with local state (no backend required for preview).</span>
    </div>
    @endforeach
</div>
</body>
</html>