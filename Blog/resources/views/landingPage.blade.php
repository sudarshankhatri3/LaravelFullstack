<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BlogFlow - Blog Management System</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background: #0b0f19;
    color: #ffffff;
    line-height: 1.6;
}

/* NAVBAR */
nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 60px;
    background: #0b0f19;
    position: sticky;
    top: 0;
    border-bottom: 1px solid #1c2233;
}

nav h2 {
    color: #6c63ff;
}

nav ul {
    display: flex;
    list-style: none;
    gap: 25px;
    align-items: center;
}

nav ul li {
    color: #ccc;
    cursor: pointer;
}

nav ul li:hover {
    color: white;
}

.signup-btn {
    padding: 10px 16px;
    background: #6c63ff;
    border: none;
    border-radius: 8px;
    color: white;
    cursor: pointer;
}

/* HERO */
.hero {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 90px 60px;
    gap: 40px;
}

.hero-text {
    max-width: 50%;
}

.hero-text h1 {
    font-size: 48px;
    margin-bottom: 20px;
}

.hero-text p {
    color: #aaa;
    margin-bottom: 25px;
}

.btn {
    padding: 12px 18px;
    border-radius: 8px;
    cursor: pointer;
    border: none;
    margin-right: 10px;
}

.btn-primary {
    background: #6c63ff;
    color: white;
}

.btn-secondary {
    background: transparent;
    border: 1px solid #6c63ff;
    color: #6c63ff;
}

/* HERO BOX */
.hero-box {
    width: 420px;
    height: 280px;
    background: #151a2b;
    border-radius: 12px;
    border: 1px solid #222;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #888;
}

/* FEATURES */
.features {
    padding: 80px 60px;
    text-align: center;
}

.features h2 {
    margin-bottom: 40px;
}

.feature-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.card {
    background: #151a2b;
    padding: 25px;
    border-radius: 12px;
    border: 1px solid #222;
}

.card h3 {
    color: #6c63ff;
    margin-bottom: 10px;
}

/* PREVIEW */
.preview {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 80px 60px;
    gap: 40px;
}

.preview-box {
    width: 500px;
    height: 300px;
    background: #151a2b;
    border-radius: 12px;
    border: 1px solid #222;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #888;
}

/* PRICING */
.pricing {
    text-align: center;
    padding: 80px 60px;
}

.price-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin-top: 40px;
}

.price-card {
    background: #151a2b;
    padding: 30px;
    border-radius: 12px;
    border: 1px solid #222;
}

.price-card h3 {
    color: #6c63ff;
    margin-bottom: 10px;
}

/* TESTIMONIAL */
.testimonial {
    padding: 80px 60px;
    text-align: center;
}

.testimonial-box {
    background: #151a2b;
    padding: 30px;
    border-radius: 12px;
    border: 1px solid #222;
    margin-top: 20px;
    color: #ccc;
}

/* FOOTER */
footer {
    background: #0a0d16;
    padding: 50px 60px;
    border-top: 1px solid #1c2233;
}

.footer-container {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
}

.footer-col h3 {
    color: #6c63ff;
    margin-bottom: 15px;
}

.footer-col p,
.footer-col a {
    color: #aaa;
    font-size: 14px;
    display: block;
    margin-bottom: 8px;
    text-decoration: none;
}

.footer-bottom {
    text-align: center;
    margin-top: 40px;
    color: #666;
    font-size: 13px;
}

/* RESPONSIVE */
@media (max-width: 900px) {
    .hero, .preview {
        flex-direction: column;
        text-align: center;
    }

    .hero-text {
        max-width: 100%;
    }

    .hero-box, .preview-box {
        width: 100%;
    }

    .feature-grid, .price-grid {
        grid-template-columns: 1fr;
    }

    nav {
        flex-direction: column;
        gap: 15px;
    }

    .footer-container {
        grid-template-columns: 1fr;
        text-align: center;
    }
}
</style>

</head>
<body>

<!-- NAVBAR -->
<nav>
    <h2>BlogFlow</h2>
    <ul>
        <li><a href="{{url('/postBlog')}}">Post</a></li>
        <li>Pricing</li>
        <li>Docs</li>
        <li>Login</li>
        <li><a class="signup-btn" href={{url('register')}}>Sign Up</a></li>
    </ul>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="hero-text">
        <h1>Build & Manage Your Blog Easily</h1>
        <p>
            A modern blog management system for developers and creators.
            Write, manage, and publish content in one place.
        </p>
        <button class="btn btn-primary">Get Started</button>
        <button class="btn btn-secondary">View Demo</button>
    </div>

    <div class="hero-box">
        Dashboard Preview
    </div>
</section>

<!-- FEATURES -->
<section class="features">
    <h2>Features</h2>
    <div class="feature-grid">
        <div class="card">
            <h3>Smart Editor</h3>
            <p>Write blogs with rich formatting.</p>
        </div>
        <div class="card">
            <h3>Analytics</h3>
            <p>Track performance easily.</p>
        </div>
        <div class="card">
            <h3>Content Management</h3>
            <p>Organize posts efficiently.</p>
        </div>
    </div>
</section>

<!-- PREVIEW -->
<section class="preview">
    <div>
        <h2>Powerful Dashboard</h2>
        <p style="color:#aaa;">Manage everything from a single place.</p>
    </div>

    <div class="preview-box">
        UI Preview Area
    </div>
</section>

<!-- PRICING -->
<section class="pricing">
    <h2>Pricing</h2>

    <div class="price-grid">
        <div class="price-card">
            <h3>Free</h3>
            <p>Basic features</p>
        </div>

        <div class="price-card">
            <h3>Pro</h3>
            <p>Advanced tools</p>
        </div>

        <div class="price-card">
            <h3>Team</h3>
            <p>Collaboration features</p>
        </div>
    </div>
</section>

<!-- TESTIMONIAL -->
<section class="testimonial">
    <h2>What Users Say</h2>
    <div class="testimonial-box">
        "Simple, fast, and powerful blog management system."
    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="footer-container">

        <div class="footer-col">
            <h3>BlogFlow</h3>
            <p>Modern blog management system for creators and developers.</p>
        </div>

        <div class="footer-col">
            <h3>Product</h3>
            <a href="#">Features</a>
            <a href="#">Pricing</a>
            <a href="#">Docs</a>
        </div>

        <div class="footer-col">
            <h3>Company</h3>
            <a href="#">About</a>
            <a href="#">Careers</a>
            <a href="#">Contact</a>
        </div>

        <div class="footer-col">
            <h3>Support</h3>
            <a href="#">Help Center</a>
            <a href="#">Privacy</a>
            <a href="#">Terms</a>
        </div>

    </div>

    <div class="footer-bottom">
        © 2026 BlogFlow. All rights reserved.
    </div>
</footer>

</body>
</html>