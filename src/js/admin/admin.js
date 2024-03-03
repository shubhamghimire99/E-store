
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

