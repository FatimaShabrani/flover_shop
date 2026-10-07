 
 const cart = JSON.parse(localStorage.getItem("cart")) || [];


  if (cart.length === 0) {
    window.location.href = "cart.php";
}

const checkoutItems = document.getElementById("checkoutItems");
const checkoutTotal = document.getElementById("checkoutTotal");

let total = 0;

cart.forEach(product => {

    const quantity = product.quantity || 1;
    const price = Number(product.price);

    total += price * quantity;

    checkoutItems.innerHTML += `
        <div class="checkout-item">
            <span>${product.name}</span>
            <span>${price} JD × ${quantity}</span>
        </div>
    `;
});

checkoutTotal.textContent = `${total.toFixed(2)} JOD`;
const checkoutForm = document.getElementById("checkoutForm");
checkoutForm.addEventListener("submit", function(event) {
    event.preventDefault();

   const customerName = document.getElementById("customerName").value;
const phone = document.getElementById("phone").value;
const address = document.getElementById("address").value;

const orderData = {
    customerName: customerName,
    phone: phone,
    address: address,
    cart: cart
};

axios.post("../../php/place_order.php", orderData)
.then(response => {
    const data = response.data;

    if (data.success) {

        localStorage.removeItem("cart");

        window.location.href =
            "confirmation.php?order_id=" + data.order_id;

    } else {

        alert(data.message);

    }

})
.catch(error => {

    console.error("Error:", error);

    alert("Something went wrong. Please try again.");

});
});