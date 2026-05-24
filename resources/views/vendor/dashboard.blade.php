<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Vendor Dashboard</title>

<style>
body {
    margin: 0;
    font-family: Arial;
    display: flex;
}

/* Sidebar */
.sidebar {
    width: 250px;
    background: #1e293b;
    color: white;
    height: 100vh;
    padding: 20px;
    display: flex;
    flex-direction: column;
}

.sidebar h2 {
    margin-bottom: 30px;
}

.sidebar a {
    display: block;
    color: white;
    padding: 12px;
    text-decoration: none;
    margin-bottom: 10px;
    border-radius: 8px;
}

.sidebar a:hover {
    background: #334155;
}

/* Main */
.main {
    flex: 1;
    padding: 20px;
    background: #f1f5f9;
}

/* Card */
.card {
    background: white;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

/* Sections */
.section {
    display: none;
}

.active {
    display: block;
}

/* Logout Button */
.logout-btn {
    margin-top: auto;
    background: #ef4444;
    color: white;
    border: none;
    padding: 12px;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    width: 100%;
}

.logout-btn:hover {
    background: #dc2626;
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>Vendor Panel</h2>

    <a href="#" onclick="showSection('dashboard')">🏠 Dashboard</a>
    <a href="#" onclick="showSection('add')">➕ Add Product</a>
    <a href="#" onclick="showSection('manage')">📦 Manage Products</a>
    <a href="#" onclick="showSection('orders')">🧾 Orders</a>
    <a href="#" onclick="showSection('profile')">👤 Profile</a>

    <div style="margin-top: auto;">
        <form method="POST" action="{{url('/vendor/logOut') }}">
            @csrf
            <button type="submit" class="logout-btn">
                🚪 Logout
            </button>
        </form>
    </div>

</div>

<!-- MAIN CONTENT -->
<div class="main">

    <!-- DASHBOARD -->
    <div id="dashboard" class="section active">
        <div class="card">
            <h2>Welcome Vendor 👋</h2>
            <p>Manage your products and orders from here.</p>
        </div>
    </div>

    <!-- ADD PRODUCT -->
    <div id="add" class="section">
        <div class="card">
            <h2>Add Product</h2>
            <p>Go to product form page</p>
            <a href="/vendor/addProduct">➕ Add New Product</a>
        </div>
    </div>

    <!-- MANAGE PRODUCTS -->
    <div id="manage" class="section">
        <div class="card">
            <h2>Your Products</h2>
            <p>List of products will appear here</p>
            <a href="/vendor/manageProduct">📦 View Products</a>
        </div>
    </div>

    <!-- ORDERS -->
    <div id="orders" class="section">
        <div class="card">
            <h2>Orders</h2>
            <p>All customer orders for your products</p>
            <a href="/vendor/orders">🧾 View Orders</a>
        </div>
    </div>

    <!-- PROFILE -->
    <div id="profile" class="section">
        <div class="card">
            <h2>Profile</h2>
            <p>Manage your account details</p>
            <a href="/profile/viewProfile">👤 View Profile</a>
        </div>
    </div>

</div>

<!-- JS -->
<script>
function showSection(id) {
    document.querySelectorAll('.section').forEach(sec => {
        sec.classList.remove('active');
    });
    document.getElementById(id).classList.add('active');
}
</script>

</body>
</html>