function verifyPayment(payload){
    $.ajax({
        url : "/payment-api",
        type : "POST",
        data :payload,
        dataType: 'json',
        success: function(response){alert(response)},
        // error: function (error) {alert(error.responseJSON['message']) }
    });
}

var config = {
    // replace the publicKey with yours
    "publicKey": "test_public_key_c6c15d2d463d4bdfb744141e7d28a761",
    "productIdentity": "1234567890",
    "productName": "page",
    "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
    "paymentPreference": [
        "KHALTI",
        "EBANKING",
        "MOBILE_BANKING",
        "CONNECT_IPS",
        "SCT",
        ],
    "eventHandler": {
        onSuccess (payload) {
            // hit merchant api for initiating verfication                
            console.log(payload);
            verifyPayment(payload);
        },
        onError (error) {
            console.log(error);
        },
        onClose () {
            console.log('widget is closing');
        }
    }
};

var checkout = new KhaltiCheckout(config);
var btn = document.getElementById("payment-button");
btn.onclick = function () {
    // minimum transaction amount must be 10, i.e 1000 in paisa.
    checkout.show({amount: 1000});
}