 <!-- =========================
         NAVIGATION
    ========================== -->

    <nav>

        <!-- Logo and Store Name -->
        <div class="logo">

           <img src="/flover_shop/images/new logo.png" alt="Flover logo">

            <h1>Flover</h1>

        </div>


        <!-- Menu Button for Mobile -->
        <button class="menu-toggle"  id="menuToggle">☰</button>


        <!-- Navigation Links -->
        <ul class="nav-links" id="navLinks">

            <li>
               <a href="/flover_shop/pages/website/index.php">Home</a>
            </li>

            <li>
                <a href="/flover_shop/pages/website/product-details.php">Product</a>
            </li>

            <li>
               <a href="/flover_shop/pages/website/about.php">About</a>
            </li>

           
            <li>
               <a href="/flover_shop/pages/website/checkout.php">Checkout</a>
            </li>

           

           <li>
    <a href="cart.php" class="cart-button" aria-label="Shopping Cart">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
            <path d="M3 4H5L7 16H19L21 8H6"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"/>
            <circle cx="9" cy="20" r="1.5" fill="currentColor"/>
            <circle cx="17" cy="20" r="1.5" fill="currentColor"/>
        </svg>
    </a>
</li>

        
<!-- Search -->
<li class="search-item">
    <form action="../../php/search.php" method="GET">

        <input
            type="text"
            name="keyword"
            id="searchInput"
            placeholder="Search flowers..."
            aria-label="Search flowers"
            required
        >

        <button
            type="button"
            class="search-button"
            id="searchToggle"
            aria-label="Open search"
        >
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                <circle cx="11" cy="11" r="7"
                    stroke="currentColor" stroke-width="2"/>
                <line x1="16.5" y1="16.5" x2="21" y2="21"
                    stroke="currentColor" stroke-width="2"/>
            </svg>
        </button>

    </form>
</li>




        </ul>

       
    </nav>

    
<script src="/flover_shop/js/website/search.js"></script>
