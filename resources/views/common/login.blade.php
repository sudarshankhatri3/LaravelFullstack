<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
  <meta name="description" content="ShopEase - Login to your account" />
  <title>ShopEase | Login</title>
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700;800&display=swap" rel="stylesheet" />
  
  <!-- Font Awesome 6 -->
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
      --primary-light: #ffefe5;
      --dark: #1a1f2c;
      --gray-dark: #2d3748;
      --gray: #4a5568;
      --gray-light: #edf2f7;
      --bg-light: #fafafc;
      --white: #ffffff;
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
    
    .nav-links .signup-btn {
      background: var(--primary);
      color: white;
      padding: 0.55rem 1.3rem;
      border-radius: 2rem;
    }
    .nav-links .signup-btn:hover {
      background: var(--primary-dark);
      transform: translateY(-1px);
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

    /* Login Container */
    .login-wrapper {
      max-width: 1280px;
      margin: 3rem auto;
      padding: 0 1.5rem;
      min-height: calc(100vh - 180px);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-card {
      background: var(--white);
      border-radius: var(--radius-card);
      box-shadow: var(--shadow-lg);
      display: flex;
      flex-direction: row;
      overflow: hidden;
      max-width: 1100px;
      width: 100%;
    }

    /* Left Visual Panel */
    .login-visual {
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
    .login-visual::before {
      content: "";
      position: absolute;
      top: -30%;
      right: -30%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
    }
    .login-visual h2 {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 1rem;
      position: relative;
      z-index: 2;
    }
    .login-visual p {
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
    .login-form {
      flex: 1;
      padding: 2.5rem;
      background: var(--white);
    }
    .form-header {
      margin-bottom: 2rem;
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
      margin-bottom: 1.5rem;
      position: relative;
    }
    .input-group i {
      position: absolute;
      left: 1rem;
      top: 50%;
      transform: translateY(-50%);
      color: #a0aec0;
      font-size: 1.1rem;
    }
    .input-group input {
      width: 100%;
      padding: 0.9rem 1rem 0.9rem 2.8rem;
      border: 1.5px solid #e2e8f0;
      border-radius: 2rem;
      font-size: 0.95rem;
      font-family: 'Inter', sans-serif;
      transition: var(--transition);
      outline: none;
    }
    .input-group input:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(255, 102, 0, 0.1);
    }
    .checkbox-group {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin: 1rem 0 1.8rem;
      font-size: 0.85rem;
    }
    .checkbox-group label {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      cursor: pointer;
    }
    .forgot-link {
      color: var(--primary);
      text-decoration: none;
      font-weight: 500;
    }
    .login-btn {
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
    .login-btn:hover {
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
    .register-link {
      text-align: center;
      margin-top: 1.5rem;
      font-size: 0.9rem;
      color: var(--gray);
    }
    .register-link a {
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
      .login-card {
        flex-direction: column;
      }
      .login-visual {
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
      .navbar {
        padding: 0.9rem 1.2rem;
      }
      .nav-links {
        gap: 1rem;
      }
    }
    @media (max-width: 480px) {
      .login-form {
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
  <a href="index.html" class="logo">
    <i class="fas fa-store"></i> ShopEase
  </a>
  <div class="nav-links">
    <a href="index.html">Home</a>
    <a href="#">Products</a>
    <a href="#">Offers</a>
    <a href="#">Support</a>
    <div class="cart-icon">
      <i class="fas fa-shopping-cart"></i>
      <span class="cart-badge">3</span>
    </div>
    <a href="{{url('common/signup')}}" class="signup-btn">Sign Up</a>
  </div>
</nav>

<div class="login-wrapper">
  <div class="login-card">
    <div class="login-visual">
      <h2>Welcome back 👋</h2>
      <p>Sign in to access your wishlist, order history, and personalized deals.</p>
      <ul class="feature-list">
        <li><i class="fas fa-chart-line"></i> Track orders in real-time</li>
        <li><i class="fas fa-heart"></i> Saved favorites</li>
        <li><i class="fas fa-tachometer-alt"></i> Faster checkout</li>
        <li><i class="fas fa-gift"></i> Exclusive member discounts</li>
      </ul>
    </div>
    <div class="login-form">
      <div class="form-header">
        <h3>Log in</h3>
        <p>Enter your credentials to continue</p>
      </div>
      <form id="loginForm" action="{{url('/common/login') }}" method="POST">
        <div class="input-group">
          <i class="fas fa-envelope"></i>
          <input type="email" id="email" name="email" placeholder="Email address" required />
        </div>
        <div class="input-group">
          <i class="fas fa-lock"></i>
         <input type="password" id="password" name="password" placeholder="Password" required />
        </div>
        <div class="checkbox-group">
          <label>
            <input type="checkbox" id="rememberMe" /> Remember me
          </label>
          <a href="{{url('common/sendLink')}}" class="forgot-link">Forgot password?</a>
        </div>
        <button type="submit" class="login-btn">
          <i class="fas fa-arrow-right-to-bracket"></i> Login →
        </button>
        <div class="divider">
          <hr /><span>or</span><hr />
        </div>
        <div class="social-login">
          <a href="#" class="social-icon"><i class="fab fa-google"></i></a>
          <a href="#" class="social-icon"><i class="fab fa-apple"></i></a>
          <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
        </div>
        <div class="register-link">
          New to ShopEase? <a href="signup.html">Create an account</a>
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
  // document.getElementById('loginForm').addEventListener('submit', function(e) {
  //   const email = document.getElementById('email').value.trim();
  //   const password = document.getElementById('password').value;
  //   alert(password);
  //   const rememberMe = document.getElementById('rememberMe').checked;
    
  //   if (!email || !password) {
  //     alert('❌ Please enter both email and password.');
  //     return;
  //   }
    
  //   if (!email.includes('@') || !email.includes('.')) {
  //     alert('📧 Please enter a valid email address.');
  //     return;
  //   }
  // });
</script>
</body>
</html>