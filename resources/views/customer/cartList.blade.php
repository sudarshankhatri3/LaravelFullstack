<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart List</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#f4f6f9;
            padding:40px;
        }

        .container{
            max-width:1100px;
            margin:auto;
        }

        .cart-title{
            font-size:32px;
            margin-bottom:30px;
            color:#222;
            font-weight:bold;
        }

        .cart-wrapper{
            display:flex;
            gap:30px;
            align-items:flex-start;
        }

        .cart-items{
            flex:2;
        }

        .cart-card{
            background:#fff;
            padding:20px;
            border-radius:12px;
            display:flex;
            align-items:center;
            gap:20px;
            margin-bottom:20px;
            box-shadow:0 2px 10px rgba(0,0,0,0.08);
        }

        .cart-image img{
            width:120px;
            height:120px;
            object-fit:cover;
            border-radius:10px;
        }

        .cart-details{
            flex:1;
        }

        .cart-details h2{
            font-size:22px;
            margin-bottom:10px;
            color:#222;
        }

        .price{
            color:#28a745;
            font-size:20px;
            font-weight:bold;
            margin-bottom:10px;
        }

        .stock{
            color:#666;
            margin-bottom:10px;
        }

        .quantity-box{
            display:flex;
            align-items:center;
            gap:10px;
            margin-top:10px;
        }

        .quantity-btn{
            width:35px;
            height:35px;
            border:none;
            background:#222;
            color:#fff;
            border-radius:5px;
            cursor:pointer;
            font-size:18px;
        }

        .quantity-input{
            width:50px;
            text-align:center;
            height:35px;
            border:1px solid #ccc;
            border-radius:5px;
        }

        .remove-btn{
            background:#dc3545;
            color:#fff;
            border:none;
            padding:10px 16px;
            border-radius:6px;
            cursor:pointer;
            margin-top:15px;
        }

        .summary{
            flex:1;
            background:#fff;
            padding:25px;
            border-radius:12px;
            box-shadow:0 2px 10px rgba(0,0,0,0.08);
        }

        .summary h2{
            margin-bottom:20px;
            color:#222;
        }

        .summary-row{
            display:flex;
            justify-content:space-between;
            margin-bottom:15px;
            font-size:18px;
        }

        .total{
            font-size:24px;
            font-weight:bold;
            color:#28a745;
        }

        .checkout-btn{
            width:100%;
            padding:14px;
            border:none;
            background:#007bff;
            color:#fff;
            font-size:18px;
            border-radius:8px;
            cursor:pointer;
            margin-top:20px;
        }

        .checkout-btn:hover{
            background:#0056b3;
        }

        @media(max-width:900px){

            .cart-wrapper{
                flex-direction:column;
            }

            .cart-card{
                flex-direction:column;
                text-align:center;
            }

            .cart-image img{
                width:100%;
                height:220px;
            }
        }

    </style>

</head>
<body>

    <div class="container">

        <h1 class="cart-title">Shopping Cart</h1>

        <div class="cart-wrapper">

            <!-- Cart Items -->
            <div class="cart-items">

                <!-- Single Cart Item -->
                <div class="cart-card">

                    </div>

                </div>




        </div>

    </div>

</body>
</html>