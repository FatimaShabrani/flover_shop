<!doctype html>
<html lang="ar">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Product FLOVER Shop</title>

    <link rel="stylesheet" href="../../css/website/product.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600&family=Lora:wght@600&display=swap"
      rel="stylesheet"
    />
  </head>

  <body>
    <?php include 'product-page1/navbar.php'; ?>

    <main>
      <?php include 'product-page1/hero.php'; ?>

      <div class="view">
        <?php 
          for ($i = 0; $i < 6; $i++) {
              include 'product-page1/product-card.php';
          }
        ?>
      </div>
    </main>

    <?php include 'product-page1/features.php'; ?>
    <?php include 'product-page1/footer.php'; ?>
  </body>
</html>