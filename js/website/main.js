const menuToggle = document.getElementById("menuToggle");
const navLinks = document.getElementById("navLinks");

menuToggle.addEventListener("click", function () {
    navLinks.classList.toggle("active");
});

 console.log("Cart JavaScript is working!");
 const cartTotal = document.getElementById("cart-total");




const priceElement = document.querySelector(".cart-item p");

console.log(priceElement.textContent);

const priceNumber = parseFloat(
    priceElement.textContent
        .replace("Price: ", "")
        .replace(" JD", "")
);

console.log(priceNumber);

const quantityElement = document.querySelector(".quantity");
console.log(quantityElement.textContent);

let quantityNumber = parseInt(quantityElement.textContent);
quantityElement.textContent = "Quantity: 2";
const total = priceNumber * quantityNumber;
console.log(total);
cartTotal.textContent = total + " JD";
console.log(total);

const removeButton = document.querySelector(".remove-item");
removeButton.addEventListener("click", function () {
    console.log("Remove clicked!");
     const cartItem = removeButton.closest(".cart-item");
    cartItem.innerHTML = `
    <div class="empty-cart">
        <h2>Your cart is empty</h2>
        <p>Looks like you haven't added anything to your cart yet.</p>
        <a href="product-details.html">Continue Shopping</a>
    </div>
`;
     cartTotal.textContent = "0 JD";
});
const increaseButton = document.querySelector(".increase");
const decreaseButton = document.querySelector(".decrease");
console.log(quantityNumber);
increaseButton.addEventListener("click", function () {
    console.log("Increase clicked!");
    quantityNumber++;
    quantityElement.textContent = quantityNumber;
    cartTotal.textContent = (priceNumber * quantityNumber) + " JD";

});
decreaseButton.addEventListener("click", function () {
    console.log("Decrease clicked!");
   if (quantityNumber > 1) {
        quantityNumber--;
        quantityElement.textContent = quantityNumber;
    }
});

fetch("../../php/products.php")
    .then(response => response.json())
    .then(products => {
        console.log(products);
    });