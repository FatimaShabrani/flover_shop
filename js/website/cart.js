const cart = JSON.parse(localStorage.getItem("cart")) || [];

const cartItems = document.getElementById("cartItems");
const cartTotal = document.getElementById("cart-total");

cartItems.innerHTML = "";

let total = 0;

cart.forEach((product, index) => {

    const quantity = product.quantity || 1;
    const price = Number(product.price);

    total += price * quantity;

    cartItems.innerHTML += `
        <div class="cart-item">

            <img
                src="../../images/${product.image}"
                alt="${product.name}"
            >

            <div class="cart-item-info">

                <h3>${product.name}</h3>

                <p>Price: ${price} JD</p>

                <div class="quantity-controls">

                    <button class="decrease" data-index="${index}">
                        −
                    </button>

                    <span class="quantity">${quantity}</span>

                    <button class="increase" data-index="${index}">
                        +
                    </button>

                </div>

                <button class="remove-item" data-index="${index}">
                    Remove
                </button>

            </div>

        </div>
    `;
});

cartTotal.textContent = `${total.toFixed(2)} JD`;

document.querySelectorAll(".increase").forEach(button => {

    button.addEventListener("click", () => {

        const index = button.dataset.index;

        cart[index].quantity++;

        localStorage.setItem("cart", JSON.stringify(cart));

        location.reload();

    });

});

document.querySelectorAll(".decrease").forEach(button => {

    button.addEventListener("click", () => {

        const index = button.dataset.index;

        if (cart[index].quantity > 1) {
            cart[index].quantity--;
        } else {
            cart.splice(index, 1);
        }

        localStorage.setItem("cart", JSON.stringify(cart));

        location.reload();

    });

});

document.querySelectorAll(".remove-item").forEach(button => {

    button.addEventListener("click", () => {

        const index = button.dataset.index;

        cart.splice(index, 1);

        localStorage.setItem("cart", JSON.stringify(cart));

        location.reload();

    });

});