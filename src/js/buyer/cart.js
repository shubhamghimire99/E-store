function deleteFromCart(id) {
    if (confirm("Are you sure you want to delete this item from cart?")){
        window.location.href = "/deleteFromCart?id=" + id;
    }
}
function subtractQuantity(id) {
    if (confirm(id)){
        window.location.href = "/subtractquantity?id=" + id;
    }
}
function addQuantity(id) {
    if (confirm("Are you sure you want to add this item from cart?")){
        window.location.href = "/addquantity?id=" + id;
    }
}