
function verifySeller(id, verified) {
    if(verified){
        if (confirm("Are you sure you want to unverify this seller?")) {
            window.location.href = '/unverifyseller?id=' + id;
        }
    }else{
        if (confirm("Are you sure you want to verify this seller?")) {
            window.location.href = '/verifyseller?id=' + id;
        }
    }


}

function deleteRecord(id) {
    if (confirm("Are you sure you want to delete this record?")) {
        window.location.href = '/deleteseller?id=' + id;
    }
}