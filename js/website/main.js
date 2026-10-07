
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

            const categoryProducts = products.filter(
                product => Number(product.category_id) === Number(categoryId)
            );

            container.innerHTML = "";

            categoryProducts.forEach(product => {

                container.innerHTML += `
                    <div class="flower-card">

                        <img
                            src="../../images/${product.image}"
                            alt="${product.name}"
                        >

                        <h3>${product.name}</h3>

                        <p>${product.price} JOD</p>

                    </div>
                `;

            });

        })
        .catch(error => {
            console.error("Error loading products:", error);
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

