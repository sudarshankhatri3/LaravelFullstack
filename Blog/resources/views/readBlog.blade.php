<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>All Blogs - BlogFlow</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background: #0b0f19;
    color: white;
}

/* NAVBAR */
nav {
    display: flex;
    justify-content: space-between;
    padding: 20px 60px;
    border-bottom: 1px solid #1c2233;
    align-items: center;
}

nav h2 {
    color: #6c63ff;
}

nav a {
    color: #aaa;
    text-decoration: none;
}

nav a:hover {
    color: white;
}

/* HEADER SECTION */
.header {
    text-align: center;
    padding: 60px 20px;
}

.header h1 {
    font-size: 40px;
    margin-bottom: 10px;
}

.header p {
    color: #aaa;
}

/* BLOG GRID */
.container {
    max-width: 1100px;
    margin: auto;
    padding: 20px;
}

.blog-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

/* BLOG CARD */
.card {
    background: #151a2b;
    border: 1px solid #222;
    border-radius: 12px;
    padding: 20px;
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-5px);
    border-color: #6c63ff;
}

.card h3 {
    color: #6c63ff;
    margin-bottom: 10px;
}

.card p {
    color: #aaa;
    font-size: 14px;
    margin-bottom: 15px;
}

/* BUTTON */
.read-btn {
    display: inline-block;
    padding: 10px 14px;
    background: #6c63ff;
    color: white;
    border-radius: 8px;
    text-decoration: none;
    font-size: 14px;
}

.read-btn:hover {
    background: #574bff;
}

/* FOOTER */
footer {
    text-align: center;
    padding: 40px;
    margin-top: 50px;
    border-top: 1px solid #1c2233;
    color: #666;
}

/* RESPONSIVE */
@media (max-width: 900px) {
    .blog-grid {
        grid-template-columns: 1fr;
    }

    nav {
        flex-direction: column;
        gap: 10px;
    }
}
</style>

</head>
<body>

<!-- NAVBAR -->
<nav>
    <h2>BlogFlow</h2>
    <a href="#">+ Create Blog</a>
</nav>

<!-- HEADER -->
<div class="header">
    <h1>All Blogs</h1>
    <p>Read the latest articles and updates</p>
</div>

<!-- BLOG LIST -->
<div class="container">

    <div class="blog-grid">

        <!-- BLOG CARD  -->
        @foreach($blogs as $blog)
        <div class="card">
            <h3>{{$blog->title}}</h3>
            <p>{{$blog->content}}</p>
            <a href="#" class="read-btn">Read More</a>
        </div>
        @endforeach

        <!-- BLOG CARD 2 -->
        <div class="card">
            <h3>Understanding MVC Architecture</h3>
            <p>
                MVC helps separate logic, views, and data for better code structure...
            </p>
            <a href="#" class="read-btn">Read More</a>
        </div>

        <!-- BLOG CARD 3 -->
        <div class="card">
            <h3>JavaScript Basics for Beginners</h3>
            <p>
                JavaScript is essential for frontend development and interactivity...
            </p>
            <a href="#" class="read-btn">Read More</a>
        </div>

    </div>

</div>

<!-- FOOTER -->
<footer>
    © 2026 BlogFlow. All rights reserved.
</footer>

</body>
</html>