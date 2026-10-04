
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Flover-Cart</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/website/style.css">

</head>

<body>

    <?php include "../../components/website/header.php"; ?>

    <h1>Shopping Cart</h1>

    <section class="cart">

        <div class="cart-items">

            <div id="cartItems"></div>

        </div>

        <div class="cart-summary">

            <h2>Cart Summary</h2>

            <p>
                Total: <span id="cart-total">0 JD</span>
            </p>

            <a href="checkout.php">Checkout</a>

        </div>

    </section>

    <?php include "../../components/website/footer.php"; ?>

    
   <script src="../../js/website/main.js?v=2"></script>
   <script src="../../js/website/cart.js"></script>
   
</body>

</html>


