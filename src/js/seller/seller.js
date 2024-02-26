// for inventory page
function editProduct(id){
    window.location.href = "/seller-edit-product?id="+id;
}
function deleteProduct(id){
    if (confirm("Are you sure you want to delete this product?")) {
        window.location.href = "/seller-delete-product?id="+id;
    }   
}