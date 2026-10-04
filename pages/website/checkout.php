
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Flover - Checkout</title>

    <link rel="stylesheet" href="../../css/website/style.css">
</head>

<body>

    <?php include "../../components/website/header.php"; ?>

    <main class="checkout-page">

        <h1 class="checkout-title">
            Checkout
        </h1>

        <div class="checkout-container">

            <!-- Customer Information -->

            <section class="checkout-form">

                <h2>Delivery Information</h2>

                <form id="checkoutForm">

                    <label for="customerName">
                        Full Name
                    </label>

                    <input
                        type="text"
                        id="customerName"
                        name="customerName"
                        placeholder="Enter your full name"
                        required
                    >

                    <label for="phone">
                        Phone Number
                    </label>

                    <input
                        type="tel"
                        id="phone"
                        name="phone"
                        placeholder="Enter your phone number"
                        required
                    >

                    <label for="address">
                        Delivery Address
                    </label>

                    <input
                        type="text"
                        id="address"
                        name="address"
                        placeholder="Enter your delivery address"
                        required
                    >

                    <button
                        type="submit"
                        class="place-order"
                    >
                        Place Order
                    </button>

                </form>

            </section>


            <!-- Order Summary -->

            <section class="order-summary">

                <h2>Order Summary</h2>

                <div id="checkoutItems">
                    <!-- Products will appear here -->
                </div>

                <div class="order-total">

                    <span>Total</span>

                    <span id="checkoutTotal">
                        0.00 JOD
                    </span>

                </div>

            </section>

        </div>

    </main>

    <?php include "../../components/website/footer.php"; ?>

     <script src="../../js/website/checkout.js"></script>



</body>

</html>

