<?php
    include 'src/admin/authentication.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/src/css/admin/dashboard.css">
    <script src="https://kit.fontawesome.com/d4ad7cd31c.js" crossorigin="anonymous"></script>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #FFFFFF;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            background-color: #FFFFFF;
        }

        th {
            background-color: #f2f2f2;
        }

        td button {
            background: #FF4742;
            border: 1px solid #FF4742;
            border-radius: 6px;
            box-shadow: rgba(0, 0, 0, 0.1) 1px 2px 4px;
            box-sizing: border-box;
            color: #FFFFFF;
            cursor: pointer;
            display: inline-block;
            font-family: nunito, roboto, proxima-nova, "proxima nova", sans-serif;
            font-size: 16px;
            font-weight: 800;
            line-height: 16px;
            min-height: 40px;
            outline: 0;
            padding: 12px 14px;
            text-align: center;
            text-rendering: geometricprecision;
            text-transform: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: middle;
        }

        td button:hover,
        td button:active {
            background-color: initial;
            background-position: 0 0;
            color: #FF4742;
        }
        td button:active {
            opacity: .5;
        }
    </style>
</head>

<body>
    <!-- sidebar -->
    <div class="sidebar">
        <ul>
            <li>
                <a href="/admin" class="sidebar-link">Dashboard</a>
            </li>
            <li class="active">
                <a href="/sellers" class="sidebar-link">Seller</a>
            </li>
            <li>
                <a href="/sellerverify" class="sidebar-link">Verify Seller</a>
            </li>
            <li>
                <a href="/logout" class="sidebar-link">Logout</a>
            </li>
        </ul>
    </div>


    <!-- navbar-->
    <div class="admin_nav">
        <div class="logo">
            <a href="">
                <svg width="220" height="65" viewBox="0 0 220 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M42.2616 26.2V32.56H62.2216V37H36.9416V11.12H62.1816V15.56H42.2616V22H58.5816V26.2H42.2616ZM66.9053 24.2H80.2653V28.12H66.9053V24.2ZM84.8309 28.28H90.2309C90.3376 29.1867 90.7509 30.0133 91.4709 30.76C92.2176 31.48 93.1909 32.0533 94.3909 32.48C95.5909 32.88 96.9376 33.08 98.4309 33.08C99.7909 33.08 100.911 32.9333 101.791 32.64C102.671 32.3467 103.324 31.9333 103.751 31.4C104.178 30.8667 104.391 30.2267 104.391 29.48C104.391 28.76 104.124 28.2133 103.591 27.84C103.058 27.44 102.218 27.12 101.071 26.88C99.9243 26.6133 98.4176 26.3467 96.5509 26.08C95.0843 25.8667 93.6976 25.5733 92.3909 25.2C91.0843 24.8 89.9243 24.2933 88.9109 23.68C87.9243 23.0667 87.1376 22.32 86.5509 21.44C85.9909 20.5333 85.7109 19.4667 85.7109 18.24C85.7109 16.72 86.1376 15.3867 86.9909 14.24C87.8709 13.0933 89.1643 12.2 90.8709 11.56C92.5776 10.92 94.6709 10.6 97.1509 10.6C100.884 10.6 103.751 11.4 105.751 13C107.778 14.5733 108.764 16.7467 108.711 19.52H103.511C103.404 17.9467 102.738 16.8133 101.511 16.12C100.311 15.4267 98.7909 15.08 96.9509 15.08C95.2443 15.08 93.8309 15.3333 92.7109 15.84C91.6176 16.3467 91.0709 17.2133 91.0709 18.44C91.0709 18.92 91.2043 19.3467 91.4709 19.72C91.7376 20.0667 92.1909 20.3733 92.8309 20.64C93.4709 20.9067 94.3376 21.16 95.4309 21.4C96.5243 21.64 97.8843 21.88 99.5109 22.12C101.031 22.3333 102.404 22.6267 103.631 23C104.884 23.3467 105.951 23.8133 106.831 24.4C107.738 24.96 108.431 25.68 108.911 26.56C109.391 27.44 109.631 28.52 109.631 29.8C109.631 31.3733 109.218 32.7467 108.391 33.92C107.591 35.0667 106.338 35.96 104.631 36.6C102.951 37.24 100.764 37.56 98.0709 37.56C96.1509 37.56 94.4576 37.36 92.9909 36.96C91.5243 36.5333 90.2576 35.9733 89.1909 35.28C88.1243 34.5867 87.2576 33.8267 86.5909 33C85.9243 32.1733 85.4443 31.3467 85.1509 30.52C84.8843 29.6933 84.7776 28.9467 84.8309 28.28ZM112.244 17.12H127.684V21.16H112.244V17.12ZM117.364 11.68H122.564V37H117.364V11.68ZM142.435 37.48C139.928 37.48 137.715 37.08 135.795 36.28C133.901 35.48 132.421 34.32 131.355 32.8C130.288 31.2533 129.755 29.36 129.755 27.12C129.755 24.88 130.288 22.9867 131.355 21.44C132.421 19.8667 133.901 18.68 135.795 17.88C137.715 17.08 139.928 16.68 142.435 16.68C144.941 16.68 147.128 17.08 148.995 17.88C150.888 18.68 152.368 19.8667 153.435 21.44C154.501 22.9867 155.035 24.88 155.035 27.12C155.035 29.36 154.501 31.2533 153.435 32.8C152.368 34.32 150.888 35.48 148.995 36.28C147.128 37.08 144.941 37.48 142.435 37.48ZM142.435 33.48C143.821 33.48 145.061 33.24 146.155 32.76C147.275 32.2533 148.155 31.5333 148.795 30.6C149.435 29.64 149.755 28.48 149.755 27.12C149.755 25.76 149.435 24.6 148.795 23.64C148.155 22.6533 147.288 21.9067 146.195 21.4C145.101 20.8933 143.848 20.64 142.435 20.64C141.048 20.64 139.795 20.8933 138.675 21.4C137.555 21.9067 136.661 22.64 135.995 23.6C135.355 24.56 135.035 25.7333 135.035 27.12C135.035 28.48 135.355 29.64 135.995 30.6C136.635 31.5333 137.515 32.2533 138.635 32.76C139.755 33.24 141.021 33.48 142.435 33.48ZM158.879 17.12H164.079V37H158.879V17.12ZM171.719 21.4C170.225 21.4 168.932 21.6933 167.839 22.28C166.745 22.84 165.865 23.5333 165.199 24.36C164.532 25.1867 164.065 25.9867 163.799 26.76L163.759 24.56C163.785 24.24 163.892 23.7733 164.079 23.16C164.265 22.52 164.545 21.84 164.919 21.12C165.292 20.3733 165.785 19.6667 166.399 19C167.012 18.3067 167.759 17.7467 168.639 17.32C169.519 16.8933 170.545 16.68 171.719 16.68V21.4ZM193.053 30.4H198.093C197.88 31.76 197.307 32.9733 196.373 34.04C195.467 35.1067 194.227 35.9467 192.653 36.56C191.08 37.1733 189.16 37.48 186.893 37.48C184.36 37.48 182.12 37.08 180.173 36.28C178.227 35.4533 176.707 34.2667 175.613 32.72C174.52 31.1733 173.973 29.3067 173.973 27.12C173.973 24.9333 174.507 23.0667 175.573 21.52C176.64 19.9467 178.12 18.7467 180.013 17.92C181.933 17.0933 184.173 16.68 186.733 16.68C189.347 16.68 191.52 17.0933 193.253 17.92C194.987 18.7467 196.267 20 197.093 21.68C197.947 23.3333 198.307 25.4533 198.173 28.04H179.213C179.347 29.0533 179.72 29.9733 180.333 30.8C180.973 31.6267 181.827 32.28 182.893 32.76C183.987 33.24 185.28 33.48 186.773 33.48C188.427 33.48 189.8 33.2 190.893 32.64C192.013 32.0533 192.733 31.3067 193.053 30.4ZM186.493 20.64C184.573 20.64 183.013 21.0667 181.813 21.92C180.613 22.7467 179.84 23.7733 179.493 25H193.013C192.88 23.6667 192.24 22.6133 191.093 21.84C189.973 21.04 188.44 20.64 186.493 20.64Z" fill="black" />
                    <path d="M16.5276 4.9921V23.2988L12.9442 20.9147C6.5818 16.6573 2.63271 8.73858 2.63271 0.138672H0V21.085C0 27.8968 3.36403 34.1977 8.7026 37.1779L16.6008 41.6056V23.2988L20.1842 25.683C26.5466 29.9403 30.4957 37.8591 30.4957 46.459H33.1284V25.5127C33.1284 18.7008 29.7644 12.3999 24.4258 9.41976L16.5276 4.9921Z" fill="black" />
                </svg>
            </a>
        </div>
        <div class="nav-elements">
            <div class="search">
                <input type="text" placeholder="Search">

            </div>

            <div class="profile_elements">
                <div class="notification">
                    <a href=""> <i class="fa-regular fa-bell"></i></a>
                </div>


                <div class="profile">
                    <a href="">
                        <img src="src/admin/profile.jpg" alt="profile_pic">
                    </a>
                </div>
            </div>

        </div>
    </div>

    <div class="main-container">
        <div class="main-content">
            <div class="content">
                <!-- <p> Welcome to the admin seller page</p> -->
                <h1>sellers Records</h1>

                <table>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Contact</th>
                        <th>delete</th>
                    </tr>
                    <?php
                    include("src/Database/connect.php");

                    $sql = "select * FROM user WHERE isseller = '1'";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["firstname"] . " " . $row["lastname"] . "</td> <td>" . $row["email"] . 
                            "</td><td>". $row["contact"] . 
                            "</td><td> <button onclick= 'deleteRecord(" . $row["id"] ." )'> Delete </button> </td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No sellers are registered</td></tr>";
                    
                    }
                    ?>

                </table>


            </div>
        </div>
    </div>

    <script>
        function deleteRecord(id){
            if (confirm("Are you sure you want to delete this record?")) {
            window.location.href = '/deleteseller?id=' + id;
        }
        }
    </script>


</body>

</html>