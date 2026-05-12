<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up - BlogFlow</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background: #0b0f19;
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* CONTAINER */
.container {
    display: flex;
    width: 900px;
    background: #151a2b;
    border-radius: 15px;
    overflow: hidden;
    border: 1px solid #222;
}

/* LEFT SIDE */
.left {
    flex: 1;
    background: linear-gradient(135deg, #6c63ff, #4a42d4);
    padding: 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.left h1 {
    font-size: 32px;
    margin-bottom: 15px;
}

.left p {
    color: #eaeaea;
    line-height: 1.6;
}

/* RIGHT SIDE (FORM) */
.right {
    flex: 1.2;
    padding: 40px;
}

.right h2 {
    margin-bottom: 20px;
    color: #6c63ff;
}

/* FORM */
form {
    display: flex;
    flex-direction: column;
}

.row {
    display: flex;
    gap: 10px;
}

input, select {
    padding: 12px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid #333;
    background: #0b0f19;
    color: white;
    outline: none;
    width: 100%;
}

input:focus, select:focus {
    border-color: #6c63ff;
}

/* BUTTON */
button {
    padding: 12px;
    background: #6c63ff;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background: #574bff;
}

/* LINK */
.login-link {
    margin-top: 15px;
    font-size: 14px;
    color: #aaa;
    text-align: center;
}

.login-link a {
    color: #6c63ff;
    text-decoration: none;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .container {
        flex-direction: column;
        width: 90%;
    }

    body {
        height: auto;
        padding: 40px 0;
    }
}
</style>

</head>
<body>

<div class="container">

    <!-- LEFT INFO -->
    <div class="left">
        <h1>Welcome to BlogFlow</h1>
        <p>
            Create, manage, and publish your blogs with ease.
            Join thousands of creators using our platform.
        </p>
    </div>

    <!-- RIGHT FORM -->
    <div class="right">
        <h2>Create Account</h2>

        <form>

            <div class="row">
                <input type="text" placeholder="First Name" required>
                <input type="text" placeholder="Last Name" required>
            </div>

            <input type="email" placeholder="Email Address" required>

            <select required>
                <option value="">Select Role</option>
                <option>Admin</option>
                <option>Author</option>
                <option>Editor</option>
                <option>User</option>
            </select>

            <input type="password" placeholder="Password" required>
            <input type="password" placeholder="Confirm Password" required>

            <button type="submit">Sign Up</button>

        </form>

        <div class="login-link">
            Already have an account? <a href="#">Login</a>
        </div>
    </div>

</div>

</body>
</html>