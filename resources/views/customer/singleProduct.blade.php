<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $prds->title }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
            rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Inter', sans-serif;
                background: #f1f5f9;
                color: #0f172a;
            }

            /* =========================
NAVBAR
========================= */

            .navbar {
                width: 100%;
                padding: 20px 7%;
                background: white;
                display: flex;
                justify-content: space-between;
                align-items: center;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            }

            .logo {
                font-size: 28px;
                font-weight: 800;
                color: #6366f1;
            }

            .nav-links {
                display: flex;
                gap: 25px;
            }

            .nav-links a {
                text-decoration: none;
                color: #334155;
                font-weight: 600;
                transition: 0.3s;
            }

            .nav-links a:hover {
                color: #6366f1;
            }

            /* =========================
PRODUCT SECTION
========================= */

            .container {
                width: 90%;
                max-width: 1300px;
                margin: 60px auto;
            }

            .product-wrapper {
                background: white;
                border-radius: 30px;
                overflow: hidden;
                display: grid;
                grid-template-columns: 1fr 1fr;
                box-shadow:
                    0 20px 40px rgba(0, 0, 0, 0.08);
            }

            /* IMAGE */

            .product-image {
                background: #eef2ff;
                padding: 40px;
                display: flex;
                justify-content: center;
                align-items: center;
                position: relative;
            }

            .product-image img {
                width: 100%;
                max-width: 450px;
                border-radius: 25px;
                object-fit: cover;
                transition: 0.4s;
            }

            .product-image img:hover {
                transform: scale(1.05);
            }

            /* DISCOUNT */

            .discount {
                position: absolute;
                top: 25px;
                left: 25px;
                background: #ef4444;
                color: white;
                padding: 10px 18px;
                border-radius: 50px;
                font-size: 14px;
                font-weight: 700;
                box-shadow:
                    0 10px 20px rgba(239, 68, 68, 0.3);
            }

            /* CONTENT */

            .product-content {
                padding: 50px;
            }

            .category {
                display: inline-block;
                background: #e0e7ff;
                color: #4338ca;
                padding: 8px 16px;
                border-radius: 50px;
                font-size: 13px;
                font-weight: 700;
                margin-bottom: 20px;
            }

            .product-title {
                font-size: 42px;
                font-weight: 800;
                margin-bottom: 20px;
                line-height: 1.2;
            }

            .product-desc {
                color: #64748b;
                line-height: 1.8;
                margin-bottom: 30px;
                font-size: 16px;
            }

            /* PRICE */

            .price-row {
                display: flex;
                align-items: center;
                gap: 18px;
                margin-bottom: 25px;
            }

            .price {
                font-size: 42px;
                font-weight: 900;
                color: #6366f1;
            }

            .old-price {
                font-size: 20px;
                text-decoration: line-through;
                color: #94a3b8;
            }

            /* INFO */

            .info-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 20px;
                margin-bottom: 35px;
            }

            .info-card {
                background: #f8fafc;
                padding: 20px;
                border-radius: 18px;
            }

            .info-card span {
                display: block;
                font-size: 13px;
                color: #64748b;
                margin-bottom: 8px;
            }

            .info-card h4 {
                font-size: 18px;
                color: #0f172a;
            }

            /* STOCK */

            .stock {
                display: inline-flex;
                align-items: center;
                gap: 10px;
                background: #dcfce7;
                color: #166534;
                padding: 12px 20px;
                border-radius: 50px;
                font-weight: 700;
                margin-bottom: 35px;
            }

            /* BUTTONS */

            .buttons {
                display: flex;
                gap: 18px;
            }

            .cart-btn {
                flex: 1;
                padding: 18px;
                border: none;
                border-radius: 18px;
                background:
                    linear-gradient(135deg, #6366f1, #8b5cf6);
                color: white;
                font-size: 16px;
                font-weight: 700;
                cursor: pointer;
                transition: 0.3s;
                box-shadow: 0 15px 30px rgba(99, 102, 241, 0.3);
                text-decoration: none
            }

            .cart-btn:hover {
                transform: translateY(-4px);
            }

            .buy-btn {
                flex: 1;
                padding: 18px;
                border: none;
                border-radius: 18px;
                background: #0f172a;
                color: white;
                font-size: 16px;
                font-weight: 700;
                cursor: pointer;
                transition: 0.3s;
            }

            .buy-btn:hover {
                background: #1e293b;
            }


            /* RESPONSIVE */

            @media(max-width:900px) {

                .product-wrapper {
                    grid-template-columns: 1fr;
                }

                .product-title {
                    font-size: 32px;
                }

                .buttons {
                    flex-direction: column;
                }

            }
        </style>
    </head>

    <body>

        <!-- NAVBAR -->

        <nav class="navbar">

            <div class="logo">
                ShopSphere
            </div>

            <div class="nav-links">
                <a href="#">Home</a>
                <a href="{{ url('/customer/product') }}">Products</a>
                <a href="#">Cart</a>
                <a href="#">Profile</a>
            </div>

        </nav>

        <!-- PRODUCT -->

        <div class="container">

            <div class="product-wrapper">

                <!-- IMAGE -->

                <div class="product-image">

                    <div class="discount">
                        -{{ $prds->discount }}%
                    </div>

                    <img src="{{ asset('storage/' . $prds->image) }}" alt="{{ $prds->title }}">

                </div>

                <!-- CONTENT -->

                <div class="product-content">

                    <div class="category">
                        Premium Collection
                    </div>

                    <h1 class="product-title">
                        {{ $prds->title }}
                    </h1>

                    <p class="product-desc">
                        Experience premium quality and modern design with this amazing product.
                        Built for performance, style, and everyday comfort.
                    </p>

                    <!-- PRICE -->

                    <div class="price-row">

                        <div class="price">
                            Rs {{ $prds->price }}
                        </div>

                        <div class="old-price">

                            Rs
                            {{ $prds->discount > 0 ? round($prds->price + ($prds->price * $prds->discount) / 100) : $prds->price }}

                        </div>

                    </div>

                    <!-- INFO -->

                    <div class="info-grid">

                        <div class="info-card">
                            <span>Model</span>
                            <h4>{{ $prds->model }}</h4>
                        </div>

                        <div class="info-card">
                            <span>Discount</span>
                            <h4>{{ $prds->discount }}%</h4>
                        </div>

                    </div>

                    <!-- STOCK -->

                    <div class="stock">

                        <i class="fas fa-circle-check"></i>

                        {{ $prds->stock }}

                    </div>

                    <!-- BUTTONS -->

                    <div class="buttons">

                        <a href="{{ url('customer/addCartList') }}" class="cart-btn">

                            <i class="fas fa-cart-plus"></i>

                            Add To Cart

                        </a>

                        <form action="{{ url('/customer/orderList') }}" method="POST">

                            @csrf

                            <!-- Product ID -->
                            <input type="hidden" name="product_id" value="{{ $prds->id }}" required>

                            <!-- Product Quantity -->
                            <div class="quantity-box">

                                <label>
                                    Quantity
                                </label>

                                <input type="number" name="quantity" value="1" min="1"
                                    max="{{ $prds->stock }}">

                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="buy-btn" {{ $prds->stock == 0 ? 'disabled' : '' }}>

                                @if ($prds->stock == 0)
                                    Out Of Stock
                                @else
                                    Buy Now
                                @endif

                            </button>

                        </form>

                    </div>

                </div>

            </div>


        </div>

        </div>

    </body>

</html>
