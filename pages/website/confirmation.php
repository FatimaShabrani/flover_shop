<?php

require_once "../../php/db.php";

$orderId = $_GET["order_id"] ?? null;

$order = null;

if ($orderId) {

    $sql = "SELECT * FROM orders WHERE id = :id";

    $stmt = $connection->prepare($sql);

    $stmt->execute([
        ":id" => $orderId
    ]);

    $order = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Flover - Order Confirmation</title>

    <link rel="stylesheet" href="../../css/website/style.css">
</head>

<body>

    <?php include "../../components/website/header.php"; ?>

    <main class="confirmation-page">

        <div class="confirmation-card">

            <div class="success-icon">
                ✓
            </div>

            <h1>Thank You!</h1>

            <p class="confirmation-main">
                Your order has been placed successfully.
            </p>

            <p class="confirmation-text">
                We have received your order and will contact you
                soon to confirm the delivery details.
            </p>

           <div class="confirmation-divider"></div>

<div class="order-details">

    <p>
        <strong>Order Number:</strong>
        #<?= htmlspecialchars($order["id"]) ?>
    </p>

    <p>
        <strong>Customer Name:</strong>
        <?= htmlspecialchars($order["customer_name"]) ?>
    </p>

    <p>
        <strong>Total:</strong>
        <?= number_format($order["total"], 2) ?> JOD
    </p>

</div>

<div class="confirmation-message">
    <span>🌷</span>
    <p>
        Thank you for choosing <strong>Flover</strong>.
        We hope your flowers bring a little more beauty to your day.
    </p>
</div>

    </main>

    <?php include "../../components/website/footer.php"; ?>

</body>

</html>

