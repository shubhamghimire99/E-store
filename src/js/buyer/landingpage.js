limit = 4;

function loadMore() {
    limit += 4;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', `/productApi?limit=${limit}`, true);
    xhr.onload = function() {
        if (this.status == 200) {

            var products = JSON.parse(this.responseText);
            console.log(products);
            var ProductCards = document.getElementById("ProductCards");
            ProductCards.innerHTML = "";
            products.forEach(element => {
                ProductCards.innerHTML += `<div class="card" >
            <img src="/src/images/${element.image}" alt="image can't be loaded">
            <div class="card-desc">
                <h3>${element.title}</h3>
                <p>${element.des}</p>
                <h6>Rs.${element.price}</h6>
                <ul>
                </ul>
            </div>
            <div class="additional-content">
                <div class="content">
                    <button>
                        <i class="fa-solid fa-cart-plus"></i>
                        Add To Cart
                    </button>
                    <div class="share">
                        <h6>
                            <a href="">
                                <i class="fa-solid fa-share-nodes"></i>
                                Share
                            </a>
                        </h6>
                        <h6>
                            <a href="">
                                <i class="fa-solid fa-code-compare"></i>
                                Compare
                            </a>
                        </h6>
                        <h6>
                            <a href="">
                                <i class="fa-regular fa-heart"></i>
                                Like
                            </a>
                        </h6>
                    </div>
                    <button onclick="showProduct(${element.product_id})">
                        Buy Now
                    </button>
                </div>
            </div>
        </div>
    `

            });
        }
    }
    xhr.send();
}

function addToCart(id){
    window.location.href = "/addtocart?id=" + id;
}


function showProduct(id) {
    window.location.href = "/productdetails?id=" + id;
}

// slider js

var counter = 1;
setInterval(function() {
    document.getElementById('radio' + counter).checked = true;
    counter++;
    if (counter > 5) {
        counter = 1;
    }
}, 3000);