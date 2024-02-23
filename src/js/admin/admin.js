
function verifySeller(id) {
    if (confirm("Are you sure you want to verify this seller?")) {
        window.location.href = "/verify?id=" + id;
    }

}

function deleteRecord(id) {
    if (confirm("Are you sure you want to delete this record?")) {
        window.location.href = '/deleteseller?id=' + id;
    }
}