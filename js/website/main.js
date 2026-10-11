
// ==============================
// Mobile Menu
// ==============================

const menuToggle = document.getElementById("menuToggle");
const navLinks = document.getElementById("navLinks");

if (menuToggle && navLinks) {
    menuToggle.addEventListener("click", function () {
        navLinks.classList.toggle("active");
    });
}


// ==============================
// Load Categories
// ==============================

const categoriesContainer = document.getElementById("categoriesContainer");

if (categoriesContainer) {

   axios.get("../../php/categories.php")
    .then(response => {
        const categories = response.data;

            categoriesContainer.innerHTML = "";

            categories.forEach(category => {

                categoriesContainer.innerHTML += `
                    <div class="category">
                        <img
                            src="../../images/${category.image}"
                            alt="${category.name}"
                        >

                        <h3>${category.name}</h3>
                    </div>
                `;

            });

            
            // ==============================
            // Category Reveal Animation
            // ==============================

            const categoriesSection =
                categoriesContainer.closest(".categories");

            if (categoriesSection) {
                const title = categoriesSection.querySelector("h2");
                const cards =
                    categoriesContainer.querySelectorAll(".category");

                if (
                    title &&
                    !window.matchMedia(
                        "(prefers-reduced-motion: reduce)"
                    ).matches
                ) {
                    categoriesSection.classList.add("reveal-ready");

                    const observer = new IntersectionObserver(
                        entries => {
                            entries.forEach(entry => {
                                if (entry.isIntersecting) {
                                    entry.target.classList.add("show");
                                    observer.unobserve(entry.target);
                                }
                            });
                        },
                        { threshold: 0.15 }
                    );

                    observer.observe(title);

                    cards.forEach((card, index) => {
                        card.style.transitionDelay =
                            `${(index + 1) * 0.15}s`;

                        observer.observe(card);
                    });
                }
            }


        })
        .catch(error => {
            console.error("Error loading categories:", error);
        });
}



// ==============================
// Load Home Products
// ==============================

function loadProductsByCategory(categoryId, containerId) {

    const container = document.getElementById(containerId);

    if (!container) {
        return;
    }

    axios.get("../../php/products.php")
        .then(response => {

            const products = response.data;

            if (!Array.isArray(products)) {
                throw new Error("Invalid products data");
            }

            // Show only products selected for the home page
            // and belonging to the requested category
            const categoryProducts = products.filter(product =>
                Number(product.category_id) === Number(categoryId) &&
                Number(product.show_on_home) === 1
            );

            container.innerHTML = "";

            categoryProducts.forEach(product => {

                container.innerHTML += `
                    <div class="product_cards">

                        <a class="product-card-link"
                           href="product.php?id=${product.id}">

                            <div class="bouquet_image">
                                <img
                                    src="../../images/${product.image}"
                                    alt="${product.name}"
                                    loading="lazy"
                                >
                            </div>

                            <div class="bouquet-content">

                                <div class="bouquet-info">
                                    <h3>${product.name}</h3>
                                </div>

                                <p class="description">
                                    ${product.description || "A beautiful gift made with love."}
                                </p>

                                <div class="card-bottom">

                                    <div class="price">
                                        <span>${product.price}</span>
                                        <small>JOD</small>
                                    </div>

                                    <span class="details">
                                        View Details
                                    </span>

                                </div>

                            </div>

                        </a>

                    </div>
                `;
            });

        })
        .catch(error => {
            console.error("Error loading home products:", error);
        });
}



// ==============================
// Home Product Sections
// ==============================

// Bouquets
loadProductsByCategory(2, "featuredProducts");

// Graduation
loadProductsByCategory(3, "graduationProducts");

// Teddy Bears
loadProductsByCategory(4, "teddyProducts");

// Gift Boxes
loadProductsByCategory(5, "giftProducts");






// ==============================
// Hero Image Slider
// ==============================

const heroSlide = document.getElementById("heroSlide");

if (heroSlide) {
   const heroImages = [
    "../../images/WhatsApp_Image_2026-10-11_at_20.56.33__1_-removebg-preview.png",
    "../../images/WhatsApp_Image_2026-10-11_at_22.29.24-removebg-preview.png",
    "../../images/WhatsApp_Image_2026-10-11_at_22.29.24__1_-removebg-preview.png"
];

    let currentSlide = 0;

    setInterval(() => {
        heroSlide.classList.add("changing");

        setTimeout(() => {
            currentSlide = (currentSlide + 1) % heroImages.length;

            heroSlide.src = heroImages[currentSlide];

            heroSlide.onload = () => {
                heroSlide.classList.remove("changing");
            };

            heroSlide.onerror = () => {
                console.error(
                    "Could not load hero image:",
                    heroImages[currentSlide]
                );

                heroSlide.classList.remove("changing");
            };
        }, 400);
    }, 4000);
}

