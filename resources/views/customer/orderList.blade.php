<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordered Products</title>

    <!-- Font Awesome -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#f4f7fb;
            padding:40px;
        }

        .container{
            max-width:1200px;
            margin:auto;
        }

        .page-title{
            font-size:32px;
            margin-bottom:30px;
            color:#1e293b;
            display:flex;
            align-items:center;
            gap:12px;
        }

        .order-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
            gap:25px;
        }

        .order-card{
            background:#fff;
            border-radius:16px;
            overflow:hidden;
            box-shadow:0 4px 15px rgba(0,0,0,0.08);
            transition:0.3s;
        }

        .order-card:hover{
            transform:translateY(-5px);
        }

        .product-image{
            width:100%;
            height:220px;
            object-fit:cover;
        }

        .card-body{
            padding:20px;
        }

        .product-title{
            font-size:22px;
            font-weight:bold;
            color:#0f172a;
            margin-bottom:15px;
        }

        .info{
            margin-bottom:10px;
            color:#475569;
            display:flex;
            justify-content:space-between;
        }

        .label{
            font-weight:bold;
        }

        .status{
            padding:6px 14px;
            border-radius:20px;
            font-size:14px;
            font-weight:bold;
            color:white;
        }

        .pending{
            background:#f59e0b;
        }

        .completed{
            background:#10b981;
        }

        .cancelled{
            background:#ef4444;
        }

    </style>
</head>
<body>

<div class="container">

    <h1 class="page-title">
        <i class="fas fa-shopping-bag"></i>
        Ordered Products
    </h1>

    <div class="order-grid">

        @foreach($orders as $order)

        <div class="order-card">

            <img src="{{ asset('storage/'.$order->image) }}"
                 alt="product image"
                 class="product-image">

            <div class="card-body">

                <h2 class="product-title">
                    {{ $order->title }}
                </h2>

                <div class="info">
                    <span class="label">
                        Quantity
                    </span>

                    <span>
                        {{ $order->quantity }}
                    </span>
                </div>

                <div class="info">
                    <span class="label">
                        Unit Price
                    </span>

                    <span>
                        Rs. {{ $order->unit_price }}
                    </span>
                </div>

                <div class="info">
                    <span class="label">
                        Status
                    </span>

                    <span class="status
                        @if($order->status == 'Pending') pending
                        @elseif($order->status == 'Completed') completed
                        @else cancelled
                        @endif
                    ">
                        {{ $order->status }}
                    </span>
                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

</body>
</html>