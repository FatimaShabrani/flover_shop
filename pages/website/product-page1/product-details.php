<?php $base = '/flover_shop/'; ?>
<!doctype html>
<html lang="ar">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Product FLOVER Shop</title>
<link rel="stylesheet" href="../../../css/website/product.css" />  ...
</head>
<body>
<?php
include 'navbar.php';
?>
  <main>
    <?php include __DIR__ . '/hero.php'; ?>
    <div class="view">
      <?php for ($i = 0; $i < 6; $i++) include __DIR__ . '/product-card.php'; ?>
    </div>
  </main>

  <?php include __DIR__ . '/features.php'; ?>
  <?php include __DIR__ . '/footer.php'; ?>
</body>
</html>