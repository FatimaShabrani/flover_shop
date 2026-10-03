const params = new URLSearchParams(window.location.search);
const productId = params.get("id");

fetch(`../../php/product.php?id=${productId}`)
    .then(response => response.json())
    .then(product => {

        const productDetails = document.getElementById("productDetails");

        productDetails.innerHTML = `
            <section class="product-details">

                <div class="product-image">
                    <img
                        src="../../images/${product.image}"
                        alt="${product.name}"
                    >
                </div>

                <div class="product-info">

                    <h1>${product.name}</h1>

                    <p class="product-category">
                        ${product.category}
                    </p>

                    <p class="product-description">
                        ${product.description}
                    </p>

                    <div class="product-price">
                        ${product.price} JOD
                    </div>

                    <p class="product-stock">
                        Available: ${product.stock}
                    </p>

                    <button class="add-to-cart" id="addToCart">
                     Add to Cart
                    </button>
                </div>

            </section>
        `;
               const addToCartButton = document.getElementById("addToCart");

addToCartButton.addEventListener("click", () => {

    const cart = JSON.parse(localStorage.getItem("cart")) || [];

    const existingProduct = cart.find(item => item.id == product.id);

    if (existingProduct) {

        existingProduct.quantity = (existingProduct.quantity || 1) + 1;

    } else {

        product.quantity = 1;
        cart.push(product);

    }

    localStorage.setItem("cart", JSON.stringify(cart));

});
    });