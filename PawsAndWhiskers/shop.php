<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Storefront</title>
    <style>
        <?php include 'path/to/your/fonts.css'; ?>

        * {
            font-family: "Poppins", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #121212;
            background-size: cover;
            background-position: center;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 99;
        }

        .logo {
            font-family: L;
            font-size: 30px;
            color: #fff;
            user-select: none;
            letter-spacing: 1.7px;
            font-weight: 01;
        }

        .navbar a {
            position: relative;
            font-size: 1.1em;
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            margin-left: 23px;
        }

        .navbar .btnLogin-popup {
            width: 94px;
            height: 34px;
            background: transparent;
            border: 2px solid #b286fe;
            outline: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1.1em;
            color: #fff;
            font-weight: 500;
            margin-left: 23px;
            transition: 0.5s;
            text-align: center;
        }

        .navbar .btnLogin-popup:hover {
            background: #b286fe;
            color: #162938;
            font-weight: 500;
        }

        .navbar a::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 3px;
            background: #b286fe;
            border-radius: 5px;
            left: 0;
            bottom: -6px;
            transform: scaleX(0);
            transition: transform .4s;
            transform-origin: right;
        }

        .navbar a:hover::after {
            transform: scaleX(1);
            transform-origin: left;
        }

        .products {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .product {
            margin: 20px;
            text-align: center;
        }

        .product-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .product-name,
        .product-brand,
        .product-price,
        .product-rating {
            color: #fff;
            margin-top: 8px;
        }

        .product-rating {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .filter {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .filter input,
        .filter select,
        .filter button {
            padding: 8px;
            margin-right: 10px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            outline: none;
        }

        .filter select {
            width: 100px;
        }

        .filter button {
            background-color: #b286fe;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">Your Logo</div>
        <div class="navbar">
            <a href="#">Home</a>
            <a href="#">About</a>
            <button class="btnLogin-popup">Login</button>
        </div>
    </header>

    <div class="products">
        <!-- Example product cards -->
        <div class="product">
            <img class="product-image" src="product1.jpg" alt="Product 1">
            <div class="product-name">Product 1</div>
            <div class="product-brand">Brand A</div>
            <div class="product-price">₹100</div>
            <div class="product-rating">4.5 stars (10 reviews)</div>
        </div>

        <div class="product">
            <img class="product-image" src="product2.jpg" alt="Product 2">
            <div class="product-name">Product 2</div>
            <div class="product-brand">Brand B</div>
            <div class="product-price">₹150</div>
            <div class="product-rating">3.8 stars (8 reviews)</div>
        </div>
        <!-- Add more product cards as needed -->
    </div>
</body>
</html>
