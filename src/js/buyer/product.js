const decreaseBtn = document.querySelector('.decrease');
const increaseBtn = document.querySelector('.increase');
const quantityText = document.getElementById('quantity');

// Function to decrease quantity
function decreaseQuantity() {
    let quantity = parseInt(quantityText.textContent); // Parse integer
    console.log(quantity);
    if (!isNaN(quantity) && quantity > 1) { // Check if it's a valid number
        decreaseBtn.disabled = false;
        quantity--;
        quantityText.textContent = quantity;
    }
}

// Function to increase quantity
function increaseQuantity() {
    let quantity = parseInt(quantityText.textContent); // Parse integer
    console.log(quantity);
    if (!isNaN(quantity)) { // Check if it's a valid number
        quantity++;
        quantityText.textContent = quantity;
    }
}


function addToCart(id) {
    window.location.href = "/addtocart?id=" + id;
}


function buyNow(id) {

    window.location.href = "/buynow?id=" + id;
}

