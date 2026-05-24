<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <title>Create Category | Admin Form</title>
  <!-- Google Fonts + simple reset -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: linear-gradient(145deg, #eef2ff 0%, #f9fafc 100%);
      font-family: 'Inter', sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem 1.5rem;
    }

    /* modern card container */
    .form-container {
      max-width: 680px;
      width: 100%;
      margin: 0 auto;
    }

    /* card with glassmorphism / soft shadow */
    .category-card {
      background: rgba(255, 255, 255, 0.98);
      backdrop-filter: blur(0px);
      border-radius: 2rem;
      box-shadow: 0 25px 45px -12px rgba(0, 0, 0, 0.2), 0 2px 6px rgba(0, 0, 0, 0.02);
      overflow: hidden;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      border: 1px solid rgba(203, 213, 225, 0.5);
    }

    .category-card:hover {
      box-shadow: 0 30px 50px -18px rgba(0, 0, 0, 0.25);
    }

    /* header area */
    .form-header {
      padding: 1.8rem 2rem 0.8rem 2rem;
      border-bottom: 1px solid #eef2f8;
      background: white;
    }

    .form-header h2 {
      font-size: 1.8rem;
      font-weight: 700;
      background: linear-gradient(135deg, #1f2b3c, #2d3a4f);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      letter-spacing: -0.3px;
      display: inline-flex;
      align-items: center;
      gap: 12px;
    }

    .form-header h2 i {
      background: linear-gradient(145deg, #3b82f6, #8b5cf6);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      font-size: 1.7rem;
    }

    .form-header p {
      color: #475569;
      margin-top: 8px;
      font-size: 0.9rem;
      font-weight: 400;
    }

    /* main form area */
    .form-body {
      padding: 1.8rem 2rem 2rem 2rem;
      background: #ffffff;
    }

    /* input group modern style */
    .input-group {
      margin-bottom: 1.8rem;
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .input-group label {
      font-weight: 600;
      font-size: 0.85rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      color: #334155;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .input-group label i {
      color: #3b82f6;
      font-size: 0.9rem;
      width: 20px;
    }

    .required-star {
      color: #ef4444;
      font-size: 0.8rem;
      margin-left: 4px;
    }

    /* field styles */
    input, textarea {
      width: 100%;
      padding: 14px 18px;
      font-size: 0.95rem;
      font-family: 'Inter', monospace;
      border: 1.5px solid #e2e8f0;
      border-radius: 20px;
      background: #fefefe;
      transition: all 0.2s ease;
      outline: none;
      color: #0f172a;
      font-weight: 500;
    }

    input:focus, textarea:focus {
      border-color: #3b82f6;
      box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
      background: #ffffff;
    }

    textarea {
      resize: vertical;
      min-height: 120px;
      line-height: 1.5;
    }

    /* helper text */
    .helper-text {
      font-size: 0.7rem;
      color: #64748b;
      margin-top: 6px;
      margin-left: 12px;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    /* checkbox row (optional demo) */
    .checkbox-row {
      display: flex;
      align-items: center;
      gap: 12px;
      margin: 16px 0 12px;
      flex-wrap: wrap;
    }

    .checkbox-row label {
      font-weight: 500;
      font-size: 0.85rem;
      color: #2c3e50;
      cursor: pointer;
    }

    .checkbox-row input {
      width: 18px;
      height: 18px;
      accent-color: #3b82f6;
      margin: 0;
    }

    /* action buttons */
    .action-buttons {
      display: flex;
      gap: 16px;
      margin-top: 28px;
      flex-wrap: wrap;
    }

    .btn-primary {
      background: linear-gradient(105deg, #1e293b, #0f172a);
      border: none;
      padding: 12px 28px;
      border-radius: 40px;
      font-weight: 600;
      font-size: 0.9rem;
      color: white;
      display: inline-flex;
      align-items: center;
      gap: 12px;
      cursor: pointer;
      transition: all 0.2s;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
      border: 1px solid rgba(255,255,255,0.1);
    }

    .btn-primary:hover {
      background: linear-gradient(105deg, #0f172a, #020617);
      transform: translateY(-2px);
      box-shadow: 0 12px 20px -12px rgba(0, 0, 0, 0.3);
    }

    .btn-secondary {
      background: #f1f5f9;
      border: 1px solid #e2e8f0;
      padding: 12px 28px;
      border-radius: 40px;
      font-weight: 600;
      font-size: 0.9rem;
      color: #334155;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      cursor: pointer;
      transition: all 0.2s;
    }

    .btn-secondary:hover {
      background: #e6edf5;
      border-color: #cbd5e1;
      transform: translateY(-1px);
    }

    /* simple alert / demo message */
    .demo-feedback {
      margin-top: 20px;
      padding: 12px 16px;
      background: #f0f9ff;
      border-radius: 20px;
      font-size: 0.8rem;
      color: #075985;
      border-left: 4px solid #3b82f6;
      display: flex;
      align-items: center;
      gap: 12px;
      transition: 0.2s;
    }

    .demo-feedback i {
      font-size: 1rem;
      color: #0284c7;
    }

    /* responsive touches */
    @media (max-width: 550px) {
      .form-header, .form-body {
        padding: 1.5rem;
      }
      .form-header h2 {
        font-size: 1.4rem;
      }
      .btn-primary, .btn-secondary {
        flex: 1;
        justify-content: center;
      }
    }

    /* subtle divider */
    .divider-light {
      height: 1px;
      background: linear-gradient(to right, #e2e8f0, transparent);
      margin: 12px 0 8px;
    }
  </style>
</head>
<body>
<div class="form-container">
  <div class="category-card">
    <div class="form-header">
      <h2>
        <i class="fas fa-tag"></i> 
        New Category
      </h2>
      <p>Organize your products, posts, or inventory by creating meaningful categories.</p>
    </div>
    <div class="form-body">
      <!-- Category Form: pure HTML + CSS (no JS required, but demo alert will show values) -->
      <form id="categoryForm" action="{{url('/admin/category')}}" method="POST">
        @csrf
        <!-- Category name field -->
        <div class="input-group">
          <label>
            <i class="fas fa-folder-open"></i> Category Name 
            <span class="required-star">*</span>
          </label>
          <input type="text" id="categoryName" name="category" placeholder="e.g., Electronics, Lifestyle, Office Supplies" autocomplete="off" required>
          <div class="helper-text">
            <i class="fas fa-info-circle" style="font-size: 0.65rem;"></i> 
            Unique, slug-friendly name (max 60 characters)
          </div>
        </div>

        <!-- Description field (textarea) -->
        <div class="input-group">
          <label>
            <i class="fas fa-align-left"></i> Description
          </label>
          <textarea id="categoryDesc" name="description" placeholder="Write a brief description about this category ..." required></textarea>
          <div class="helper-text">
            <i class="fas fa-pen-fancy"></i> 
            Provide useful context for editors or customers (optional, up to 300 chars)
          </div>
        </div>

        <!-- extra modern touch: status row (just for demonstration)
        <div class="checkbox-row">
          <input type="checkbox" id="activeStatus" name="is_active" checked>
          <label for="activeStatus"><i class="fas fa-check-circle" style="color:#10b981;"></i> Active (visible on frontend)</label>
        </div>
        
        <div class="divider-light"></div>

        Buttons row -->
        <div class="action-buttons">
          
          <button type="submit" class="btn-primary" id="submitBtn">
            <i class="fas fa-save"></i> Create Category
          </button>
        </div>

        
        <div id="formFeedback" class="demo-feedback" style="display: none;">
          <i class="fas fa-check-circle"></i>
          <span id="feedbackMessage"></span>   
        </div>
      </form>

    </div>
  </div>
  <!-- subtle credit / note: modern and minimal -->
  <div style="text-align: center; margin-top: 1.4rem; font-size: 0.7rem; color: #5b6e8c;">
    <i class="fas fa-database"></i> Category form · ready to integrate with any backend
  </div>
</div>
</body>
</html>