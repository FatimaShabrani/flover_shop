
const cart = JSON.parse(localStorage.getItem("cart") || "[]");

const cartItems = document.getElementById("cartItems");
const cartTotal = document.getElementById("cart-total");

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

function saveCart() {
    localStorage.setItem("cart", JSON.stringify(cart));
}

function renderCart() {
    cartItems.innerHTML = "";

    let total = 0;

    if (cart.length === 0) {
        cartItems.innerHTML = "<p>Your cart is empty.</p>";
        cartTotal.textContent = "0.00 JD";
        return;
    }

    cart.forEach((product, index) => {
        const quantity = Math.max(
            1,
            Number(product.quantity) || 1
        );

        const price = Number(product.price) || 0;
       const stock = Number(product.stock);
const validStock = Number.isFinite(stock) && stock >= 0
    ? stock
    : 0;

        total += price * quantity;

        cartItems.innerHTML += `
            <div class="cart-item">

                <img
                    src="../../images/${product.image}"
                    alt="${product.name}"
                >

                <div class="cart-item-info">

                    <h3>${product.name}</h3>

                    <p>Price: ${price.toFixed(2)} JD</p>

                    <div class="quantity-controls">

                        <button
                            class="decrease"
                            data-index="${index}"
                            aria-label="Decrease quantity"
                        >−</button>

                        <span class="quantity">${quantity}</span>

                        <button
                            class="increase"
                            data-index="${index}"
                            aria-label="Increase quantity"
                           ${quantity >= validStock ? "disabled" : ""}
                        >+</button>

                    </div>

                    <p>
                        ${stock > 0
                            ? `Available: ${stock}`
                            : "Stock unavailable"
                        }
                    </p>

                    <button
                        class="remove-item"
                        data-index="${index}"
                    >
                        Remove
                    </button>

                </div>

            </div>
        `;
    });

    cartTotal.textContent = `${total.toFixed(2)} JD`;

    document.querySelectorAll(".increase").forEach(button => {
        button.addEventListener("click", async () => {
            const index = Number(button.dataset.index);
            const product = cart[index];

            if (!product || button.disabled) {
                return;
            }

            button.disabled = true;

            try {
               
 
         const response = await axios.get(
    `../../php/product.php?id=${encodeURIComponent(product.id)}`
        );

const latestProduct = response.data;

                if (!latestProduct || !latestProduct.id) {
                    throw new Error("Product not found.");
                }

                const availableStock = Math.max(
                    0,
                    Number(latestProduct.stock) || 0
                );

                const currentQuantity = Math.max(
                    1,
                    Number(product.quantity) || 1
                );

                product.stock = availableStock;

                if (currentQuantity >= availableStock) {
                    saveCart();
                    renderCart();

                    showCartMessage(
                        availableStock === 0
                            ? "This product is out of stock."
                            : `Only ${availableStock} item(s) available.`,
                        "error"
                    );

                    return;
                }

                product.quantity = currentQuantity + 1;

                saveCart();
                renderCart();

            } catch (error) {
                console.error("Stock verification error:", error);

                showCartMessage(
                    "Could not verify stock. Please try again.",
                    "error"
                );

                button.disabled = false;
            }
        });
    });

    document.querySelectorAll(".decrease").forEach(button => {
        button.addEventListener("click", () => {
            const index = Number(button.dataset.index);

            if (!cart[index]) {
                return;
            }

            const quantity = Math.max(
                1,
                Number(cart[index].quantity) || 1
            );

            if (quantity > 1) {
                cart[index].quantity = quantity - 1;
            } else {
                cart.splice(index, 1);
            }

            saveCart();
            renderCart();
        });
    });

    document.querySelectorAll(".remove-item").forEach(button => {
        button.addEventListener("click", () => {
            const index = Number(button.dataset.index);

            if (cart[index]) {
                cart.splice(index, 1);
                saveCart();
                renderCart();
            }
        });
    });
}

renderCart();
