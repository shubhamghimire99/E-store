
// slider js
var counter = 1;
setInterval(function() {
    document.getElementById('radio' + counter).checked = true;
    counter++;
    if (counter > 5) {
        counter = 1;
    }
}, 3000);

// fetch('/productApi')
//     .then(response => response.json())
//     .then(data => {
//         data.forEach(element => {
//         const imageUrl = `/src/images/${element.image}`;
//         slide.ClassList.add('slide');

//         const img = document.createElement('img');
//         img.src = imageUrl;
//         img.alt = "image can't be loaded";
//         slide.appendChild(img);
//         document.getElementById('slider').appendChild(slide);

//         });  
//     });



limit = 4;

document.getElementById("loadMoreBtn").addEventListener("click", function() {
    var loading = document.getElementById("loading");
    loading.style.display = "block"; // Show loading animation
  
    // Simulate fetching more content after some delay (replace this with your actual data fetching)
    setTimeout(function() {
      var content = document.getElementById("content");
      for (var i = 0; i < 5; i++) {
        var newItem = document.createElement("div");
        newItem.textContent = "New Item " + (i + 1);
        content.appendChild(newItem);
      }
      loading.style.display = "none"; // Hide loading animation
    }, 2000); // Simulated delay of 2 seconds
  });

  
  
function loadMore() {

    var loading = document.getElementById("loading");
    loading.style.display = "block"; // Show loading animation
  
    // Simulate fetching more content after some delay (replace this with your actual data fetching)
    setTimeout(function() {
      var content = document.getElementById("content");
      for (var i = 0; i < 2; i++) {
        limit += 4;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', `/productApi?limit=${limit}`, true);
        xhr.onload = function() {
            if (this.status == 200) {
                
                var products = JSON.parse(this.responseText);
                // make abbreviations for long descriptions for products api
                products.forEach(element => {
                    if (element.des.length > 60) {
                        element.des = element.des.substring(0, 60) + "...";
                    }
                    if (element.title.length > 20) {
                        element.title = element.title.substring(0, 20) + "...";
                    }
                });

                // formate the price with commas
                products.forEach(element => {
                    element.price = element.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                });

                console.log(products);
                var ProductCards = document.getElementById("ProductCards");
                ProductCards.innerHTML = "";
                products.forEach(element => {
                    
                    ProductCards.innerHTML += `<div class="card" >
                <img src="/src/images/${element.image}" alt="image can't be loaded">
                <div class="card-desc">
                    <h2>${element.title}</h2>
                    <p>${element.des}</p>
                    <h3>Rs.${element.price}</h3>
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
      loading.style.display = "none"; // Hide loading animation
    }, 2000); // Simulated delay of 2 seconds
}

function addToCart(id){
    window.location.href = "/addtocart?id=" + id;
}


function showProduct(id) {
    window.location.href = "/productdetails?id=" + id;
}
