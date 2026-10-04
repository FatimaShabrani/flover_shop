<?php

require_once "db.php";

$data = json_decode(file_get_contents("php://input"), true);

$customerName = $data["customerName"];
$phone = $data["phone"];
$address = $data["address"];
$cart = $data["cart"];
if (empty($cart)) {
    echo json_encode([
        "success" => false,
        "message" => "Cart is empty."
    ]);
    exit;
}

$total = 0;
$products = [];

try {

    $connection->beginTransaction();

    /*
     * 1. نتحقق من المنتجات ونجيب السعر والمخزون
     */
    foreach ($cart as $item) {

        $productId = $item["id"];

        $quantity = $item["quantity"];

        $sqlCheckStock = "SELECT stock, price
                          FROM products
                          WHERE id = :product_id";

        $stmtCheckStock = $connection->prepare($sqlCheckStock);

        $stmtCheckStock->execute([
            ":product_id" => $productId
        ]);

        $product = $stmtCheckStock->fetch(PDO::FETCH_ASSOC);

        if (!$product) {
            throw new Exception("Product not found.");
        }

        if ($product["stock"] < $quantity) {
            throw new Exception("Not enough stock.");
        }

        $price = $product["price"];
        $products[$productId] = $product;

        $total += $price * $quantity;
    }


    /*
     * 2. ننشئ الطلب بعد حساب الـ Total الحقيقي
     */
    $sql = "INSERT INTO orders (customer_name, phone, address, total)
            VALUES (:customer_name, :phone, :address, :total)";

    $stmt = $connection->prepare($sql);

    $stmt->execute([
        ":customer_name" => $customerName,
        ":phone" => $phone,
        ":address" => $address,
        ":total" => $total
    ]);

    $orderId = $connection->lastInsertId();


    /*
     * 3. نضيف المنتجات إلى order_items وننقص المخزون
     */
    foreach ($cart as $item) {

        $productId = $item["id"];
        $quantity = $item["quantity"];
        $price = $products[$productId]["price"];
        


        $sqlItem = "INSERT INTO order_items
                    (order_id, product_id, quantity, price)
                    VALUES (:order_id, :product_id, :quantity, :price)";

        $stmtItem = $connection->prepare($sqlItem);

        $stmtItem->execute([
            ":order_id" => $orderId,
            ":product_id" => $productId,
            ":quantity" => $quantity,
            ":price" => $price
        ]);


        $sqlStock = "UPDATE products
                     SET stock = stock - :quantity
                     WHERE id = :product_id";

        $stmtStock = $connection->prepare($sqlStock);

        $stmtStock->execute([
            ":quantity" => $quantity,
            ":product_id" => $productId
        ]);
    }


    /*
     * 4. إذا كل شيء نجح نحفظ العملية
     */
    $connection->commit();

    echo json_encode([
        "success" => true,
        "order_id" => $orderId
    ]);

} catch (Exception $e) {

    if ($connection->inTransaction()) {
        $connection->rollBack();
    }

    echo json_encode([
        "success" => false,
        "message" => $e->getMessage()
    ]);
}