<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>ShopSphere | Premium Store</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

:root{
    --primary:#6C63FF;
    --secondary:#8B5CF6;
    --dark:#0f172a;
    --light:#f8fafc;
    --gray:#64748b;
    --white:#ffffff;
    --success:#10b981;
    --danger:#ef4444;

    --shadow:
    0 10px 30px rgba(0,0,0,0.08);

    --shadow-hover:
    0 20px 40px rgba(0,0,0,0.15);

    --radius:24px;
}

body{
    font-family:'Inter',sans-serif;
    background:#f1f5f9;
    color:var(--dark);
}

/* ===========================
NAVBAR
=========================== */

.navbar{
    width:100%;
    padding:20px 7%;
    background:rgba(255,255,255,0.9);
    backdrop-filter:blur(12px);
    position:sticky;
    top:0;
    z-index:999;
    display:flex;
    justify-content:space-between;
    align-items:center;
    border-bottom:1px solid #e2e8f0;
}

.logo{
    font-size:30px;
    font-weight:800;
    color:var(--primary);
    text-decoration:none;
}

.logo span{
    color:var(--dark);
}

.nav-links{
    display:flex;
    align-items:center;
    gap:30px;
}

.nav-links a{
    text-decoration:none;
    color:var(--dark);
    font-weight:600;
    transition:0.3s;
}

.nav-links a:hover{
    color:var(--primary);
}

/* ===========================
PREMIUM CART
=========================== */

.cart-wrapper{
    position:relative;
}

.cart-btn{
    width:58px;
    height:58px;
    border-radius:18px;
    border:none;
    background:linear-gradient(135deg,var(--primary),var(--secondary));
    color:white;
    font-size:22px;
    cursor:pointer;
    position:relative;
    transition:0.4s;
    box-shadow:
    0 10px 25px rgba(108,99,255,0.35);
}

.cart-btn:hover{
    transform:translateY(-4px) scale(1.05);
}

.cart-count{
    position:absolute;
    top:-8px;
    right:-6px;
    background:var(--danger);
    width:26px;
    height:26px;
    border-radius:50%;
    color:white;
    font-size:12px;
    font-weight:700;
    display:flex;
    justify-content:center;
    align-items:center;
    border:3px solid white;
    box-shadow:0 5px 12px rgba(239,68,68,0.4);
}

/* ===========================
HERO
=========================== */

.hero{
    padding:90px 7%;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:50px;
    background:
    linear-gradient(135deg,#eef2ff,#f8fafc);
}

.hero-text{
    flex:1;
}

.hero-badge{
    display:inline-block;
    background:#ddd6fe;
    color:#5b21b6;
    padding:10px 18px;
    border-radius:40px;
    font-size:14px;
    font-weight:700;
    margin-bottom:25px;
}

.hero h1{
    font-size:64px;
    line-height:1.1;
    margin-bottom:25px;
    font-weight:900;
}

.hero h1 span{
    color:var(--primary);
}

.hero p{
    color:var(--gray);
    font-size:18px;
    max-width:600px;
    line-height:1.7;
    margin-bottom:35px;
}

.hero-buttons{
    display:flex;
    gap:20px;
}

.btn{
    padding:16px 30px;
    border-radius:50px;
    border:none;
    text-decoration:none;
    font-weight:700;
    transition:0.3s;
    cursor:pointer;
}

.btn-primary{
    background:linear-gradient(135deg,var(--primary),var(--secondary));
    color:white;
    box-shadow:
    0 10px 25px rgba(108,99,255,0.35);
}

.btn-primary:hover{
    transform:translateY(-4px);
}

.btn-outline{
    border:2px solid var(--primary);
    color:var(--primary);
    background:white;
}

.btn-outline:hover{
    background:var(--primary);
    color:white;
}

.hero-image{
    flex:1;
    display:flex;
    justify-content:center;
}

.hero-image img{
    width:100%;
    max-width:500px;
    border-radius:35px;
    box-shadow:var(--shadow-hover);
}

/* ===========================
SECTION TITLE
=========================== */

.section{
    padding:80px 7%;
}

.section-title{
    text-align:center;
    margin-bottom:60px;
}

.section-title h2{
    font-size:46px;
    margin-bottom:15px;
}

.section-title span{
    color:var(--primary);
}

.section-title p{
    color:var(--gray);
    font-size:18px;
}

/* ===========================
PRODUCT GRID
=========================== */

.products{
    display:grid;
    grid-template-columns:
    repeat(auto-fit,minmax(320px,1fr));
    gap:35px;
}

/* ===========================
PREMIUM PRODUCT CARD
=========================== */

.card{
    background:white;
    border-radius:30px;
    overflow:hidden;
    position:relative;
    transition:0.4s;
    box-shadow:var(--shadow);
    text-decoration:none
}

.card:hover{
    transform:translateY(-12px);
    box-shadow:var(--shadow-hover);
}

/* IMAGE */

.card-image{
    position:relative;
    overflow:hidden;
}

.card-image img{
    width:100%;
    height:320px;
    object-fit:cover;
    transition:0.5s;
}

.card:hover .card-image img{
    transform:scale(1.08);
}

/* DISCOUNT */

.discount{
    position:absolute;
    top:18px;
    left:18px;
    background:linear-gradient(135deg,#ef4444,#dc2626);
    color:white;
    padding:10px 16px;
    border-radius:50px;
    font-size:13px;
    font-weight:700;
    z-index:2;
    box-shadow:
    0 10px 20px rgba(239,68,68,0.35);
}

/* WISHLIST */

.wishlist{
    position:absolute;
    top:18px;
    right:18px;
    width:46px;
    height:46px;
    border-radius:50%;
    background:white;
    display:flex;
    justify-content:center;
    align-items:center;
    cursor:pointer;
    font-size:18px;
    transition:0.3s;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

.wishlist:hover{
    background:var(--danger);
    color:white;
}

/* CARD BODY */

.card-body{
    padding:28px;
}

.category{
    color:var(--primary);
    font-size:13px;
    font-weight:700;
    margin-bottom:10px;
    text-transform:uppercase;
    letter-spacing:1px;
}

.product-title{
    font-size:24px;
    font-weight:800;
    margin-bottom:10px;
}

.product-desc{
    color:var(--gray);
    line-height:1.7;
    margin-bottom:20px;
}

/* PRICE */

.price-row{
    display:flex;
    align-items:center;
    gap:14px;
    margin-bottom:20px;
}

.price{
    font-size:30px;
    font-weight:900;
    color:var(--primary);
}

.old-price{
    text-decoration:line-through;
    color:#94a3b8;
    font-size:16px;
}

/* STOCK */

.stock{
    display:inline-flex;
    align-items:center;
    gap:8px;
    background:#dcfce7;
    color:#166534;
    padding:8px 16px;
    border-radius:50px;
    font-size:13px;
    font-weight:700;
    margin-bottom:25px;
}

/* BUTTONS */

.card-buttons{
    display:flex;
    gap:14px;
   
}

.add-cart{
    flex:1;
    background:
    linear-gradient(135deg,var(--primary),var(--secondary));
    color:white;
    border:none;
    padding:15px;
    border-radius:18px;
    font-weight:700;
    cursor:pointer;
    transition:0.3s;
    
}

.add-cart:hover{
    transform:translateY(-3px);
}

.view-btn{
    width:58px;
    border:none;
    border-radius:18px;
    background:#eef2ff;
    color:var(--primary);
    font-size:18px;
    cursor:pointer;
    transition:0.3s;
}

.view-btn:hover{
    background:var(--primary);
    color:white;
}

/* ===========================
FEATURES
=========================== */

.features{
    display:grid;
    grid-template-columns:
    repeat(auto-fit,minmax(220px,1fr));
    gap:25px;
    margin-top:70px;
}

.feature{
    background:white;
    padding:35px;
    border-radius:25px;
    text-align:center;
    box-shadow:var(--shadow);
    transition:0.3s;
}

.feature:hover{
    transform:translateY(-8px);
}

.feature i{
    width:80px;
    height:80px;
    background:#eef2ff;
    color:var(--primary);
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    margin:auto;
    margin-bottom:20px;
    font-size:30px;
}

.feature h3{
    margin-bottom:10px;
}

.feature p{
    color:var(--gray);
}

/* ===========================
FOOTER
=========================== */

.footer{
    background:#0f172a;
    color:white;
    padding:70px 7% 30px;
}

.footer-grid{
    display:grid;
    grid-template-columns:
    repeat(auto-fit,minmax(220px,1fr));
    gap:40px;
}

.footer h3{
    margin-bottom:20px;
}

.footer a{
    display:block;
    color:#cbd5e1;
    text-decoration:none;
    margin-bottom:12px;
}

.footer a:hover{
    color:white;
}

.footer-bottom{
    border-top:1px solid #334155;
    margin-top:40px;
    padding-top:25px;
    text-align:center;
    color:#94a3b8;
}

/* ===========================
RESPONSIVE
=========================== */

@media(max-width:900px){

    .hero{
        flex-direction:column;
        text-align:center;
    }

    .hero h1{
        font-size:42px;
    }

    .hero-buttons{
        justify-content:center;
    }

    .navbar{
        flex-direction:column;
        gap:20px;
    }

    .nav-links{
        flex-wrap:wrap;
        justify-content:center;
    }

}

</style>
</head>

<body>

<!-- NAVBAR -->

<nav class="navbar">

    <a href="#" class="logo">
        Shop<span>Sphere</span>
    </a>

    <div class="nav-links">
        <a href="{{url('')}}">Home</a>
        <a href="#">Products</a>
        <a href="#">Offers</a>
        <a href="{{url('/customer/inquiry')}}">Contact</a>

        <div class="cart-wrapper">

            <a href="{{url('/customer/cartList')}}" class="cart-btn">
                <i class="fas fa-shopping-cart"></i>
            </a>

            <div class="cart-count">
                3
            </div>

        </div>
    </div>

</nav>



<!-- PRODUCTS -->

<!-- PRODUCTS SECTION -->

<section class="section">

    <div class="section-title">

        <h2>
            Featured <span>Products</span>
        </h2>

        <p>
            Discover premium products from trusted vendors
        </p>

    </div>

    <div class="products">

        @foreach($products as $product)

        <a   href="{{url('/customer/singleProduct/'.$product->id)}}" class="card">

            <!-- IMAGE -->

            <div class="card-image">

                <div class="discount">
                    -{{$product->discount}}%
                </div>

                <div class="wishlist">
                    <i class="fa-regular fa-heart"></i>
                </div>

                <img 
                    src="{{ asset('storage/'.$product->image) }}" 
                    alt="{{$product->title}}"
                >

            </div>

            <!-- BODY -->

            <div class="card-body">

                <div class="category">
                    {{$product->stock}}
                </div>

                <div class="product-title">
                    {{$product->title}}
                </div>

                <div class="product-desc">

                    Model :
                    {{$product->model ?? 'Premium Edition'}}

                </div>

                <!-- PRICE -->

                <div class="price-row">

                    <div class="price">

                        Rs {{$product->price}}

                    </div>

                    <div class="old-price">

                        Rs 
                        {{
                            $product->discount > 0
                            ? round($product->price + ($product->price * $product->discount / 100))
                            : $product->price
                        }}

                    </div>

                </div>

                <!-- STOCK -->

                <div class="stock">

                    ● {{$product->stock}}

                </div>

                <!-- BUTTONS -->

                <div class="card-buttons">

                    <button class="add-cart">

                        <i class="fas fa-cart-plus"></i>

                        Add to Cart

                    </button>

                    <button   class="view-btn">

                        <i class="fas fa-eye"></i>

                    </button>

                </div>

            </div>

            </a>

        @endforeach

    </div>

</section>
    

   
<!-- FOOTER -->

<footer class="footer">

    <div class="footer-grid">

        <div>
            <h3>ShopSphere</h3>

            <p style="color:#cbd5e1;line-height:1.8;">
                Modern ecommerce platform for premium shopping experience.
            </p>
        </div>

        <div>
            <h3>Quick Links</h3>

            <a href="#">Home</a>
            <a href="#">Products</a>
            <a href="#">Offers</a>
            <a href="#">Contact</a>
        </div>

        <div>
            <h3>Support</h3>

            <a href="#">Help Center</a>
            <a href="#">Returns</a>
            <a href="#">Track Order</a>
            <a href="#">Privacy Policy</a>
        </div>

        <div>
            <h3>Follow Us</h3>

            <a href="#">Instagram</a>
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">YouTube</a>
        </div>

    </div>

    <div class="footer-bottom">

        © 2026 ShopSphere. All Rights Reserved.

    </div>

</footer>

</body>
</html>