<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Blog Post</title>

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

/* HEADER */
header {
    padding: 20px 60px;
    border-bottom: 1px solid #1c2233;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

header h2 {
    color: #6c63ff;
}

header a {
    color: #aaa;
    text-decoration: none;
}

header a:hover {
    color: white;
}

/* FORM CONTAINER */
.container {
    max-width: 800px;
    margin: 60px auto;
    background: #151a2b;
    padding: 40px;
    border-radius: 12px;
    border: 1px solid #222;
}

/* TITLE */
.container h1 {
    margin-bottom: 25px;
    color: #6c63ff;
}

/* LABEL */
label {
    display: block;
    margin: 15px 0 8px;
    color: #ccc;
    font-size: 14px;
}

/* INPUT */
input, textarea {
    width: 100%;
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #333;
    background: #0b0f19;
    color: white;
    outline: none;
}

input:focus, textarea:focus {
    border-color: #6c63ff;
}

/* TEXTAREA */
textarea {
    min-height: 220px;
    resize: vertical;
}

/* BUTTON */
button {
    margin-top: 20px;
    padding: 12px;
    width: 100%;
    background: #6c63ff;
    border: none;
    color: white;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background: #574bff;
}

/* SMALL NOTE */
.note {
    margin-top: 15px;
    font-size: 13px;
    color: #888;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .container {
        margin: 20px;
        padding: 25px;
    }

    header {
        flex-direction: column;
        gap: 10px;
    }
}
</style>

</head>
<body>

<header>
    <h2>BlogFlow</h2>
    <a href="#">← Back</a>
</header>

<div class="container">

    <h1>Create Blog Post</h1>

    <form action="/postBlog" method="POST">
        @csrf

        <label>Title</label>
        <input type="text" placeholder="Enter blog title" required>

        <label>Content</label>
        <textarea placeholder="Write your blog content here..." required></textarea>

        <button type="submit">Publish</button>

    </form>

    <div class="note">
        Tip: A strong title and clear content improves readability and engagement.
    </div>

</div>
</body>
</html>