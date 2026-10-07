<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Flover Flower</title>

    <link rel="stylesheet" href="../../css/website/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&display=swap"
        rel="stylesheet">

</head>


<body>

    <!-- =========================
         NAVIGATION
    ========================== -->

    <?php include __DIR__ . '/common/layout/navbar.php'; ?>
    <!-- =========================
         HERO SECTION
    ========================== -->

    <section class="hero">

        <div class="hero-image">

            <img src="../../images/WhatsApp Image 2026-08-14 at 23.56.38.jpeg" alt="Flowers">

            <div class="hero-content">

                <h1>Flover Flower</h1>

                <p>
                    Make Every Moment Bloom
                    <br>
                    Beautiful flowers & gifts for every special moment.
                </p>

                <a href="product.html">Shop Now</a>

            </div>

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
    </section>
    <!-- =========================
         Teady FLOWERS
    ========================== -->

    <section class="teddy-Flower">
        <h2>Teddy Bears</h2>

        <div class="group-teddy" id="teddyProducts"></div>
    </section>

    <!--==================
Gift Boxes
====================-->

    <section class="gift-Flower">
        <h2>Gift Boxes</h2>

        <div class="group-gift" id="giftProducts"></div>
    </section>


    <section class="graduate-flowers">
        <h2>Graduate FLOWERS</h2>

        <div class="group-graduate" id="graduationProducts"></div>
    </section>
    <!--========
================footer========-->
    <?php include __DIR__ . '/common/layout/footer.php'; ?>


    <script src="../../js/website/main.js"></script>


</body>

</html>