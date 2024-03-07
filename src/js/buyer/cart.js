function deleteFromCart(id) {
    if (confirm("Are you sure you want to delete this item from cart?")){
        window.location.href = "/deleteFromCart?id=" + id;
    }
}
function subtractQuantity(id) {
   
        window.location.href = "/subtractquantity?id=" + id;

}
function addQuantity(id) {
   
        window.location.href = "/addquantity?id=" + id;
 
}


$(document).ready(function(){
    $("#submitBtn").click(function(){
        var addressId = $("input[name='address_id']:checked").val();

        $.ajax({
            type: "POST",
            url: "/buy",
            data: { address_id: addressId },
            success: function(response){
                alert(response);
               
            }
        });
    });
});
