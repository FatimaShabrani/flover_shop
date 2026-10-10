```php
<!doctype html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Flover | لوحة الإدارة</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

  <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Lora:wght@400;500;600&display=swap"
    rel="stylesheet" />

  <!-- Dashboard CSS -->
  <link rel="stylesheet" href="../../../css/dashboard/productDashStyle-/dashboardStyle.css" />
</head>

<body>
  <!-- Sidebar -->
  <?php require __DIR__ . '/sidebar.php'; ?>

  <main class="main">
    <!-- Topbar -->
    <?php require __DIR__ . '/topbar.php'; ?>

    <!-- Dashboard Overview -->
    <?php require __DIR__ . '/overveiw.php'; ?>

    <!-- Products -->
    <?php require __DIR__ . '/products.php'; ?>

    <!-- Orders -->
    <?php require __DIR__ . '/orders.php'; ?>

    <!-- Settings -->
    <?php require __DIR__ . '/settings.php'; ?>
  </main>

  <!-- Add Product Modal -->
  <?php require __DIR__ . '/add-product-modal.php'; ?>

  <!-- Dashboard JavaScript -->
  <script src="../../../js/dashboard/products.js"></script>
</body>

</html>
```