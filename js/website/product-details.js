
const params = new URLSearchParams(window.location.search);
const productId = params.get("id");

const productDetails = document.getElementById("productDetails");

function showCartMessage(message, type = "success") {
    let toast = document.querySelector(".flover-toast");

    if (!toast) {
        toast = document.createElement("div");
        toast.className = "flover-toast";
        toast.setAttribute("role", "status");
        toast.setAttribute("aria-live", "polite");
        document.body.appendChild(toast);
    }

    toast.textContent = message;
    toast.classList.toggle("error", type === "error");
    toast.classList.add("visible");
}

if (!productId) {
    productDetails.textContent = "Product not found.";
} else {
   axios.get(
    `../../php/product.php?id=${encodeURIComponent(productId)}`
)
.then(response => {
    const product = response.data;

    if (!product || !product.id) {
        productDetails.textContent = "Product not found.";
        return;
    }

            const stock = Math.max(0, Number(product.stock) || 0);

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
                            ${product.category || ""}
                        </p>

                        <p class="product-description">
                            ${product.description || ""}
                        </p>

                        <div class="product-price">
                            ${product.price} JOD
                        </div>

                        <p class="product-stock" id="productStock">
                            ${stock > 0
                                ? `Available: ${stock}`
                                : "Out of Stock"
                            }
                        </p>

                        <button
                            class="add-to-cart"
                            id="addToCart"
                            ${stock <= 0 ? "disabled" : ""}
                        >
                            ${stock <= 0 ? "Out of Stock" : "Add to Cart"}
                        </button>
                    </div>

                </section>
            `;

            const addToCartButton =
                document.getElementById("addToCart");

            addToCartButton.addEventListener("click", async () => {
                if (addToCartButton.disabled) {
                    return;
                }

                addToCartButton.disabled = true;

                try {
                    // Get the latest product stock from the database.
                  const response = await axios.get(
                 `../../php/product.php?id=${encodeURIComponent(productId)}`
             );

                 const latestProduct = response.data;

                    if (!latestProduct || !latestProduct.id) {
                        throw new Error("Product is no longer available.");
                    }

                    const availableStock =
                        Math.max(0, Number(latestProduct.stock) || 0);

                    const cart = JSON.parse(
                        localStorage.getItem("cart") || "[]"
                    );

                    const existingProduct = cart.find(
                        item => String(item.id) === String(latestProduct.id)
                    );

                    const currentQuantity = existingProduct
                        ? Math.max(0, Number(existingProduct.quantity) || 0)
                        : 0;

                    // Prevent adding more than the available stock.
                    if (availableStock <= 0) {
                        document.getElementById("productStock").textContent =
                            "Out of Stock";

                        addToCartButton.textContent = "Out of Stock";

                        showCartMessage(
                            "Sorry, this product is out of stock.",
                            "error"
                        );

                        return;
                    }

                    if (currentQuantity >= availableStock) {
                        showCartMessage(
                            `Only ${availableStock} item(s) available. Your cart has reached the limit.`,
                            "error"
                        );

                        return;
                    }

                    if (existingProduct) {
                        existingProduct.quantity = currentQuantity + 1;
                        existingProduct.stock = availableStock;
                    } else {
                        cart.push({
                            ...latestProduct,
                            quantity: 1,
                            stock: availableStock
                        });
                    }

                    localStorage.setItem("cart", JSON.stringify(cart));

                    addToCartButton.textContent = "Added ✓";

                    showCartMessage(
                        "Added to cart successfully! ♡"
                    );

                    // Brief success message, then go to the cart.
                    setTimeout(() => {
                        window.location.href = "cart.php";
                    }, 1000);

                } catch (error) {
                    console.error("Add to cart error:", error);

                    showCartMessage(
                        "Could not add this product. Please try again.",
                        "error"
                    );

                    addToCartButton.disabled = false;
                    addToCartButton.textContent = "Try Again";
                }
            });
        })
        .catch(error => {
            console.error("Product loading error:", error);
            productDetails.textContent =
                "Could not load this product. Please try again later.";
        });
}
