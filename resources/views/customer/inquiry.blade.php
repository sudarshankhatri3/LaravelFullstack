<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="ShopEase - Customer Inquiry Center | Get product support, order assistance, and after-sales service" />
  <meta name="theme-color" content="#ff6600" />
  <title>ShopEase | Customer Inquiry Center</title>
  
  <!-- Preconnect for performance -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  
  <!-- Google Fonts + modern font stack -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet" />
  
  <!-- Font Awesome 6 (free CDN for icons) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  
  <style>
    /* ---------- GLOBAL RESET & VARIABLES (Matching ShopEase Brand) ---------- */
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
      --bg-light: #fafafc;
      --white: #ffffff;
      --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.05);
      --shadow-md: 0 8px 24px rgba(0, 0, 0, 0.08);
      --shadow-lg: 0 20px 35px -12px rgba(0, 0, 0, 0.15);
      --shadow-xl: 0 25px 45px -12px rgba(0, 0, 0, 0.25);
      --radius: 1rem;
      --radius-lg: 1.5rem;
      --radius-sm: 0.75rem;
      --transition: all 0.25s cubic-bezier(0.2, 0.9, 0.4, 1.1);
    }

    body {
      font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', sans-serif;
      background: linear-gradient(145deg, #f8fafc 0%, #f1f5f9 100%);
      color: var(--dark);
      line-height: 1.5;
      min-height: 100vh;
    }

    /* custom scrollbar */
    ::-webkit-scrollbar {
      width: 8px;
    }
    ::-webkit-scrollbar-track {
      background: var(--gray-light);
    }
    ::-webkit-scrollbar-thumb {
      background: var(--primary);
      border-radius: 8px;
    }

    /* container utility */
    .container {
      max-width: 1280px;
      margin: 0 auto;
      padding: 0 2rem;
    }

    /* ========== NAVBAR (Matching Original Brand) ========== */
    .navbar {
      position: sticky;
      top: 0;
      z-index: 1100;
      background: rgba(255, 255, 255, 0.96);
      backdrop-filter: blur(12px);
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
      padding: 0.9rem 2rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 1rem;
    }

    .logo {
      font-size: 1.85rem;
      font-weight: 800;
      letter-spacing: -0.02em;
      background: var(--primary-gradient);
      background-clip: text;
      -webkit-background-clip: text;
      color: transparent;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }
    .logo i {
      background: none;
      background-clip: unset;
      -webkit-background-clip: unset;
      color: var(--primary);
      font-size: 1.7rem;
    }

    .nav-links {
      display: flex;
      align-items: center;
      gap: 2rem;
      flex-wrap: wrap;
    }
    .nav-links a {
      text-decoration: none;
      font-weight: 500;
      color: var(--gray-dark);
      transition: var(--transition);
      font-size: 0.95rem;
    }
    .nav-links a:hover {
      color: var(--primary);
    }

    .auth-buttons {
      display: flex;
      gap: 0.8rem;
      margin-left: 0.5rem;
    }
    .login-btn, .signup-btn {
      padding: 0.55rem 1.3rem;
      border-radius: 2rem;
      font-weight: 600;
      text-decoration: none;
      transition: var(--transition);
      font-size: 0.9rem;
    }
    .login-btn {
      background: transparent;
      border: 1px solid var(--gray-light);
      color: var(--gray-dark);
    }
    .login-btn:hover {
      border-color: var(--primary);
      color: var(--primary);
      background: var(--primary-light);
    }
    .signup-btn {
      background: var(--primary);
      color: white;
      box-shadow: var(--shadow-sm);
    }
    .signup-btn:hover {
      background: var(--primary-dark);
      transform: translateY(-1px);
    }

    /* ========== HERO SECTION (Brand Trust) ========== */
    .inquiry-hero {
      background: linear-gradient(130deg, #fff9f2 0%, #ffffff 70%);
      padding: 3rem 2rem 3rem;
      text-align: center;
      border-bottom: 1px solid rgba(255, 102, 0, 0.1);
    }
    .inquiry-hero .badge {
      display: inline-block;
      background: var(--primary-light);
      color: var(--primary-dark);
      padding: 0.4rem 1.2rem;
      border-radius: 2rem;
      font-size: 0.8rem;
      font-weight: 700;
      margin-bottom: 1.2rem;
    }
    .inquiry-hero h1 {
      font-size: 3rem;
      font-weight: 800;
      letter-spacing: -0.02em;
      background: linear-gradient(to right, #1e293b, #334155);
      background-clip: text;
      -webkit-background-clip: text;
      color: transparent;
      margin-bottom: 1rem;
    }
    .inquiry-hero p {
      font-size: 1.1rem;
      color: var(--gray);
      max-width: 600px;
      margin: 0 auto;
    }

    /* ========== MAIN INQUIRY FORM (Single Powerful Form) ========== */
    .inquiry-main {
      padding: 4rem 2rem;
      max-width: 1000px;
      margin: 0 auto;
    }
    .form-card {
      background: var(--white);
      border-radius: 2rem;
      box-shadow: var(--shadow-xl);
      overflow: hidden;
      transition: transform 0.3s ease;
    }
    .form-card:hover {
      transform: translateY(-4px);
    }
    .form-header {
      background: linear-gradient(115deg, #0f2b3d 0%, #1a3a4f 100%);
      padding: 2rem 2.5rem;
      color: white;
      border-bottom: 4px solid var(--primary);
    }
    .form-header h2 {
      font-size: 1.8rem;
      font-weight: 700;
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .form-header h2 i {
      color: var(--primary);
      font-size: 2rem;
    }
    .form-header p {
      margin-top: 0.6rem;
      opacity: 0.85;
      font-size: 0.9rem;
    }
    .support-channels {
      display: flex;
      gap: 1.5rem;
      margin-top: 1.2rem;
      flex-wrap: wrap;
    }
    .support-channel {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 0.8rem;
      background: rgba(255,255,255,0.12);
      padding: 0.3rem 1rem;
      border-radius: 40px;
    }
    .support-channel i {
      font-size: 0.9rem;
      color: var(--primary);
    }

    /* form body */
    .form-body {
      padding: 2.5rem;
    }
    .form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1.5rem 2rem;
    }
    .full-width {
      grid-column: span 2;
    }
    .input-group {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }
    label {
      font-weight: 700;
      font-size: 0.85rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      color: var(--dark);
      display: flex;
      align-items: center;
      gap: 6px;
    }
    label .required {
      color: #e03a3a;
      font-size: 1rem;
      font-weight: bold;
    }
    label i {
      color: var(--primary);
      font-size: 0.85rem;
    }
    input, select, textarea {
      font-family: 'Inter', system-ui, sans-serif;
      width: 100%;
      padding: 0.9rem 1.2rem;
      border: 2px solid #e2e8f0;
      border-radius: 1rem;
      font-size: 0.95rem;
      background-color: #fefefe;
      transition: var(--transition);
      outline: none;
      color: var(--dark);
    }
    input:focus, select:focus, textarea:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 4px rgba(255, 102, 0, 0.1);
      background-color: #fffef7;
    }
    select {
      appearance: none;
      background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="%23334155" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>');
      background-repeat: no-repeat;
      background-position: right 1.2rem center;
      background-size: 1rem;
      cursor: pointer;
    }
    textarea {
      resize: vertical;
      min-height: 120px;
    }

    /* radio and checkbox groups (brand style) */
    .radio-group, .checkbox-group {
      display: flex;
      flex-wrap: wrap;
      gap: 1.5rem;
      margin-top: 0.3rem;
    }
    .radio-option, .check-option {
      display: flex;
      align-items: center;
      gap: 0.6rem;
      font-weight: 500;
      font-size: 0.9rem;
      color: var(--gray-dark);
      cursor: pointer;
    }
    .radio-option input, .check-option input {
      width: 1.1rem;
      height: 1.1rem;
      accent-color: var(--primary);
      margin: 0;
      padding: 0;
      cursor: pointer;
    }

    /* rating stars (pure css, enhances brand value) */
    .rating-stars {
      display: flex;
      flex-direction: row-reverse;
      justify-content: flex-end;
      gap: 0.5rem;
      margin-top: 0.4rem;
    }
    .rating-stars input {
      display: none;
    }
    .rating-stars label {
      font-size: 2rem;
      color: #cbd5e1;
      cursor: pointer;
      transition: color 0.15s;
      text-transform: none;
      letter-spacing: normal;
      font-weight: normal;
      background: transparent;
      padding: 0;
    }
    .rating-stars label:hover,
    .rating-stars label:hover ~ label,
    .rating-stars input:checked ~ label {
      color: var(--primary);
    }
    .rating-caption {
      font-size: 0.7rem;
      margin-top: 0.4rem;
      color: #64748b;
    }

    /* inquiry type tag */
    .inquiry-type-tag {
      background: var(--primary-light);
      border-radius: 2rem;
      padding: 0.2rem 0.8rem;
      display: inline-block;
      font-size: 0.7rem;
      font-weight: 600;
      color: var(--primary-dark);
    }

    /* file input styling */
    input[type="file"] {
      padding: 0.7rem 0.5rem;
      background: #f9f9fc;
      font-size: 0.85rem;
      border: 2px dashed #cbd5e1;
      border-radius: 1rem;
      cursor: pointer;
    }
    input[type="file"]:hover {
      border-color: var(--primary);
      background: var(--primary-light);
    }
    .helper-text {
      font-size: 0.7rem;
      color: #7c8ba0;
      margin-top: 0.3rem;
      display: flex;
      align-items: center;
      gap: 5px;
    }

    /* action buttons */
    .form-actions {
      margin-top: 2rem;
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
      justify-content: flex-start;
    }
    .btn-submit {
      background: var(--primary-gradient);
      border: none;
      padding: 0.9rem 2.5rem;
      border-radius: 3rem;
      font-weight: 700;
      font-size: 1rem;
      color: white;
      cursor: pointer;
      transition: var(--transition);
      font-family: inherit;
      letter-spacing: 0.3px;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      box-shadow: 0 4px 12px rgba(255, 102, 0, 0.3);
    }
    .btn-submit:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(255, 102, 0, 0.4);
      background: var(--primary-dark);
    }
    .btn-reset {
      background: #f1f5f9;
      border: 2px solid #e2e8f0;
      padding: 0.85rem 2rem;
      border-radius: 3rem;
      font-weight: 600;
      font-size: 0.9rem;
      color: var(--gray-dark);
      cursor: pointer;
      transition: var(--transition);
      font-family: inherit;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }
    .btn-reset:hover {
      background: #e6edf4;
      border-color: var(--primary);
      color: var(--primary);
    }

    /* trust banner */
    .trust-banner {
      background: linear-gradient(115deg, #fef7e8, #ffffff);
      border-radius: 1.5rem;
      padding: 1.2rem 2rem;
      margin-top: 2rem;
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 1rem;
      align-items: center;
      border: 1px solid rgba(255, 102, 0, 0.15);
    }
    .trust-item {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .trust-item i {
      font-size: 1.6rem;
      color: var(--primary);
    }
    .trust-item span {
      font-weight: 600;
      font-size: 0.85rem;
      color: var(--dark);
    }

    /* footer matching original */
    footer {
      background: #0b1120;
      color: #e2e8f0;
      padding: 3rem 2rem 1.5rem;
      margin-top: 4rem;
    }
    .footer-grid {
      max-width: 1280px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 2rem;
    }
    .footer-col h4 {
      color: white;
      margin-bottom: 1rem;
      font-size: 1.1rem;
    }
    .footer-col p, .footer-col a {
      color: #94a3b8;
      text-decoration: none;
      font-size: 0.9rem;
      line-height: 1.8;
      transition: 0.2s;
    }
    .footer-col a:hover {
      color: var(--primary);
    }
    .social-icons {
      display: flex;
      gap: 1rem;
      margin-top: 1rem;
    }
    .social-icons a {
      background: #1e293b;
      width: 36px;
      height: 36px;
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      color: white;
      transition: 0.2s;
    }
    .social-icons a:hover {
      background: var(--primary);
      transform: translateY(-2px);
    }
    .copyright {
      text-align: center;
      padding-top: 2.5rem;
      margin-top: 2rem;
      border-top: 1px solid #1e293b;
      font-size: 0.8rem;
      color: #5b6e8c;
    }

    /* responsive */
    @media (max-width: 750px) {
      .container {
        padding: 0 1rem;
      }
      .form-grid {
        grid-template-columns: 1fr;
        gap: 1.2rem;
      }
      .full-width {
        grid-column: span 1;
      }
      .form-body {
        padding: 1.5rem;
      }
      .form-header {
        padding: 1.5rem;
      }
      .inquiry-hero h1 {
        font-size: 2rem;
      }
      .navbar {
        flex-direction: column;
        padding: 1rem;
      }
      .trust-banner {
        flex-direction: column;
        align-items: flex-start;
      }
    }
  </style>
</head>
<body>

<!-- ========== NAVBAR (Same Brand Identity) ========== -->
<nav class="navbar">
  <a href="#" class="logo">
    <i class="fas fa-store"></i> ShopEase
  </a>
  <div class="nav-links">
    <a href="#">Home</a>
    <a href="{{url('/customer/product')}}">Products</a>
  </div>
</nav>

<!-- ========== INQUIRY HERO (Brand Value Focus) ========== -->
<section class="inquiry-hero">
  <div class="container">
    <div class="badge"><i class="fas fa-headset"></i> 24/7 Customer Support</div>
    <h1>How Can We Help You?</h1>
    <p>Whether you have questions about a product, need help with an existing order, or want to share feedback — we're here to provide you with exceptional service.</p>
  </div>
</section>

<!-- ========== MAIN INQUIRY FORM (Product + After Order Combined) ========== -->
<div class="inquiry-main">
  <div class="form-card">
    <div class="form-header">
      <h2><i class="fas fa-comment-dots"></i> Customer Inquiry Center</h2>
      <p>Fill out the form below and our dedicated support team will respond within 24 hours</p>
      <div class="support-channels">
        <span class="support-channel"><i class="fas fa-envelope"></i> Email Support</span>
        <span class="support-channel"><i class="fas fa-headset"></i> Live Chat (9AM-9PM)</span>
        <span class="support-channel"><i class="fas fa-phone-alt"></i> +1 800 123 4567</span>
      </div>
    </div>
    
    <form class="form-body" action="{{url('/customer/inquiry')}}" method="post">
      <div class="form-grid">
        <!-- Personal Information -->
        <div class="input-group">
          <label><i class="fas fa-user"></i> Full Name <span class="required">*</span></label>
          <input type="text" name="fullName" placeholder="e.g., Meera Sharma" required>
        </div>
        <div class="input-group">
          <label><i class="fas fa-envelope"></i> Email Address <span class="required">*</span></label>
          <input type="email" name="email" placeholder="hello@shopease.com" required>
        </div>
        <div class="input-group">
          <label><i class="fas fa-phone"></i> Phone Number</label>
          <input type="tel" name="phone" placeholder="+1 234 567 8900">
          <div class="helper-text"><i class="fas fa-info-circle"></i> For faster order updates</div>
        </div>
        <div class="input-group">
          <label><i class="fas fa-hashtag"></i> Order ID (Optional)</label>
          <input type="text" name="order_id" placeholder="e.g., SE-12345678">
          <div class="helper-text">Helps us track your order instantly</div>
        </div>

        <!-- Inquiry Type -->
        <div class="input-group full-width">
          <label><i class="fas fa-question-circle"></i> Inquiry Type <span class="required">*</span></label>
          <select name="inquiry_type" required>
            <option value="" disabled selected>— Select the nature of your inquiry —</option>
            <option value="product_question">📦 Product Information / Question</option>
            <option value="order_status">🚚 Order Status & Tracking</option>
            <option value="return_refund">🔄 Return, Refund & Exchange</option>
            <option value="payment_billing">💳 Payment / Billing Issue</option>
            <option value="after_order">📬 After Order Support (Delivery Issues)</option>
            <option value="feedback">💬 Suggestion / Feedback</option>
            <option value="other">❓ Other</option>
          </select>
          <div class="helper-text">Select the category that best matches your concern</div>
        </div>

        <!-- Product Name (for product inquiries) -->
        <div class="input-group full-width">
          <label><i class="fas fa-box"></i> Product Name / SKU (if applicable)</label>
          <input type="text" name="product_name" placeholder="e.g., AirFlow Pro Runners, SonicBass H9...">
          <div class="helper-text">Helps us identify the product you're asking about</div>
        </div>

        <!-- Preferred Contact Method -->
        <div class="input-group full-width">
          <label><i class="fas fa-comment"></i> Preferred Contact Method <span class="required">*</span></label>
          <div class="radio-group">
            <label class="radio-option">
              <input type="radio" name="contact_method" value="email" checked> 📧 Email
            </label>
            <label class="radio-option">
              <input type="radio" name="contact_method" value="phone"> 📞 Phone Call
            </label>
            <label class="radio-option">
              <input type="radio" name="contact_method" value="whatsapp"> 💬 WhatsApp / SMS
            </label>
          </div>
        </div>

        <!-- Customer Satisfaction Rating (Brand Trust) -->
        <div class="input-group full-width">
          <label><i class="fas fa-star"></i> Rate Your Recent Experience</label>
          <div class="rating-stars">
            <input type="radio" id="star5" name="rate" value="5">
            <label for="star5">★</label>
            <input type="radio" id="star4" name="rate" value="4">
            <label for="star4">★</label>
            <input type="radio" id="star3" name="rate" value="3">
            <label for="star3">★</label>
            <input type="radio" id="star2" name="rate" value="2">
            <label for="star2">★</label>
            <input type="radio" id="star1" name="rate" value="1">
            <label for="star1">★</label>
          </div>
          <div class="rating-caption"><i class="fas fa-heart" style="color: var(--primary);"></i> Your feedback helps us improve</div>
        </div>

        <!-- Detailed Message -->
        <div class="input-group full-width">
          <label><i class="fas fa-edit"></i> Your Message <span class="required">*</span></label>
          <textarea name="message" placeholder="Please describe your question, issue, or feedback in detail. Include any relevant order or product information to help us assist you better."></textarea>
          <div class="helper-text">We take every inquiry seriously and aim to resolve within 24 hours.</div>
        </div>

        <!-- Attachment (Optional) -->
        <div class="input-group full-width">
          <label><i class="fas fa-paperclip"></i> Attach Screenshot / Invoice (Optional)</label>
          <input type="file" name="screenshot" accept="image/*, .pdf, .jpg, .png">
          <div class="helper-text">Upload images of the product, order confirmation, or any relevant document (max 5MB).</div>
        </div>

        <!-- Newsletter Opt-in -->
        <div class="input-group full-width">
          <div class="checkbox-group">
            <label class="check-option">
              <input type="checkbox" name="newsletter" value="yes" checked> 📬 Subscribe to exclusive offers, early access & style updates
            </label>
          </div>
        </div>

        <!-- Privacy Note -->
        <div class="input-group full-width">
          <div class="helper-text" style="background: var(--primary-light); padding: 0.8rem 1rem; border-radius: 1rem; margin-top: 0.5rem;">
            <i class="fas fa-lock" style="color: var(--primary);"></i> Your information is protected by our privacy policy. We never share your data with third parties.
          </div>
        </div>
      </div>

      <!-- Form Actions -->
      <div class="form-actions">
        <button type="submit" class="btn-submit"><i class="fas fa-paper-plane"></i> Submit Inquiry</button>
        <button type="reset" class="btn-reset"><i class="fas fa-undo-alt"></i> Clear All Fields</button>
      </div>
    </form>
  </div>

  <!-- Trust Banner (Reinforcing Brand Value) -->
  <div class="trust-banner">
    <div class="trust-item"><i class="fas fa-clock"></i><span>24/7 Support Response</span></div>
    <div class="trust-item"><i class="fas fa-shield-alt"></i><span>100% Secure & Private</span></div>
    <div class="trust-item"><i class="fas fa-exchange-alt"></i><span>30-Day Easy Returns</span></div>
    <div class="trust-item"><i class="fas fa-trophy"></i><span>4.9★ Customer Satisfaction</span></div>
  </div>
</div>

<!-- ========== FOOTER (Matching Original Brand) ========== -->
<footer>
  <div class="footer-grid">
    <div class="footer-col">
      <h4><i class="fas fa-store"></i> ShopEase</h4>
      <p>Premium ecommerce platform delivering joy since 2022. 100% authentic products.</p>
      <div class="social-icons">
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-x-twitter"></i></a>
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
      </div>
    </div>
    <div class="footer-col">
      <h4>Shop</h4>
      <a href="#">New Arrivals</a><br>
      <a href="#">Best Sellers</a><br>
      <a href="#">Electronics</a><br>
      <a href="#">Fashion</a>
    </div>
    <div class="footer-col">
      <h4>Support</h4>
      <a href="#">Help Center</a><br>
      <a href="#">Returns & Warranty</a><br>
      <a href="#">Track Order</a><br>
      <a href="#">Contact Us</a>
    </div>
    <div class="footer-col">
      <h4>Legal</h4>
      <a href="#">Privacy Policy</a><br>
      <a href="#">Terms of Service</a><br>
      <a href="#">Cookie Preferences</a>
    </div>
  </div>
  <div class="copyright">
    <p>© 2026 ShopEase. All rights reserved. | Secure checkout powered by Stripe | Need help? <a href="#" style="color: var(--primary);">Contact Support</a></p>
  </div>
</footer>

<!-- No JavaScript — Pure HTML/CSS inquiry form. All functionality uses native form elements.
     Rating stars use CSS sibling selectors, buttons use native reset/submit. Brand value enhanced. -->
</body>
</html>