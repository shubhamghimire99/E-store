<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>navbar</title>
    <script src="https://kit.fontawesome.com/d4ad7cd31c.js" crossorigin="anonymous"></script>

    <style>
    * {
        margin: 0;
        padding: 0;
        font-family: poppins;
        overflow-y: hidden;
    }

    body {
        background-color: #F5F5F5;
    }

    nav {
        width: 100%;
        display: flex;
        justify-content: center;
        background-color: #1D1D1F;
        height: 70px;
    }

    .navbar {
        width: 68%;
        display: flex;
        justify-content: space-between;
        font-size: 25px;
        color: #FFF;
        font-weight: semi-bold;
    }

    .navbar ul {
        list-style: none;
        width: 100%;
        display: inline-flex;
        justify-content: space-between;
        align-items: center ;
    }

    .navbar ul li  {
        display: flex;
        align-items: center;
        
    } 

    a {
        text-decoration: none;
        color: #FFF;
    }

    .search {
        position: relative;
    }

    .search-box {
        padding-left: 20px;
        text-align: start;
        border: #000000 solid 1px;
        border-radius: 30px;
        background: #FFFEFE;
        height: 35px;
        width: 280px;
    }

    .search-btn {
        position: absolute;
        top: 1px;
        right: 0px;
        height: 34px;
        width: 25px;
        border: none;
        border-left: none;
        border-radius: 0px 30px 30px 0px;
        cursor: pointer;
    }

    .search-box:focus {
        outline: none;
    }

    .search-btn:hover {
        background-color: grey;
    } 
</style>
</head>

<body>
    <nav>
        <div class="navbar">
            <ul>

                <li class="logo-white">
                    <a href="">
                        <svg width="158" height="38" viewBox="0 0 158 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M52.3361 23.25V27.225H64.8111V30H49.0111V13.825H64.7861V16.6H52.3361V20.625H62.5361V23.25H52.3361ZM67.7384 22H76.0884V24.45H67.7384V22ZM78.9419 24.55H82.3169C82.3836 25.1167 82.6419 25.6333 83.0919 26.1C83.5586 26.55 84.1669 26.9083 84.9169 27.175C85.6669 27.425 86.5086 27.55 87.4419 27.55C88.2919 27.55 88.9919 27.4583 89.542 27.275C90.092 27.0917 90.5003 26.8333 90.767 26.5C91.0336 26.1667 91.1669 25.7667 91.1669 25.3C91.1669 24.85 91.0003 24.5083 90.6669 24.275C90.3336 24.025 89.8086 23.825 89.092 23.675C88.3753 23.5083 87.4336 23.3417 86.267 23.175C85.3503 23.0417 84.4836 22.8583 83.6669 22.625C82.8503 22.375 82.1253 22.0583 81.4919 21.675C80.8753 21.2917 80.3836 20.825 80.0169 20.275C79.6669 19.7083 79.4919 19.0417 79.4919 18.275C79.4919 17.325 79.7586 16.4917 80.2919 15.775C80.8419 15.0583 81.6503 14.5 82.7169 14.1C83.7836 13.7 85.0919 13.5 86.6419 13.5C88.9753 13.5 90.767 14 92.017 15C93.2836 15.9833 93.9003 17.3417 93.867 19.075H90.617C90.5503 18.0917 90.1336 17.3833 89.367 16.95C88.617 16.5167 87.6669 16.3 86.5169 16.3C85.4503 16.3 84.5669 16.4583 83.8669 16.775C83.1836 17.0917 82.8419 17.6333 82.8419 18.4C82.8419 18.7 82.9253 18.9667 83.0919 19.2C83.2586 19.4167 83.5419 19.6083 83.9419 19.775C84.3419 19.9417 84.8836 20.1 85.567 20.25C86.2503 20.4 87.1003 20.55 88.117 20.7C89.067 20.8333 89.9253 21.0167 90.6919 21.25C91.4753 21.4667 92.1419 21.7583 92.692 22.125C93.2586 22.475 93.692 22.925 93.992 23.475C94.292 24.025 94.442 24.7 94.442 25.5C94.442 26.4833 94.1836 27.3417 93.667 28.075C93.167 28.7917 92.3836 29.35 91.317 29.75C90.267 30.15 88.9003 30.35 87.2169 30.35C86.0169 30.35 84.9586 30.225 84.0419 29.975C83.1253 29.7083 82.3336 29.3583 81.6669 28.925C81.0003 28.4917 80.4586 28.0167 80.0419 27.5C79.6253 26.9833 79.3253 26.4667 79.1419 25.95C78.9753 25.4333 78.9086 24.9667 78.9419 24.55ZM96.0753 17.575H105.725V20.1H96.0753V17.575ZM99.2753 14.175H102.525V30H99.2753V14.175ZM114.944 30.3C113.378 30.3 111.994 30.05 110.794 29.55C109.611 29.05 108.686 28.325 108.019 27.375C107.353 26.4083 107.019 25.225 107.019 23.825C107.019 22.425 107.353 21.2417 108.019 20.275C108.686 19.2917 109.611 18.55 110.794 18.05C111.994 17.55 113.378 17.3 114.944 17.3C116.511 17.3 117.878 17.55 119.044 18.05C120.228 18.55 121.153 19.2917 121.819 20.275C122.486 21.2417 122.819 22.425 122.819 23.825C122.819 25.225 122.486 26.4083 121.819 27.375C121.153 28.325 120.228 29.05 119.044 29.55C117.878 30.05 116.511 30.3 114.944 30.3ZM114.944 27.8C115.811 27.8 116.586 27.65 117.269 27.35C117.969 27.0333 118.519 26.5833 118.919 26C119.319 25.4 119.519 24.675 119.519 23.825C119.519 22.975 119.319 22.25 118.919 21.65C118.519 21.0333 117.978 20.5667 117.294 20.25C116.611 19.9333 115.828 19.775 114.944 19.775C114.078 19.775 113.294 19.9333 112.594 20.25C111.894 20.5667 111.336 21.025 110.919 21.625C110.519 22.225 110.319 22.9583 110.319 23.825C110.319 24.675 110.519 25.4 110.919 26C111.319 26.5833 111.869 27.0333 112.569 27.35C113.269 27.65 114.061 27.8 114.944 27.8ZM125.222 17.575H128.472V30H125.222V17.575ZM133.247 20.25C132.313 20.25 131.505 20.4333 130.822 20.8C130.138 21.15 129.588 21.5833 129.172 22.1C128.755 22.6167 128.463 23.1167 128.297 23.6L128.272 22.225C128.288 22.025 128.355 21.7333 128.472 21.35C128.588 20.95 128.763 20.525 128.997 20.075C129.23 19.6083 129.538 19.1667 129.922 18.75C130.305 18.3167 130.772 17.9667 131.322 17.7C131.872 17.4333 132.513 17.3 133.247 17.3V20.25ZM146.581 25.875H149.731C149.598 26.725 149.239 27.4833 148.656 28.15C148.089 28.8167 147.314 29.3417 146.331 29.725C145.348 30.1083 144.148 30.3 142.731 30.3C141.148 30.3 139.748 30.05 138.531 29.55C137.314 29.0333 136.364 28.2917 135.681 27.325C134.998 26.3583 134.656 25.1917 134.656 23.825C134.656 22.4583 134.989 21.2917 135.656 20.325C136.323 19.3417 137.248 18.5917 138.431 18.075C139.631 17.5583 141.031 17.3 142.631 17.3C144.264 17.3 145.623 17.5583 146.706 18.075C147.789 18.5917 148.589 19.375 149.106 20.425C149.639 21.4583 149.864 22.7833 149.781 24.4H137.931C138.014 25.0333 138.248 25.6083 138.631 26.125C139.031 26.6417 139.564 27.05 140.231 27.35C140.914 27.65 141.723 27.8 142.656 27.8C143.689 27.8 144.548 27.625 145.231 27.275C145.931 26.9083 146.381 26.4417 146.581 25.875ZM142.481 19.775C141.281 19.775 140.306 20.0417 139.556 20.575C138.806 21.0917 138.323 21.7333 138.106 22.5H146.556C146.473 21.6667 146.073 21.0083 145.356 20.525C144.656 20.025 143.698 19.775 142.481 19.775Z" fill="white" />
                            <path d="M19.8369 3.98163V19L15.536 17.0441C7.89965 13.5515 3.15985 7.05515 3.15985 0H0V17.1838C0 22.7721 4.0376 27.9412 10.4451 30.386L19.9247 34.0184V19L24.2256 20.9559C31.8619 24.4485 36.6017 30.9449 36.6017 38H39.7616V20.8162C39.7616 15.2279 35.724 10.0588 29.3165 7.61397L19.8369 3.98163Z" fill="white" />
                        </svg>
                    </a>
                </li>

                <li> <a href="">Categories</a></li>
                <li class="search">
                    <input type="text" name="search" class="search-box" id="search-box" placeholder="Search in E-store">
                    <button class="search-btn">
                        <svg class="search-icon" width="11" height="19" viewBox="0 0 11 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path id="Vector" d="M7.48336 11.4497H7.07154L6.92558 11.1691C7.4541 9.9471 7.74458 8.38701 7.74401 6.77355C7.74401 5.43765 7.54528 4.13176 7.17296 3.021C6.80064 1.91024 6.27144 1.04451 5.6523 0.533286C5.03315 0.0220611 4.35186 -0.111699 3.69457 0.148922C3.03729 0.409542 2.43354 1.05284 1.95966 1.99746C1.48579 2.94208 1.16307 4.1456 1.03233 5.45583C0.901591 6.76605 0.968692 8.12414 1.22515 9.35835C1.48161 10.5926 1.91591 11.6475 2.47313 12.3896C3.03034 13.1318 3.68546 13.528 4.35562 13.528C5.19489 13.528 5.9664 12.9149 6.56068 11.8965L6.70142 12.1875V13.0084L9.30788 18.1937L10.0846 16.6454L7.48336 11.4497ZM4.35562 11.4497C3.0576 11.4497 2.00981 9.36101 2.00981 6.77355C2.00981 4.18609 3.0576 2.09742 4.35562 2.09742C5.65363 2.09742 6.70142 4.18609 6.70142 6.77355C6.70142 9.36101 5.65363 11.4497 4.35562 11.4497Z" fill="#1D1D1F" />
                        </svg>
                    </button>
                </li>

                <li class="login-signup">
                    <svg  class="profile" width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="Group 20">
                            <g id="Group">
                                <path id="Vector" d="M17.88 1C8.55718 1 1 8.55718 1 17.88C1 27.2028 8.55718 34.76 17.88 34.76C27.2028 34.76 34.76 27.2028 34.76 17.88C34.76 8.55718 27.2028 1 17.88 1Z" stroke="#F8F8F8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path id="Vector_2" d="M4.83334 28.5923C4.83334 28.5923 8.5959 23.7883 17.8799 23.7883C27.1639 23.7883 30.9281 28.5923 30.9281 28.5923M17.8799 17.8803C19.2229 17.8803 20.511 17.3468 21.4607 16.3971C22.4104 15.4474 22.9439 14.1593 22.9439 12.8163C22.9439 11.4732 22.4104 10.1852 21.4607 9.2355C20.511 8.28582 19.2229 7.75229 17.8799 7.75229C16.5368 7.75229 15.2488 8.28582 14.2991 9.2355C13.3494 10.1852 12.8159 11.4732 12.8159 12.8163C12.8159 14.1593 13.3494 15.4474 14.2991 16.3971C15.2488 17.3468 16.5368 17.8803 17.8799 17.8803Z" stroke="#F8F8F8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                        </g>
                    </svg>
                
                    <a href="">Login |</a>
                    <a href=""> signup</a>
                </li>

                <li>
                    <a href="">
                        <svg width="32" height="34" viewBox="0 0 32 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27.1307 8.04771H21.7046V6.43817C21.7046 4.73066 20.9424 3.09309 19.5856 1.8857C18.2288 0.678305 16.3885 0 14.4697 0C12.5509 0 10.7107 0.678305 9.35391 1.8857C7.99711 3.09309 7.23487 4.73066 7.23487 6.43817V8.04771H1.80872C1.32902 8.04771 0.868961 8.21729 0.529761 8.51914C0.190561 8.82099 0 9.23038 0 9.65726V27.3622C0 28.6429 0.571682 29.871 1.58928 30.7766C2.60688 31.6821 3.98705 32.1909 5.42615 32.1909H23.5133C24.9524 32.1909 26.3326 31.6821 27.3502 30.7766C28.3678 29.871 28.9395 28.6429 28.9395 27.3622V9.65726C28.9395 9.23038 28.7489 8.82099 28.4097 8.51914C28.0705 8.21729 27.6105 8.04771 27.1307 8.04771ZM10.8523 6.43817C10.8523 5.58442 11.2334 4.76563 11.9118 4.16193C12.5902 3.55824 13.5103 3.21909 14.4697 3.21909C15.4291 3.21909 16.3492 3.55824 17.0276 4.16193C17.706 4.76563 18.0872 5.58442 18.0872 6.43817V8.04771H10.8523V6.43817ZM25.322 27.3622C25.322 27.7891 25.1315 28.1985 24.7923 28.5003C24.4531 28.8022 23.993 28.9718 23.5133 28.9718H5.42615C4.94645 28.9718 4.48639 28.8022 4.14719 28.5003C3.80799 28.1985 3.61743 27.7891 3.61743 27.3622V11.2668H7.23487V12.8763C7.23487 13.3032 7.42543 13.7126 7.76463 14.0145C8.10383 14.3163 8.56388 14.4859 9.04358 14.4859C9.52328 14.4859 9.98334 14.3163 10.3225 14.0145C10.6617 13.7126 10.8523 13.3032 10.8523 12.8763V11.2668H18.0872V12.8763C18.0872 13.3032 18.2777 13.7126 18.6169 14.0145C18.9561 14.3163 19.4162 14.4859 19.8959 14.4859C20.3756 14.4859 20.8356 14.3163 21.1748 14.0145C21.514 13.7126 21.7046 13.3032 21.7046 12.8763V11.2668H25.322V27.3622Z" fill="#F8F8F8" />
                            <ellipse cx="26.2397" cy="27.0403" rx="5.76007" ry="6.24007" fill="white" />
                            <path d="M23.6374 27.0856C23.6374 25.7016 23.8854 24.6176 24.3814 23.8336C24.8854 23.0496 25.7174 22.6576 26.8774 22.6576C28.0374 22.6576 28.8654 23.0496 29.3614 23.8336C29.8654 24.6176 30.1174 25.7016 30.1174 27.0856C30.1174 28.4776 29.8654 29.5696 29.3614 30.3616C28.8654 31.1536 28.0374 31.5496 26.8774 31.5496C25.7174 31.5496 24.8854 31.1536 24.3814 30.3616C23.8854 29.5696 23.6374 28.4776 23.6374 27.0856ZM28.4614 27.0856C28.4614 26.4936 28.4214 25.9976 28.3414 25.5976C28.2694 25.1896 28.1174 24.8576 27.8854 24.6016C27.6614 24.3456 27.3254 24.2176 26.8774 24.2176C26.4294 24.2176 26.0894 24.3456 25.8574 24.6016C25.6334 24.8576 25.4814 25.1896 25.4014 25.5976C25.3294 25.9976 25.2934 26.4936 25.2934 27.0856C25.2934 27.6936 25.3294 28.2056 25.4014 28.6216C25.4734 29.0296 25.6254 29.3616 25.8574 29.6176C26.0894 29.8656 26.4294 29.9896 26.8774 29.9896C27.3254 29.9896 27.6654 29.8656 27.8974 29.6176C28.1294 29.3616 28.2814 29.0296 28.3534 28.6216C28.4254 28.2056 28.4614 27.6936 28.4614 27.0856Z" fill="black" />
                        </svg>
                    </a>
                </li>

            </ul>
        </div>
    </nav>
    <?php include('grid.php'); ?>
</body>
</html>