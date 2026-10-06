<?php

require_once "db.php";
require_once "models/Product.php";
require_once "models/Order.php";
require_once "models/OrderItem.php";

$data = json_decode(file_get_contents("php://input"), true);

$customerName = $data["customerName"];
$phone = $data["phone"];
$address = $data["address"];
$cart = $data["cart"];

$productModel = new Product($connection);
$orderModel = new Order($connection);
$orderItemModel = new OrderItem($connection);
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
      $product = $productModel->getById($productId);

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
   $orderId = $orderModel->create(
    $customerName,
    $phone,
    $address,
    $total
);

    /*
     * 3. نضيف المنتجات إلى order_items وننقص المخزون
     */
    foreach ($cart as $item) {

        $productId = $item["id"];
        $quantity = $item["quantity"];
        $price = $products[$productId]["price"];
        


$orderItemModel->create(
    $orderId,
    $productId,
    $quantity,
    $price
); 
      $productModel->updateStock($productId, $quantity);
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