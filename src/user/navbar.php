<?php
session_start();
$base_dir = $_SERVER['DOCUMENT_ROOT'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/css/buyer/navbar.css">
    <script src="https://kit.fontawesome.com/d4ad7cd31c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <nav>
        <ul class="navbar">
            <li class="logo">
                <a href="/">
                    <svg width="158" height="38" viewBox="0 0 158 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M52.3361 21.25V25.225H64.8111V28H49.0111V11.825H64.7861V14.6H52.3361V18.625H62.5361V21.25H52.3361ZM67.7384 20H76.0884V22.45H67.7384V20ZM78.9419 22.55H82.3169C82.3836 23.1167 82.6419 23.6333 83.0919 24.1C83.5586 24.55 84.1669 24.9083 84.9169 25.175C85.6669 25.425 86.5086 25.55 87.4419 25.55C88.2919 25.55 88.9919 25.4583 89.5419 25.275C90.0919 25.0917 90.5003 24.8333 90.7669 24.5C91.0336 24.1667 91.1669 23.7667 91.1669 23.3C91.1669 22.85 91.0003 22.5083 90.6669 22.275C90.3336 22.025 89.8086 21.825 89.0919 21.675C88.3753 21.5083 87.4336 21.3417 86.2669 21.175C85.3503 21.0417 84.4836 20.8583 83.6669 20.625C82.8503 20.375 82.1253 20.0583 81.4919 19.675C80.8753 19.2917 80.3836 18.825 80.0169 18.275C79.6669 17.7083 79.4919 17.0417 79.4919 16.275C79.4919 15.325 79.7586 14.4917 80.2919 13.775C80.8419 13.0583 81.6503 12.5 82.7169 12.1C83.7836 11.7 85.0919 11.5 86.6419 11.5C88.9753 11.5 90.7669 12 92.0169 13C93.2836 13.9833 93.9003 15.3417 93.8669 17.075H90.6169C90.5503 16.0917 90.1336 15.3833 89.3669 14.95C88.6169 14.5167 87.6669 14.3 86.5169 14.3C85.4503 14.3 84.5669 14.4583 83.8669 14.775C83.1836 15.0917 82.8419 15.6333 82.8419 16.4C82.8419 16.7 82.9253 16.9667 83.0919 17.2C83.2586 17.4167 83.5419 17.6083 83.9419 17.775C84.3419 17.9417 84.8836 18.1 85.5669 18.25C86.2503 18.4 87.1003 18.55 88.1169 18.7C89.0669 18.8333 89.9253 19.0167 90.6919 19.25C91.4753 19.4667 92.1419 19.7583 92.6919 20.125C93.2586 20.475 93.6919 20.925 93.9919 21.475C94.2919 22.025 94.4419 22.7 94.4419 23.5C94.4419 24.4833 94.1836 25.3417 93.6669 26.075C93.1669 26.7917 92.3836 27.35 91.3169 27.75C90.2669 28.15 88.9003 28.35 87.2169 28.35C86.0169 28.35 84.9586 28.225 84.0419 27.975C83.1253 27.7083 82.3336 27.3583 81.6669 26.925C81.0003 26.4917 80.4586 26.0167 80.0419 25.5C79.6253 24.9833 79.3253 24.4667 79.1419 23.95C78.9753 23.4333 78.9086 22.9667 78.9419 22.55ZM96.0753 15.575H105.725V18.1H96.0753V15.575ZM99.2753 12.175H102.525V28H99.2753V12.175ZM114.944 28.3C113.378 28.3 111.994 28.05 110.794 27.55C109.611 27.05 108.686 26.325 108.019 25.375C107.353 24.4083 107.019 23.225 107.019 21.825C107.019 20.425 107.353 19.2417 108.019 18.275C108.686 17.2917 109.611 16.55 110.794 16.05C111.994 15.55 113.378 15.3 114.944 15.3C116.511 15.3 117.878 15.55 119.044 16.05C120.228 16.55 121.153 17.2917 121.819 18.275C122.486 19.2417 122.819 20.425 122.819 21.825C122.819 23.225 122.486 24.4083 121.819 25.375C121.153 26.325 120.228 27.05 119.044 27.55C117.878 28.05 116.511 28.3 114.944 28.3ZM114.944 25.8C115.811 25.8 116.586 25.65 117.269 25.35C117.969 25.0333 118.519 24.5833 118.919 24C119.319 23.4 119.519 22.675 119.519 21.825C119.519 20.975 119.319 20.25 118.919 19.65C118.519 19.0333 117.978 18.5667 117.294 18.25C116.611 17.9333 115.828 17.775 114.944 17.775C114.078 17.775 113.294 17.9333 112.594 18.25C111.894 18.5667 111.336 19.025 110.919 19.625C110.519 20.225 110.319 20.9583 110.319 21.825C110.319 22.675 110.519 23.4 110.919 24C111.319 24.5833 111.869 25.0333 112.569 25.35C113.269 25.65 114.061 25.8 114.944 25.8ZM125.222 15.575H128.472V28H125.222V15.575ZM133.247 18.25C132.313 18.25 131.505 18.4333 130.822 18.8C130.138 19.15 129.588 19.5833 129.172 20.1C128.755 20.6167 128.463 21.1167 128.297 21.6L128.272 20.225C128.288 20.025 128.355 19.7333 128.472 19.35C128.588 18.95 128.763 18.525 128.997 18.075C129.23 17.6083 129.538 17.1667 129.922 16.75C130.305 16.3167 130.772 15.9667 131.322 15.7C131.872 15.4333 132.513 15.3 133.247 15.3V18.25ZM146.581 23.875H149.731C149.598 24.725 149.239 25.4833 148.656 26.15C148.089 26.8167 147.314 27.3417 146.331 27.725C145.348 28.1083 144.148 28.3 142.731 28.3C141.148 28.3 139.748 28.05 138.531 27.55C137.314 27.0333 136.364 26.2917 135.681 25.325C134.998 24.3583 134.656 23.1917 134.656 21.825C134.656 20.4583 134.989 19.2917 135.656 18.325C136.323 17.3417 137.248 16.5917 138.431 16.075C139.631 15.5583 141.031 15.3 142.631 15.3C144.264 15.3 145.623 15.5583 146.706 16.075C147.789 16.5917 148.589 17.375 149.106 18.425C149.639 19.4583 149.864 20.7833 149.781 22.4H137.931C138.014 23.0333 138.248 23.6083 138.631 24.125C139.031 24.6417 139.564 25.05 140.231 25.35C140.914 25.65 141.723 25.8 142.656 25.8C143.689 25.8 144.548 25.625 145.231 25.275C145.931 24.9083 146.381 24.4417 146.581 23.875ZM142.481 17.775C141.281 17.775 140.306 18.0417 139.556 18.575C138.806 19.0917 138.323 19.7333 138.106 20.5H146.556C146.473 19.6667 146.073 19.0083 145.356 18.525C144.656 18.025 143.698 17.775 142.481 17.775Z" fill="#0E0E0E" />
                        <path d="M19.8369 3.98163V19L15.536 17.0441C7.89965 13.5515 3.15985 7.05515 3.15985 0H0V17.1838C0 22.7721 4.0376 27.9412 10.4451 30.386L19.9247 34.0184V19L24.2256 20.9559C31.8619 24.4485 36.6017 30.9449 36.6017 38H39.7616V20.8162C39.7616 15.2279 35.724 10.0588 29.3165 7.61397L19.8369 3.98163Z" fill="#0E0E0E" />
                    </svg>
                </a>
            </li>

            <li class="search">
                <form action="/search" method="get">
                    <input type="search" class="search-area" name="query" placeholder="Search for products, Brands and More . . .">

                    <button>search</button>
                </form>
                <!-- <input type="search" class="search-area" placeholder="Search for products, Brands and More . . ."> -->
                <span class="search-output" style="display: none;">
                    <!-- list products related to search.value using addEventlistener to search input  -->
                </span>
                <script>
                    const search = document.querySelector('.search-area');
                    const searchOutput = document.querySelector('.search-output');
                    search.addEventListener('input', () => {

                        if (search.value === '') {
                            searchOutput.style.display = 'none';
                            return;
                        }
                        console.log(search.value);
                        searchOutput.style.display = 'flex';
                        searchOutput.style.flexDirection = 'column';
                        searchOutput.innerHTML = '';
                        fetch(`/navsearch?search=${search.value}`)
                            .then(response => response.json())
                            .then(data => {
                                data.forEach(product => {
                                    searchOutput.innerHTML += `<a href="/productdetails?id=${product.product_id}"><div class="search-item">
                                    <img src="/src/images/${product.image}" alt="${product.title}" width="70" height="70">
                                    <div class="search-item-details">
                                    <p>Rs. ${product.price}</p>
                                    <p>${product.title}</p>
                                    <p>${product.short_des}</p>
                                    </div>
                                    </div>
                                    </a>`;
                                });
                            });
                    });
                </script>
            </li>

            <?php if (isset($_SESSION['user_id'])) : ?>
                <li class="paste-button">
                    <button class="button">
                        <?php
                        include "src/Database/connect.php";
                        $buyer_id = $_SESSION['user_id'];
                        $sql = "select * from user where id = '$buyer_id'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $image = $row['profile_pic'];
                        if ($image == null) {
                            echo "<img src=/src/images/profile-dummy.jpg/  width='30px' height= '30px'  style='border-radius: 50%' >";
                        } else {
                            echo "<img src=/src/images/" . $image . " width='30px' height= '30px'  style='border-radius: 50%' > ";
                        }
                        ?>
                        profile &nbsp; ▼</button>
                    <div class="dropdown-content">
                        <a id="top" href="/user-profile">Manage My Profile</a>
                        <a id="middle" href="/address-book">Address Book</a>
                        <a id="middle" href="/order">My Orders</a>
                        <a id="bottom" href="/logout">Logout</a>
                    </div>
                </li>
            <?php else : ?>
                <li class="paste-button profile">
                    <!-- profile icon -->
                    <a href="/login">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="10" r="3" stroke="#A7B7DD" stroke-linecap="round" />
                            <circle cx="12" cy="12" r="9" stroke="#A7B7DD" />
                            <path d="M18 18.7059C17.6461 17.6427 16.8662 16.7033 15.7814 16.0332C14.6966 15.3632 13.3674 15 12 15C10.6326 15 9.30341 15.3632 8.21858 16.0332C7.13375 16.7033 6.35391 17.6427 6 18.7059" stroke="#A7B7DD" stroke-linecap="round" />
                        </svg>
                        Login
                    </a>
                </li>
            <?php endif; ?>

            <?php if (isset($_SESSION['user_id'])) : ?>
                <li class="wishlist">
                    <div id="notification-icon"> <i class="fa-solid fa-bell"></i> </div>
                    <div id="notification-dropdown">
                    </div>
                    <script>
                        $(document).ready(function() {
                            function loadNotifications() {
                                $.ajax({
                                    url: '/get_order_notification',
                                    
                                    type: 'GET',
                                    dataType: 'json',
                                    success: function(data) {
                                        console.log(data);
                                        if (data.length > 0) {
                                            $('#notification-icon').addClass('has-notifications');
                                            $('#notification-dropdown').empty();
                                            $('#notification-dropdown').append('<h1> Notifications </h1>');
                                            $.each(data , function(index, order) {

                                                if(order.order_status == 'pending'){
                                                    $('#notification-dropdown').append(
                                                    '<a href="/order"> <li>  <img src= "/src/images/' + order.image + ' " width="30px" height= "30px"> </img> ' + order.title + 
                                                    ' is Ordered and is pending </a> </li>');
                                                }

                                                if(order.order_status == 'delivered'){
                                                    $('#notification-dropdown').append(
                                                    '<a href="/order"> <li>  <img src= "/src/images/' + order.image + ' " width="30px" height= "30px"> </img> ' + order.title + 
                                                    ' Your Order is delivered </a> </li>');
                                                }

                                                if(order.order_status == 'cancelled'){
                                                    $('#notification-dropdown').append(
                                                    '<a href="/order"> <li>  <img src= "/src/images/' + order.image + ' " width="30px" height= "30px"> </img> ' + order.title + 
                                                    ' Your Order is cancelled </a> </li>');
                                                }
                                                if(order.cart_status == 'incart'){
                                                    $('#notification-dropdown').append(
                                                    '<a href="/cart"> <li>  <img src= "/src/images/' + order.product_image + ' " width="30px" height= "30px"> </img> ' + order.product_name + 
                                                    ' is added to cart </a> </li>');
                                                }
                                            });
                                        } 
                                        else {
                                            $('#notification-icon').removeClass('has-notifications');
                                            // display no notifications
                                            $('#notification-dropdown').empty();
                                            $('#notification-dropdown').append('<li >No notifications</li>');
                                        }
                                    }
                                });
                            }
                            // Load notifications on page load
                            loadNotifications();
                            // Load notifications every 10 seconds
                            setInterval(loadNotifications, 10000);
                        });
                        
                        $('#notification-icon').click(function() {
                            $('#notification-dropdown').toggle();
                            // show no notifications on click if there are no data in dropdown
                            if ($('#notification-dropdown').children().length == 0) {
                                $('#notification-dropdown').append('<li>No notifications</li>');
                            }
                        });
                        // show notifiication dropdown on click
                    </script>
                </li>
            <?php else : ?>
                <li>
                    <div id="notification-icon"> <i class="fa-solid fa-bell"> </i> </div>
                </li>

            <?php endif; ?>

            <?php if (isset($_SESSION['user_id'])) : ?>
                <li class="cart">
                    <?php
                    include 'src/database/connect.php';
                    $user_id = $_SESSION['user_id'];
                    $sql = "SELECT * FROM cart where user_id = $user_id and cart_status = 'incart'";
                    $result = mysqli_query($conn, $sql);
                    $cart_items = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    // calculate number of cart items
                    $cart_count = mysqli_num_rows($result);
                    echo "<span class='cart-count'>$cart_count</span>";
                    ?>
                    <a href="/cart">
                        <svg width="28" height="28" viewBox="0 0 28 28" class="cart-svg" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M25.2355 19.1926H8.95234L9.76991 17.5273L23.3543 17.5027C23.8137 17.5027 24.2074 17.1746 24.2894 16.7207L26.1707 6.19062C26.2199 5.91445 26.1461 5.63008 25.9656 5.41406C25.8764 5.30775 25.7652 5.22211 25.6396 5.16309C25.514 5.10407 25.377 5.07308 25.2383 5.07227L7.95702 5.01484L7.80937 4.32031C7.7164 3.87734 7.31718 3.55469 6.86328 3.55469H2.63867C2.38267 3.55469 2.13716 3.65638 1.95614 3.8374C1.77513 4.01841 1.67343 4.26393 1.67343 4.51992C1.67343 4.77592 1.77513 5.02143 1.95614 5.20245C2.13716 5.38346 2.38267 5.48516 2.63867 5.48516H6.08124L6.72656 8.55312L8.31523 16.2449L6.26992 19.5836C6.1637 19.727 6.09972 19.8972 6.08523 20.075C6.07073 20.2528 6.10629 20.4312 6.18788 20.5898C6.35195 20.9152 6.68281 21.1203 7.04921 21.1203H8.7664C8.40032 21.6065 8.20258 22.1988 8.20312 22.8074C8.20312 24.3551 9.46093 25.6129 11.0086 25.6129C12.5562 25.6129 13.8141 24.3551 13.8141 22.8074C13.8141 22.1977 13.6117 21.6043 13.2508 21.1203H17.6559C17.2898 21.6065 17.092 22.1988 17.0926 22.8074C17.0926 24.3551 18.3504 25.6129 19.898 25.6129C21.4457 25.6129 22.7035 24.3551 22.7035 22.8074C22.7035 22.1977 22.5012 21.6043 22.1402 21.1203H25.2383C25.7687 21.1203 26.2035 20.6883 26.2035 20.1551C26.2019 19.8994 26.0993 19.6546 25.9179 19.4743C25.7366 19.294 25.4913 19.1927 25.2355 19.1926ZM8.35898 6.91797L24.1035 6.96992L22.5613 15.6051L10.1937 15.627L8.35898 6.91797ZM11.0086 23.6715C10.5328 23.6715 10.1445 23.2832 10.1445 22.8074C10.1445 22.3316 10.5328 21.9434 11.0086 21.9434C11.4844 21.9434 11.8726 22.3316 11.8726 22.8074C11.8726 23.0366 11.7816 23.2564 11.6196 23.4184C11.4575 23.5805 11.2378 23.6715 11.0086 23.6715ZM19.898 23.6715C19.4223 23.6715 19.034 23.2832 19.034 22.8074C19.034 22.3316 19.4223 21.9434 19.898 21.9434C20.3738 21.9434 20.7621 22.3316 20.7621 22.8074C20.7621 23.0366 20.6711 23.2564 20.509 23.4184C20.347 23.5805 20.1272 23.6715 19.898 23.6715Z" fill="black" />
                        </svg>

                    </a>
                </li>
            <?php else : ?>
                <li class="cart">
                    <a href="/cart">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M25.2355 19.1926H8.95234L9.76991 17.5273L23.3543 17.5027C23.8137 17.5027 24.2074 17.1746 24.2894 16.7207L26.1707 6.19062C26.2199 5.91445 26.1461 5.63008 25.9656 5.41406C25.8764 5.30775 25.7652 5.22211 25.6396 5.16309C25.514 5.10407 25.377 5.07308 25.2383 5.07227L7.95702 5.01484L7.80937 4.32031C7.7164 3.87734 7.31718 3.55469 6.86328 3.55469H2.63867C2.38267 3.55469 2.13716 3.65638 1.95614 3.8374C1.77513 4.01841 1.67343 4.26393 1.67343 4.51992C1.67343 4.77592 1.77513 5.02143 1.95614 5.20245C2.13716 5.38346 2.38267 5.48516 2.63867 5.48516H6.08124L6.72656 8.55312L8.31523 16.2449L6.26992 19.5836C6.1637 19.727 6.09972 19.8972 6.08523 20.075C6.07073 20.2528 6.10629 20.4312 6.18788 20.5898C6.35195 20.9152 6.68281 21.1203 7.04921 21.1203H8.7664C8.40032 21.6065 8.20258 22.1988 8.20312 22.8074C8.20312 24.3551 9.46093 25.6129 11.0086 25.6129C12.5562 25.6129 13.8141 24.3551 13.8141 22.8074C13.8141 22.1977 13.6117 21.6043 13.2508 21.1203H17.6559C17.2898 21.6065 17.092 22.1988 17.0926 22.8074C17.0926 24.3551 18.3504 25.6129 19.898 25.6129C21.4457 25.6129 22.7035 24.3551 22.7035 22.8074C22.7035 22.1977 22.5012 21.6043 22.1402 21.1203H25.2383C25.7687 21.1203 26.2035 20.6883 26.2035 20.1551C26.2019 19.8994 26.0993 19.6546 25.9179 19.4743C25.7366 19.294 25.4913 19.1927 25.2355 19.1926ZM8.35898 6.91797L24.1035 6.96992L22.5613 15.6051L10.1937 15.627L8.35898 6.91797ZM11.0086 23.6715C10.5328 23.6715 10.1445 23.2832 10.1445 22.8074C10.1445 22.3316 10.5328 21.9434 11.0086 21.9434C11.4844 21.9434 11.8726 22.3316 11.8726 22.8074C11.8726 23.0366 11.7816 23.2564 11.6196 23.4184C11.4575 23.5805 11.2378 23.6715 11.0086 23.6715ZM19.898 23.6715C19.4223 23.6715 19.034 23.2832 19.034 22.8074C19.034 22.3316 19.4223 21.9434 19.898 21.9434C20.3738 21.9434 20.7621 22.3316 20.7621 22.8074C20.7621 23.0366 20.6711 23.2564 20.509 23.4184C20.347 23.5805 20.1272 23.6715 19.898 23.6715Z" fill="black" />
                        </svg>

                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</body>

</html>