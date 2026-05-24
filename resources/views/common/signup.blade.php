<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
  <meta name="description" content="ShopEase - Create your account" />
  <title>ShopEase | Sign Up</title>
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700;800&display=swap" rel="stylesheet" />
  
  <!-- Font Awesome 6 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  
  <style>
    /* Your existing CSS styles remain exactly the same */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    :root {
      --primary: #ff6600;
      --primary-dark: #e05a00;
      --primary-light: #ffefe5;
      --dark: #1a1f2c;
      --gray-dark: #2d3748;
      --gray: #4a5568;
      --gray-light: #edf2f7;
      --bg-light: #fafafc;
      --white: #ffffff;
      --success: #10b981;
      --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.05);
      --shadow-md: 0 8px 24px rgba(0, 0, 0, 0.08);
      --shadow-lg: 0 20px 35px -12px rgba(0, 0, 0, 0.15);
      --radius-card: 1.5rem;
      --transition: all 0.25s cubic-bezier(0.2, 0.9, 0.4, 1.1);
    }

    body {
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      background: linear-gradient(145deg, #f9fafc 0%, #f1f5f9 100%);
      color: var(--dark);
      min-height: 100vh;
    }

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

    /* Navbar */
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
      background: linear-gradient(135deg, var(--primary) 0%, #ff9944 100%);
      background-clip: text;
      -webkit-background-clip: text;
      color: transparent;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }
    .logo i {
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
    
    .nav-links .login-btn {
      border: 1.5px solid var(--primary);
      color: var(--primary);
      padding: 0.55rem 1.3rem;
      border-radius: 2rem;
    }
    .nav-links .login-btn:hover {
      background: var(--primary);
      color: white;
    }

    .cart-icon {
      position: relative;
      font-size: 1.4rem;
      color: var(--gray-dark);
      cursor: pointer;
    }
    .cart-badge {
      position: absolute;
      top: -8px;
      right: -12px;
      background: var(--primary);
      color: white;
      font-size: 0.7rem;
      font-weight: bold;
      border-radius: 30px;
      padding: 0.2rem 0.45rem;
      min-width: 18px;
      text-align: center;
    }

    /* Signup Container */
    .signup-wrapper {
      max-width: 1280px;
      margin: 3rem auto;
      padding: 0 1.5rem;
      min-height: calc(100vh - 180px);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .signup-card {
      background: var(--white);
      border-radius: var(--radius-card);
      box-shadow: var(--shadow-lg);
      display: flex;
      flex-direction: row;
      overflow: hidden;
      max-width: 1200px;
      width: 100%;
    }

    /* Left Visual Panel */
    .signup-visual {
      flex: 1;
      background: linear-gradient(145deg, var(--primary-dark), #ff884d);
      padding: 2.5rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      color: white;
      position: relative;
      overflow: hidden;
    }
    .signup-visual::before {
      content: "";
      position: absolute;
      top: -30%;
      right: -30%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
    }
    .signup-visual h2 {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 1rem;
      position: relative;
      z-index: 2;
    }
    .signup-visual p {
      font-size: 1rem;
      opacity: 0.9;
      margin-bottom: 2rem;
      position: relative;
      z-index: 2;
    }
    .feature-list {
      list-style: none;
      position: relative;
      z-index: 2;
    }
    .feature-list li {
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
      gap: 0.8rem;
      font-weight: 500;
    }
    .feature-list li i {
      font-size: 1.2rem;
      background: rgba(255,255,255,0.2);
      padding: 0.4rem;
      border-radius: 50%;
    }

    /* Right Form Panel */
    .signup-form {
      flex: 1.2;
      padding: 2.5rem;
      background: var(--white);
      max-height: 85vh;
      overflow-y: auto;
    }
    .signup-form::-webkit-scrollbar {
      width: 4px;
    }
    .form-header {
      margin-bottom: 1.8rem;
    }
    .form-header h3 {
      font-size: 1.8rem;
      font-weight: 700;
      color: var(--dark);
      margin-bottom: 0.5rem;
    }
    .form-header p {
      color: var(--gray);
      font-size: 0.9rem;
    }
    .input-group {
      margin-bottom: 1.2rem;
      position: relative;
    }
    .input-group i {
      position: absolute;
      left: 1rem;
      top: 50%;
      transform: translateY(-50%);
      color: #a0aec0;
      font-size: 1rem;
      pointer-events: none;
    }
    .input-group input, .input-group select, .input-group textarea {
      width: 100%;
      padding: 0.85rem 1rem 0.85rem 2.8rem;
      border: 1.5px solid #e2e8f0;
      border-radius: 2rem;
      font-size: 0.9rem;
      font-family: 'Inter', sans-serif;
      transition: var(--transition);
      background: var(--white);
      outline: none;
    }
    .input-group textarea {
      border-radius: 1rem;
      resize: vertical;
      min-height: 70px;
      padding-top: 0.85rem;
    }
    .input-group select {
      appearance: none;
      cursor: pointer;
      background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="%23a0aec0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>');
      background-repeat: no-repeat;
      background-position: right 1rem center;
      padding-right: 2.5rem;
    }
    .input-group input:focus, .input-group select:focus, .input-group textarea:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(255, 102, 0, 0.1);
    }
    .double-group {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1rem;
    }
    .checkbox-group {
      display: flex;
      align-items: center;
      margin: 1rem 0 1.5rem;
      font-size: 0.85rem;
    }
    .checkbox-group label {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      cursor: pointer;
    }
    .signup-btn-submit {
      background: var(--primary);
      color: white;
      border: none;
      padding: 0.9rem;
      width: 100%;
      border-radius: 2rem;
      font-weight: 700;
      font-size: 1rem;
      cursor: pointer;
      transition: var(--transition);
      margin-bottom: 1.2rem;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
    }
    .signup-btn-submit:hover {
      background: var(--primary-dark);
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
    }
    .divider {
      display: flex;
      align-items: center;
      gap: 0.8rem;
      margin: 1.5rem 0;
      color: #cbd5e0;
      font-size: 0.8rem;
    }
    .divider hr {
      flex: 1;
      border: none;
      height: 1px;
      background: #e2e8f0;
    }
    .social-login {
      display: flex;
      gap: 1rem;
      justify-content: center;
    }
    .social-icon {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      background: #f1f5f9;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      color: #475569;
      transition: var(--transition);
      text-decoration: none;
      font-size: 1.2rem;
    }
    .social-icon:hover {
      background: var(--primary-light);
      color: var(--primary);
      transform: scale(1.05);
    }
    .login-link {
      text-align: center;
      margin-top: 1.5rem;
      font-size: 0.9rem;
      color: var(--gray);
    }
    .login-link a {
      color: var(--primary);
      text-decoration: none;
      font-weight: 700;
    }

    footer {
      background: #0b1120;
      color: #e2e8f0;
      padding: 2rem 2rem 1.2rem;
      margin-top: 2rem;
    }
    .footer-bottom {
      max-width: 1280px;
      margin: 0 auto;
      text-align: center;
      font-size: 0.8rem;
      color: #94a3b8;
    }

    @media (max-width: 850px) {
      .signup-card {
        flex-direction: column;
      }
      .signup-visual {
        text-align: center;
      }
      .feature-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 1rem;
      }
      .feature-list li {
        margin-bottom: 0;
      }
      .double-group {
        grid-template-columns: 1fr;
        gap: 0.8rem;
      }
      .navbar {
        padding: 0.9rem 1.2rem;
      }
      .nav-links {
        gap: 1rem;
      }
    }
    @media (max-width: 480px) {
      .signup-form {
        padding: 1.8rem;
      }
      .form-header h3 {
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body>

<nav class="navbar">
  <a href="{{ url('/') }}" class="logo">
    <i class="fas fa-store"></i> ShopEase
  </a>
  <div class="nav-links">
    <a href="{{ url('/') }}">Home</a>
    <a href="#">Products</a>
    <a href="#">Offers</a>
    <a href="#">Support</a>
    <div class="cart-icon">
      <i class="fas fa-shopping-cart"></i>
      <span class="cart-badge">3</span>
    </div>
    <!-- FIXED: Changed from /common.login to /common/login -->
    <a href="{{ url('/common/login') }}" class="login-btn">Login</a>
  </div>
</nav>

<div class="signup-wrapper">
  <div class="signup-card">
    <div class="signup-visual">
      <h2>Join the ShopEase family 🛍️</h2>
      <p>Create an account and unlock exclusive perks, faster checkout, and order tracking.</p>
      <ul class="feature-list">
        <li><i class="fas fa-gift"></i> 15% welcome coupon</li>
        <li><i class="fas fa-clock"></i> Express checkout</li>
        <li><i class="fas fa-headset"></i> Priority support</li>
        <li><i class="fas fa-truck"></i> Free shipping on first order</li>
        <li><i class="fas fa-chart-line"></i> Order tracking</li>
      </ul>
    </div>
    <div class="signup-form">
      <div class="form-header">
        <h3>Create account</h3>
        <p>Fill in your details to get started</p>
      </div>
      <form id="signupForm" action="/common/signup" method="POST">
        @csrf 
        <div class="double-group">
          <div class="input-group">
            <i class="fas fa-user"></i>
           <input type="text" id="firstName" name="first_name" placeholder="First name" required />
          </div>
          <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" id="lastName" name="last_name" placeholder="Last name" required />
          </div>
        </div>
        <div class="input-group">
          <i class="fas fa-envelope"></i>
          <input type="email" id="email" name="email" placeholder="Email address" required />
        </div>
        <div class="input-group">
          <i class="fas fa-lock"></i>
         <input type="password" id="password" name="password" placeholder="Password" required />
        </div>
        <div class="input-group">
          <i class="fas fa-map-marker-alt"></i>
         <textarea id="address" name="address" placeholder="Address" required></textarea>
        </div>
        <div class="input-group">
          <i class="fas fa-briefcase"></i>
          <select id="role" name="role" required>
            <option value="" disabled selected>Select your role</option>
            <option value="customer">Customer</option>
            <option value="vendor">Seller / Vendor</option>
          </select>
        </div>
        <div class="checkbox-group">
          <label>
            <input type="checkbox" id="termsCheckbox" required />
            I agree to the <a href="#" style="color:var(--primary);">Terms & Conditions</a>
          </label>
        </div>
        <button type="submit" class="signup-btn-submit">
          <i class="fas fa-user-check"></i> Sign Up →
        </button>
        <div class="divider">
          <hr /><span>or</span><hr />
        </div>
        <div class="social-login">
          <a href="#" class="social-icon"><i class="fab fa-google"></i></a>
          <a href="#" class="social-icon"><i class="fab fa-apple"></i></a>
          <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
        </div>
        <!-- FIXED: Changed from login.html to Laravel route -->
        <div class="login-link">
          Already have an account? <a href="{{ url('/common/login') }}">Log in</a>
        </div>
      </form>
    </div>
  </div>
</div>

<footer>
  <div class="footer-bottom">
    <p>© 2026 ShopEase. All rights reserved. | Secure checkout powered by Stripe</p>
  </div>
</footer>

<script>
  document.getElementById('signupForm').addEventListener('submit', function(e) { 
    const firstName = document.getElementById('firstName').value.trim();
    const lastName = document.getElementById('lastName').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;
    const address = document.getElementById('address').value.trim();
    const role = document.getElementById('role').value;
    const termsChecked = document.getElementById('termsCheckbox').checked;
    
    // Validation
    if (!firstName || !lastName || !email || !password || !address || !role) {
      alert('❌ Please fill all required fields.');
      return;
    }
    
    if (password.length < 6) {
      alert('⚠️ Password must be at least 6 characters long.');
      return;
    }
    
    if (!termsChecked) {
      alert('📜 Please accept the Terms & Conditions to continue.');
      return;
    }
    
    if (!email.includes('@') || !email.includes('.')) {
      alert('📧 Please enter a valid email address.');
      return;
    }
  });
</script>
</body>
</html>