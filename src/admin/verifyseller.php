<?php
include 'src/admin/authentication.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/src/css/seller/dashboard.css">
    <link rel="stylesheet" href="/src/css/admin/dashboard.css">
    <script src="https://kit.fontawesome.com/d4ad7cd31c.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="menubar">
        <div class="logo">
            <svg width="158" height="38" viewBox="0 0 158 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M52.3361 23.25V27.225H64.8111V30H49.0111V13.825H64.7861V16.6H52.3361V20.625H62.5361V23.25H52.3361ZM67.7384 22H76.0884V24.45H67.7384V22ZM78.9419 24.55H82.3169C82.3836 25.1167 82.6419 25.6333 83.0919 26.1C83.5586 26.55 84.1669 26.9083 84.9169 27.175C85.6669 27.425 86.5086 27.55 87.4419 27.55C88.2919 27.55 88.9919 27.4583 89.5419 27.275C90.0919 27.0917 90.5003 26.8333 90.7669 26.5C91.0336 26.1667 91.1669 25.7667 91.1669 25.3C91.1669 24.85 91.0003 24.5083 90.6669 24.275C90.3336 24.025 89.8086 23.825 89.0919 23.675C88.3753 23.5083 87.4336 23.3417 86.2669 23.175C85.3503 23.0417 84.4836 22.8583 83.6669 22.625C82.8503 22.375 82.1253 22.0583 81.4919 21.675C80.8753 21.2917 80.3836 20.825 80.0169 20.275C79.6669 19.7083 79.4919 19.0417 79.4919 18.275C79.4919 17.325 79.7586 16.4917 80.2919 15.775C80.8419 15.0583 81.6503 14.5 82.7169 14.1C83.7836 13.7 85.0919 13.5 86.6419 13.5C88.9753 13.5 90.7669 14 92.0169 15C93.2836 15.9833 93.9003 17.3417 93.8669 19.075H90.6169C90.5503 18.0917 90.1336 17.3833 89.3669 16.95C88.6169 16.5167 87.6669 16.3 86.5169 16.3C85.4503 16.3 84.5669 16.4583 83.8669 16.775C83.1836 17.0917 82.8419 17.6333 82.8419 18.4C82.8419 18.7 82.9253 18.9667 83.0919 19.2C83.2586 19.4167 83.5419 19.6083 83.9419 19.775C84.3419 19.9417 84.8836 20.1 85.5669 20.25C86.2503 20.4 87.1003 20.55 88.1169 20.7C89.0669 20.8333 89.9253 21.0167 90.6919 21.25C91.4753 21.4667 92.1419 21.7583 92.6919 22.125C93.2586 22.475 93.6919 22.925 93.9919 23.475C94.2919 24.025 94.4419 24.7 94.4419 25.5C94.4419 26.4833 94.1836 27.3417 93.6669 28.075C93.1669 28.7917 92.3836 29.35 91.3169 29.75C90.2669 30.15 88.9003 30.35 87.2169 30.35C86.0169 30.35 84.9586 30.225 84.0419 29.975C83.1253 29.7083 82.3336 29.3583 81.6669 28.925C81.0003 28.4917 80.4586 28.0167 80.0419 27.5C79.6253 26.9833 79.3253 26.4667 79.1419 25.95C78.9753 25.4333 78.9086 24.9667 78.9419 24.55ZM96.0753 17.575H105.725V20.1H96.0753V17.575ZM99.2753 14.175H102.525V30H99.2753V14.175ZM114.944 30.3C113.378 30.3 111.994 30.05 110.794 29.55C109.611 29.05 108.686 28.325 108.019 27.375C107.353 26.4083 107.019 25.225 107.019 23.825C107.019 22.425 107.353 21.2417 108.019 20.275C108.686 19.2917 109.611 18.55 110.794 18.05C111.994 17.55 113.378 17.3 114.944 17.3C116.511 17.3 117.878 17.55 119.044 18.05C120.228 18.55 121.153 19.2917 121.819 20.275C122.486 21.2417 122.819 22.425 122.819 23.825C122.819 25.225 122.486 26.4083 121.819 27.375C121.153 28.325 120.228 29.05 119.044 29.55C117.878 30.05 116.511 30.3 114.944 30.3ZM114.944 27.8C115.811 27.8 116.586 27.65 117.269 27.35C117.969 27.0333 118.519 26.5833 118.919 26C119.319 25.4 119.519 24.675 119.519 23.825C119.519 22.975 119.319 22.25 118.919 21.65C118.519 21.0333 117.978 20.5667 117.294 20.25C116.611 19.9333 115.828 19.775 114.944 19.775C114.078 19.775 113.294 19.9333 112.594 20.25C111.894 20.5667 111.336 21.025 110.919 21.625C110.519 22.225 110.319 22.9583 110.319 23.825C110.319 24.675 110.519 25.4 110.919 26C111.319 26.5833 111.869 27.0333 112.569 27.35C113.269 27.65 114.061 27.8 114.944 27.8ZM125.222 17.575H128.472V30H125.222V17.575ZM133.247 20.25C132.313 20.25 131.505 20.4333 130.822 20.8C130.138 21.15 129.588 21.5833 129.172 22.1C128.755 22.6167 128.463 23.1167 128.297 23.6L128.272 22.225C128.288 22.025 128.355 21.7333 128.472 21.35C128.588 20.95 128.763 20.525 128.997 20.075C129.23 19.6083 129.538 19.1667 129.922 18.75C130.305 18.3167 130.772 17.9667 131.322 17.7C131.872 17.4333 132.513 17.3 133.247 17.3V20.25ZM146.581 25.875H149.731C149.598 26.725 149.239 27.4833 148.656 28.15C148.089 28.8167 147.314 29.3417 146.331 29.725C145.348 30.1083 144.148 30.3 142.731 30.3C141.148 30.3 139.748 30.05 138.531 29.55C137.314 29.0333 136.364 28.2917 135.681 27.325C134.998 26.3583 134.656 25.1917 134.656 23.825C134.656 22.4583 134.989 21.2917 135.656 20.325C136.323 19.3417 137.248 18.5917 138.431 18.075C139.631 17.5583 141.031 17.3 142.631 17.3C144.264 17.3 145.623 17.5583 146.706 18.075C147.789 18.5917 148.589 19.375 149.106 20.425C149.639 21.4583 149.864 22.7833 149.781 24.4H137.931C138.014 25.0333 138.248 25.6083 138.631 26.125C139.031 26.6417 139.564 27.05 140.231 27.35C140.914 27.65 141.723 27.8 142.656 27.8C143.689 27.8 144.548 27.625 145.231 27.275C145.931 26.9083 146.381 26.4417 146.581 25.875ZM142.481 19.775C141.281 19.775 140.306 20.0417 139.556 20.575C138.806 21.0917 138.323 21.7333 138.106 22.5H146.556C146.473 21.6667 146.073 21.0083 145.356 20.525C144.656 20.025 143.698 19.775 142.481 19.775Z" fill="black" />
                <path d="M19.8369 3.98163V19L15.536 17.0441C7.89965 13.5515 3.15985 7.05515 3.15985 0H0V17.1838C0 22.7721 4.0376 27.9412 10.4451 30.386L19.9247 34.0184V19L24.2256 20.9559C31.8619 24.4485 36.6017 30.9449 36.6017 38H39.7616V20.8162C39.7616 15.2279 35.724 10.0588 29.3165 7.61397L19.8369 3.98163Z" fill="black" />
            </svg>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="/sellers">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="9" r="4" fill="#A7B7DD" />
                            <circle cx="17" cy="9" r="3" fill="#A7B7DD" />
                            <circle cx="7" cy="9" r="3" fill="#A7B7DD" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5685 18H19.895C20.4867 18 20.9403 17.4901 20.7966 16.9162C20.4284 15.4458 19.448 13 17 13C16.114 13 15.4201 13.3205 14.8781 13.7991C16.3858 14.7773 17.1654 16.4902 17.5685 18Z" fill="#A7B7DD" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.12197 13.7991C8.57989 13.3205 7.88609 13 7 13C4.55208 13 3.57166 15.4458 3.20343 16.9162C3.05971 17.4901 3.51335 18 4.10498 18H6.43155C6.83464 16.4902 7.61422 14.7773 9.12197 13.7991Z" fill="#A7B7DD" />
                            <path d="M12 14C15.7087 14 16.6665 17.301 16.9139 19.0061C16.9932 19.5526 16.5523 20 16 20H8C7.44772 20 7.00684 19.5526 7.08614 19.0061C7.33351 17.301 8.29134 14 12 14Z" fill="#A7B7DD" />
                        </svg>
                        sellers
                    </a>
                </li>
                <li class="active">
                    <a href="/sellerverify">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.7022 5.78441L12.7878 3.24968C12.2847 3.03406 11.7153 3.03406 11.2122 3.24968L5.29778 5.78441C4.47855 6.13551 3.99051 6.98635 4.10106 7.87077L4.71405 12.7747C4.9342 14.5359 5.81517 16.1477 7.1787 17.284L10.7196 20.2347C11.4613 20.8528 12.5387 20.8528 13.2804 20.2347L16.8213 17.284C18.1848 16.1477 19.0658 14.5359 19.286 12.7747L19.8989 7.87077C20.0095 6.98635 19.5215 6.13551 18.7022 5.78441Z" stroke="#A7B7DD" stroke-width="2" stroke-linecap="round" />
                            <path d="M9 12L11.5687 14.5687C11.7918 14.7918 12.1633 14.7551 12.3383 14.4925L16 9" stroke="#A7B7DD" stroke-width="2" stroke-linecap="round" />
                        </svg>
                        verify sellers
                    </a>
                </li>
                <li>
                    <a href="/logout">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.91625 14.7756C6.91625 15.0258 6.81689 15.2656 6.64002 15.4425C6.46315 15.6194 6.22326 15.7188 5.97313 15.7188H1.57188C1.15499 15.7188 0.755175 15.5531 0.460392 15.2584C0.165608 14.9636 0 14.5638 0 14.1469V1.57188C0 1.15499 0.165608 0.755175 0.460392 0.460392C0.755175 0.165608 1.15499 0 1.57188 0H5.97313C6.22326 0 6.46315 0.0993647 6.64002 0.276235C6.81689 0.453105 6.91625 0.692993 6.91625 0.943125C6.91625 1.19326 6.81689 1.43314 6.64002 1.61002C6.46315 1.78689 6.22326 1.88625 5.97313 1.88625H1.88625V13.8325H5.97313C6.22326 13.8325 6.46315 13.9319 6.64002 14.1087C6.81689 14.2856 6.91625 14.5255 6.91625 14.7756ZM15.4429 7.19211L12.2991 4.04836C12.122 3.87119 11.8817 3.77165 11.6311 3.77165C11.3805 3.77165 11.1402 3.87119 10.963 4.04836C10.7859 4.22554 10.6863 4.46584 10.6863 4.71641C10.6863 4.96698 10.7859 5.20728 10.963 5.38446L12.4964 6.91625H5.97313C5.72299 6.91625 5.48311 7.01561 5.30623 7.19248C5.12936 7.36936 5.03 7.60924 5.03 7.85938C5.03 8.10951 5.12936 8.34939 5.30623 8.52626C5.48311 8.70313 5.72299 8.8025 5.97313 8.8025H12.4964L10.9623 10.3359C10.7851 10.513 10.6855 10.7533 10.6855 11.0039C10.6855 11.2545 10.7851 11.4948 10.9623 11.672C11.1394 11.8491 11.3797 11.9487 11.6303 11.9487C11.8809 11.9487 12.1212 11.8491 12.2984 11.672L15.4421 8.52821C15.5301 8.44064 15.5999 8.33657 15.6476 8.22196C15.6952 8.10735 15.7198 7.98445 15.7199 7.86032C15.72 7.73619 15.6955 7.61327 15.648 7.49861C15.6005 7.38394 15.5308 7.27979 15.4429 7.19211Z" fill="#A7B7DD" />
                        </svg>

                        logout
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="content">
        <h1>Verify sellers</h1>
        <div class="wrapper">
            <div class="table">
                <div class="heading">
                    <h4>Products</h4>
                </div>
                <table>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Contact</th>
                        <th>action</th>
                    </tr>
                    <?php
                    include("src/Database/connect.php");

                    $sql = "select * FROM user WHERE isseller = '1'";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["firstname"] . " " . $row["lastname"] . "</td> <td>" . $row["email"] .
                                "</td><td>" . $row["contact"] .
                                "</td><td class='action-btns'> <button class='view-button'>
                                <svg class='view-svgIcon'  width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                <circle cx='12' cy='12' r='3' stroke='#000000' stroke-width='2'/>
                                <path d='M20.188 10.9343C20.5762 11.4056 20.7703 11.6412 20.7703 12C20.7703 12.3588 20.5762 12.5944 20.188 13.0657C18.7679 14.7899 15.6357 18 12 18C8.36427 18 5.23206 14.7899 3.81197 13.0657C3.42381 12.5944 3.22973 12.3588 3.22973 12C3.22973 11.6412 3.42381 11.4056 3.81197 10.9343C5.23206 9.21014 8.36427 6 12 6C15.6357 6 18.7679 9.21014 20.188 10.9343Z' stroke='#000000' stroke-width='2'/>
                                </svg>
                                </button>
                                <button id='verifyButton' class='verify-button'  onclick =
                                'verifySeller(" . $row["id"] . ", " . $row["isVerified"] . ")'> "
                                . ($row["isVerified"] == 1 ? "<svg class='verify-svgIcon' width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                    <path fill-rule='evenodd' clip-rule='evenodd' d='M18.3939 5.74002L13.1818 3.50624C12.4271 3.18282 11.5729 3.18282 10.8182 3.50624L5.60608 5.74002C5.2384 5.8976 5 6.25914 5 6.65917V11.9121C5 13.8498 5.93579 15.6682 7.51257 16.7945L10.8375 19.1694C11.5329 19.6661 12.4671 19.6661 13.1625 19.1694L16.4874 16.7945C18.0642 15.6682 19 13.8498 19 11.9121V6.65917C19 6.25914 18.7616 5.8976 18.3939 5.74002ZM15.7809 9.62469C16.1259 9.19343 16.056 8.56414 15.6247 8.21913C15.1934 7.87412 14.5641 7.94404 14.2191 8.37531L10.9171 12.5029L9.70711 11.2929C9.31658 10.9024 8.68342 10.9024 8.29289 11.2929C7.90237 11.6834 7.90237 12.3166 8.29289 12.7071L9.89788 14.3121C10.53 14.9443 11.5714 14.8866 12.1298 14.1885L15.7809 9.62469Z' fill='#FFFFFF'/>
                                    </svg>
                                    " : "<svg class='verify-svgIcon' width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                    <path fill-rule='evenodd' clip-rule='evenodd' d='M18.3939 5.74002L13.1818 3.50624C12.4271 3.18282 11.5729 3.18282 10.8182 3.50624L5.60608 5.74002C5.2384 5.8976 5 6.25914 5 6.65917V11.9121C5 13.8498 5.93579 15.6682 7.51257 16.7945L10.8375 19.1694C11.5329 19.6661 12.4671 19.6661 13.1625 19.1694L16.4874 16.7945C18.0642 15.6682 19 13.8498 19 11.9121V6.65917C19 6.25914 18.7616 5.8976 18.3939 5.74002ZM15.7809 9.62469C16.1259 9.19343 16.056 8.56414 15.6247 8.21913C15.1934 7.87412 14.5641 7.94404 14.2191 8.37531L10.9171 12.5029L9.70711 11.2929C9.31658 10.9024 8.68342 10.9024 8.29289 11.2929C7.90237 11.6834 7.90237 12.3166 8.29289 12.7071L9.89788 14.3121C10.53 14.9443 11.5714 14.8866 12.1298 14.1885L15.7809 9.62469Z' fill='#FFFFFF'/>
                                    </svg>") .
                                "</button> </td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No sellers are registered</td></tr>";
                    }
                    ?>
                </table>

            </div>
        </div>
    </div>
    <script src="/src/js/admin/admin.js"></script>
</body>

</html>