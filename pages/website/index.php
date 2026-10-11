<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Flover Flower</title>

    

<link rel="stylesheet" href="/flover_shop/css/website/style.css?v=10">
<link rel="stylesheet" href="/flover_shop/css/website/hero.css?v=1">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Lora:wght@400;500;600;700&display=swap" rel="stylesheet">

</head>


<body>

    <!-- =========================
         NAVIGATION
    ========================== -->

  <?php include "../../components/website/header.php"; ?>

    <section class="hero hero-split">

    <div class="hero-content">
        <span class="hero-eyebrow">FLOWERS · GIFTS · MOMENTS</span>

        <h1>Flover Flower</h1>

        <p class="hero-tagline">Make Every Moment Bloom</p>

        <p class="hero-description">
            Beautiful flowers & gifts for every special moment.
        </p>

        <a href="product-details.php">Shop the Collection</a>
    </div>

    <div class="hero-image">
        <img
            id="heroSlide"
             src="../../images/WhatsApp_Image_2026-10-11_at_20.56.33__1_-removebg-preview.png"
            alt="Beautiful flower bouquet"
        >
    </div>

</section>


    <!-- =========================
         CATEGORIES
    ========================== -->

   <section class="categories">
    <h2>Explore Our Collection</h2>

    <div class="category-group" id="categoriesContainer">
        <!-- Categories will be loaded from the database -->
    </div>
</section>


    <!-- =========================
         FEATURED FLOWERS
    ========================== -->

    <section class="featured-Flower">
    <h2>Featured Bouquets</h2>

    <div class="group-Flower" id="featuredProducts"></div>

    <div class="see-more-container">
       <a href="product-details.php#section-flowers" class="see-more">
    See More
</a>
    </div>
</section>
     <!-- =========================
         Teady FLOWERS
    ========================== -->

    <section class="teddy-Flower">
    <h2>Teddy Bears</h2>

    <div class="group-teddy" id="teddyProducts"></div>

    <div class="see-more-container">
      <a href="product-details.php#section-teddy" class="see-more">
    See More
</a>

    </div>
</section>
<!--==================
Gift Boxes
====================-->

   <section class="gift-Flower">
    <h2>Gift Boxes</h2>

    <div class="group-gift" id="giftProducts"></div>

    <!-- Gift Boxes -->
<div class="see-more-container">
 <a href="product-details.php#section-gifts" class="see-more">
    See More
</a>
</div>
</section>


<section class="graduate-flowers">
    <h2>Graduate FLOWERS</h2>

    <div class="group-graduate" id="graduationProducts"></div>
    <!-- Graduation -->
<div class="see-more-container">
   <a href="product-details.php#section-graduation" class="see-more">
    See More
</a>
</div>
</section>


<!--========
================footer========-->
   <?php include "../../components/website/footer.php"; ?>



   
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="../../js/website/main.js?v=4"></script>



</body>

</html>
