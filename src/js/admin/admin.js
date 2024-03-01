
function verifySeller(id, verified) {
    if(verified){
        if (confirm("Are you sure you want to unverify this seller?")) {
            window.location.href = '/unverifyseller?id=' + id;
        }
    }else{
        if (confirm("Are you sure you want to verify this seller?")) {
            window.location.href = '/verify?id=' + id;
        }
    }


}

// function deleteRecord(id) {
//     if (confirm("Are you sure you want to delete this record?")) {
//         window.location.href = '/deleteseller?id=' + id;
//     }
// }

function toggleStatus(vendorId, currentStatus) {
    var newStatus = currentStatus === 'enabled' ? 'disabled' : 'enabled';
    $.post("toggle_vendor_status.php", {
        vendor_id: vendorId,
        new_status: newStatus
    }, function(data, status) {
        alert(data);
        // Reload the page or update UI if needed
        location.reload();
    });
}
