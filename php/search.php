
<?php

require_once __DIR__ . "/db.php";
require_once __DIR__ . "/models/Product.php";

$productModel = new Product($connection);

$keyword = trim($_GET["keyword"] ?? "");

$products = [];

if ($keyword !== "") {
    $products = $productModel->search($keyword);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results | Flover</title>
    <link rel="stylesheet" href="../css/website/search.css">

     <link rel="stylesheet" href="../css/website/style.css">
</head>

<body>
<?php include "../components/website/header.php"; ?>
<main class="search-results">

    <h1>Search Results</h1>

    <?php if ($keyword === ""): ?>

        <p class="search-message">
            Please enter a product name to search.
        </p>

    <?php elseif (empty($products)): ?>

        <p class="search-message">
            No products found for
            "<?= htmlspecialchars($keyword, ENT_QUOTES, "UTF-8") ?>"
        </p>

    <?php else: ?>

        <p class="search-message">
            Found <?= count($products) ?> product(s) matching
            "<?= htmlspecialchars($keyword, ENT_QUOTES, "UTF-8") ?>"
        </p>

        <div class="products-grid">

            <?php foreach ($products as $product): ?>

                <article class="product-card">

                    <a href="../pages/website/product.php?id=<?= (int) $product['id'] ?>">

                        <img
                            src="../images/<?= htmlspecialchars($product['image'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                            alt="<?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?>"
                        >

                        <div class="product-info">

                            <h2>
                                <?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?>
                            </h2>

                            <p>
                                <?= htmlspecialchars($product['description'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                            </p>

                            <p class="product-price">
                                <?= htmlspecialchars((string) $product['price'], ENT_QUOTES, 'UTF-8') ?>
                                JD
                            </p>

                            <span class="view-details">
                                View Details →
                            </span>

                        </div>

                    </a>

                </article>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>

</main>

</body>
</html>
