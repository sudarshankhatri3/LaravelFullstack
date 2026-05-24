<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="ShopEase - Discover amazing products at unbeatable prices. Premium ecommerce store for fashion, electronics, and lifestyle." />
  <meta name="theme-color" content="#ff6600" />
  <title>ShopEase | Premium Ecommerce Store</title>
  
  <!-- Preconnect for performance -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  
  <!-- Google Fonts + modern font stack -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet" />
  
  <!-- Font Awesome 6 (free CDN for icons) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  
  <style>
    /* ---------- GLOBAL RESET & VARIABLES ---------- */
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
      --bg-light: #fafafc;
      --white: #ffffff;
      --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.05);
      --shadow-md: 0 8px 24px rgba(0, 0, 0, 0.08);
      --shadow-lg: 0 20px 35px -12px rgba(0, 0, 0, 0.15);
      --radius: 1rem;
      --radius-sm: 0.75rem;
      --transition: all 0.25s cubic-bezier(0.2, 0.9, 0.4, 1.1);
    }

    body {
      font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', sans-serif;
      background: var(--bg-light);
      color: var(--dark);
      line-height: 1.5;
      scroll-behavior: smooth;
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

    /* buttons & interactive */
    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      background: var(--primary);
      color: white;
      font-weight: 600;
      padding: 0.85rem 1.8rem;
      border-radius: 2rem;
      text-decoration: none;
      transition: var(--transition);
      border: none;
      cursor: pointer;
      font-size: 0.95rem;
      letter-spacing: -0.01em;
      box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    }
    .btn i {
      font-size: 1rem;
    }
    .btn:hover {
      background: var(--primary-dark);
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
    }
    .btn-outline {
      background: transparent;
      border: 1.5px solid var(--primary);
      color: var(--primary);
      box-shadow: none;
    }
    .btn-outline:hover {
      background: var(--primary);
      color: white;
      border-color: var(--primary);
    }

    /* ---------- NAVBAR (Sticky + modern) ---------- */
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

    /* cart icon (production touch) */
    .cart-icon {
      position: relative;
      font-size: 1.4rem;
      color: var(--gray-dark);
      transition: var(--transition);
      cursor: pointer;
    }
    .cart-icon:hover {
      color: var(--primary);
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

    /* ---------- HERO SECTION (modern + layered) ---------- */
    .hero {
      background: linear-gradient(130deg, #fff9f2 0%, #ffffff 70%);
      padding: 3rem 2rem 4rem;
      position: relative;
      overflow: hidden;
    }
    .hero-grid {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 3rem;
      max-width: 1280px;
      margin: 0 auto;
      flex-wrap: wrap;
    }
    .hero-text {
      flex: 1.1;
      min-width: 280px;
    }
    .hero-text .badge {
      display: inline-block;
      background: var(--primary-light);
      color: var(--primary-dark);
      padding: 0.3rem 1rem;
      border-radius: 2rem;
      font-size: 0.8rem;
      font-weight: 600;
      margin-bottom: 1.2rem;
    }
    .hero-text h1 {
      font-size: 3.5rem;
      font-weight: 800;
      line-height: 1.2;
      letter-spacing: -0.02em;
      background: linear-gradient(to right, #1e293b, #334155);
      background-clip: text;
      -webkit-background-clip: text;
      color: transparent;
      margin-bottom: 1.2rem;
    }
    .hero-text p {
      font-size: 1.1rem;
      color: var(--gray);
      max-width: 500px;
      margin-bottom: 2rem;
    }
    .hero-stats {
      display: flex;
      gap: 2rem;
      margin-top: 2rem;
    }
    .stat h3 {
      font-size: 1.7rem;
      font-weight: 800;
      color: var(--primary);
    }
    .stat p {
      font-size: 0.85rem;
      margin: 0;
      color: #5b6e8c;
    }
    .hero-image {
      flex: 1;
      display: flex;
      justify-content: center;
    }
    .hero-image img {
      max-width: 100%;
      border-radius: 2rem;
      box-shadow: var(--shadow-lg);
      object-fit: cover;
      width: 480px;
      transition: transform 0.4s ease;
    }
    .hero-image img:hover {
      transform: scale(1.02);
    }

    /* ---------- FEATURES SECTION (trust signals) ---------- */
    .features {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 2rem;
      max-width: 1280px;
      margin: 3rem auto 0;
      padding: 0 2rem;
    }
    .feature-card {
      background: white;
      padding: 1.2rem 1.8rem;
      border-radius: 2rem;
      display: flex;
      align-items: center;
      gap: 1rem;
      box-shadow: var(--shadow-sm);
      transition: var(--transition);
      flex: 1;
      min-width: 180px;
      backdrop-filter: blur(2px);
    }
    .feature-card i {
      font-size: 2rem;
      color: var(--primary);
    }
    .feature-card span {
      font-weight: 600;
      color: var(--dark);
    }

    /* ---------- PRODUCTS SECTION (grid + hover) ---------- */
    .products-section {
      padding: 5rem 2rem;
      background: var(--white);
    }
    .section-header {
      text-align: center;
      margin-bottom: 3rem;
    }
    .section-header h2 {
      font-size: 2.5rem;
      font-weight: 700;
      letter-spacing: -0.01em;
    }
    .section-header p {
      color: var(--gray);
      max-width: 550px;
      margin: 0.8rem auto 0;
    }

    .product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 2rem;
      max-width: 1280px;
      margin: 0 auto;
    }
    .product-card {
      background: white;
      border-radius: var(--radius);
      overflow: hidden;
      transition: var(--transition);
      box-shadow: var(--shadow-sm);
      position: relative;
      cursor: default;
    }
    .product-card:hover {
      transform: translateY(-8px);
      box-shadow: var(--shadow-lg);
    }
    .product-badge {
      position: absolute;
      top: 1rem;
      left: 1rem;
      background: var(--primary);
      color: white;
      font-size: 0.7rem;
      font-weight: 700;
      padding: 0.2rem 0.8rem;
      border-radius: 2rem;
      z-index: 2;
    }
    .product-img {
      width: 100%;
      height: 260px;
      object-fit: cover;
      transition: transform 0.4s;
    }
    .product-card:hover .product-img {
      transform: scale(1.03);
    }
    .product-info {
      padding: 1.2rem 1.2rem 1.5rem;
    }
    .product-info h3 {
      font-size: 1.2rem;
      font-weight: 700;
      margin-bottom: 0.4rem;
    }
    .product-category {
      font-size: 0.75rem;
      color: #8a99b4;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 0.6rem;
    }
    .price-row {
      display: flex;
      align-items: baseline;
      gap: 0.8rem;
      margin: 0.75rem 0 1rem;
    }
    .current-price {
      font-size: 1.5rem;
      font-weight: 800;
      color: var(--primary);
    }
    .old-price {
      font-size: 0.9rem;
      color: #9ca3af;
      text-decoration: line-through;
    }
    .btn-sm {
      width: 100%;
      padding: 0.7rem;
      font-size: 0.85rem;
      border-radius: 2rem;
      background: var(--gray-light);
      color: var(--dark);
    }
    .btn-sm i {
      font-size: 0.85rem;
    }
    .btn-sm:hover {
      background: var(--primary);
      color: white;
    }

    /* newsletter / cta */
   
   

    /* footer (production style) */
    footer {
      background: #0b1120;
      color: #e2e8f0;
      padding: 3rem 2rem 1.5rem;
      margin-top: 2rem;
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

    /* responsiveness */
    @media (max-width: 900px) {
      .navbar {
        flex-direction: column;
        padding: 1rem;
      }
      .hero-text h1 {
        font-size: 2.5rem;
      }
      .hero-grid {
        flex-direction: column;
        text-align: center;
      }
      .hero-stats {
        justify-content: center;
      }
      .features {
        flex-direction: column;
        align-items: center;
      }
      .newsletter {
        margin: 2rem 1rem;
      }
      .container {
        padding: 0 1rem;
      }
    }
  </style>
</head>
<body>

<!-- ========== PRODUCTION NAVBAR ========== -->
<nav class="navbar">
  <a href="#" class="logo">
    <i class="fas fa-store"></i> ShopEase
  </a>
  <div class="nav-links">
    <a href="#">Home</a>
    <a href="#">Products</a>
    <a href="#">Offers</a>
    <a href="#">Support</a>
    <div class="cart-icon">
      <i class="fas fa-shopping-cart"></i>
      <span class="cart-badge">3</span>
    </div>
    <div class="auth-buttons">
      <a href="{{url('/common/login')}}" class="login-btn"><i class="fas fa-user"></i> Login</a>
      <a href="{{url('/common/signup')}}"" class="signup-btn">Sign Up</a>
    </div>
  </div>
</nav>

<!-- ========== HERO SECTION (Premium) ========== -->
<section class="hero">
  <div class="hero-grid">
    <div class="hero-text">
      <div class="badge"><i class="fas fa-tag"></i> Limited Time Offer</div>
      <h1>Elevate Your Style <br> Smart Deals Await</h1>
      <p>Explore thousands of premium electronics, fashion, and home essentials. Free shipping & 30-day returns.</p>
      <a href="#" class="btn"><i class="fas fa-bolt"></i> Start Shopping</a>
      <div class="hero-stats">
        <div class="stat"><h3>50k+</h3><p>Happy Customers</p></div>
        <div class="stat"><h3>4.9★</h3><p>Trustpilot Rating</p></div>
        <div class="stat"><h3>24/7</h3><p>Support</p></div>
      </div>
    </div>
    <div class="hero-image">
      <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=800&auto=format" alt="Hero product display">
    </div>
  </div>
</section>

<!-- Trust features (real-world conversion) -->
<div class="features">
  <div class="feature-card"><i class="fas fa-truck-fast"></i><span>Free express delivery</span></div>
  <div class="feature-card"><i class="fas fa-lock"></i><span>Secure payment</span></div>
  <div class="feature-card"><i class="fas fa-rotate-left"></i><span>30-day easy returns</span></div>
  <div class="feature-card"><i class="fas fa-gem"></i><span>Premium quality</span></div>
</div>

<!-- ========== PRODUCTS SECTION (Dynamic layout) ========== -->
<section class="products-section">
  <div class="section-header">
    <h2>Featured <span style="color: var(--primary);">Collections</span></h2>
    <p>Handpicked bestsellers loved by our community</p>
  </div>
  <div class="product-grid">
    <!-- Product 1 -->
    <div class="product-card">
      <div class="product-badge">Trending</div>
      <img class="product-img" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600&auto=format" alt="Nike running shoes">
      <div class="product-info">
        <h3>AirFlow Pro Runners</h3>
        <div class="product-category">Men's Footwear</div>
        <div class="price-row"><span class="current-price">$59</span><span class="old-price">$89</span></div>
        <button class="btn btn-sm"><i class="fas fa-shopping-cart"></i> Quick Add</button>
      </div>
    </div>
    <!-- Product 2 -->
    <div class="product-card">
      <img class="product-img" src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=600&auto=format" alt="Wireless headphones">
      <div class="product-info">
        <h3>SonicBass H9 Headphones</h3>
        <div class="product-category">Electronics</div>
        <div class="price-row"><span class="current-price">$89</span><span class="old-price">$129</span></div>
        <button class="btn btn-sm"><i class="fas fa-shopping-cart"></i> Quick Add</button>
      </div>
    </div>
    <!-- Product 3 -->
    <div class="product-card">
      <div class="product-badge">-25%</div>
      <img class="product-img" src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?w=600&auto=format" alt="Instant Camera">
      <div class="product-info">
        <h3>RetroSnap Camera</h3>
        <div class="product-category">Photography</div>
        <div class="price-row"><span class="current-price">$120</span><span class="old-price">$160</span></div>
        <button class="btn btn-sm"><i class="fas fa-shopping-cart"></i> Quick Add</button>
      </div>
    </div>
    <!-- Product 4 (Additional premium product) -->
    <div class="product-card">
      <img class="product-img" src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?w=600&auto=format" alt="Smartwatch">
      <div class="product-info">
        <h3>Chrono Smartwatch 4</h3>
        <div class="product-category">Wearables</div>
        <div class="price-row"><span class="current-price">$199</span><span class="old-price">$279</span></div>
        <button class="btn btn-sm"><i class="fas fa-shopping-cart"></i> Quick Add</button>
      </div>
    </div>
  </div>
</section>

<!-- ========== FOOTER (Production Ready) ========== -->
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
    <p>© 2026 ShopEase. All rights reserved. | Secure checkout powered by Stripe</p>
  </div>
</footer>

<!-- tiny interactive notification for real-world feel -->
<script>
  (function() {
    // Simple alert for subscribe (demo)
    const subBtn = document.getElementById('subscribeBtn');
    if(subBtn) {
      subBtn.addEventListener('click', function(e) {
        const emailInput = document.getElementById('newsEmail');
        const email = emailInput.value.trim();
        if(email && email.includes('@') && email.includes('.')) {
          alert(`✨ Thanks ${email}! Your 15% coupon code: WELCOME15 ✨`);
          emailInput.value = '';
        } else if(email === '') {
          alert('Please enter a valid email address to subscribe 🛍️');
        } else {
          alert('Please provide a valid email (e.g., name@example.com)');
        }
      });
    }

    // Add interactive effect for "Quick Add" buttons - simulated cart addition
    const addButtons = document.querySelectorAll('.btn-sm');
    addButtons.forEach(btn => {
      btn.addEventListener('click', function(e) {
        e.preventDefault();
        const productCard = this.closest('.product-card');
        let productName = 'Item';
        if(productCard) {
          const titleElem = productCard.querySelector('h3');
          if(titleElem) productName = titleElem.innerText;
        }
        // Update cart badge simulation (increment)
        const badge = document.querySelector('.cart-badge');
        let currentVal = parseInt(badge.innerText, 10);
        if(isNaN(currentVal)) currentVal = 0;
        badge.innerText = currentVal + 1;
        
        // subtle feedback
        const toast = document.createElement('div');
        toast.innerText = `✓ Added ${productName} to cart`;
        toast.style.position = 'fixed';
        toast.style.bottom = '20px';
        toast.style.right = '20px';
        toast.style.backgroundColor = '#1a2c3e';
        toast.style.color = 'white';
        toast.style.padding = '12px 20px';
        toast.style.borderRadius = '40px';
        toast.style.fontSize = '0.85rem';
        toast.style.zIndex = '9999';
        toast.style.boxShadow = '0 8px 20px rgba(0,0,0,0.2)';
        toast.style.backdropFilter = 'blur(4px)';
        document.body.appendChild(toast);
        setTimeout(() => { toast.style.opacity = '0'; setTimeout(() => toast.remove(), 300); }, 1800);
      });
    });
  })();
</script>
</body>
</html>