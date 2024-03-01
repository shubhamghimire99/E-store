<?php
 include 'src/user/Navbar.php';
include "src/Database/connect.php";
$buyer_id = $_SESSION['user_id'];
$sql = "select * from user where id = '$buyer_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/src/css/seller/profile.css">
    <link rel="stylesheet" href="/src/css/buyer/profile.css">
</head>

<body>
    <div class="container">

        <div class="wrapper">
            <div class="menubar">
                <h2>Manage my account</h2>
                <ul>
                    <li class="active"><a href="/user-profile">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                    <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2" />
                                    <path d="M4.271 18.346S6.5 15.5 12 15.5s7.73 2.846 7.73 2.846M12 12a3 3 0 1 0 0-6a3 3 0 0 0 0 6" />
                                </g>
                            </svg>
                            Profile</a></li>
                    <li><a href="/address-book"><svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m17 16l-.15-1.25q-.2-.075-.35-.162t-.3-.238l-1.15.5l-1-1.75l1-.75q-.05-.2-.05-.375t.05-.375l-1-.75l1.05-1.7l1.1.45q.15-.125.3-.2t.35-.15L17 8h2l.15 1.25q.2.075.35.15t.3.2l1.1-.45l1.05 1.7l-1 .75q.05.2.05.375t-.05.375l1 .75l-1 1.75l-1.15-.5q-.15.15-.3.237t-.35.163L19 16zm1-2.5q.65 0 1.075-.425T19.5 12q0-.65-.425-1.075T18 10.5q-.65 0-1.075.425T16.5 12q0 .65.425 1.075T18 13.5M5 23V1h14v6h-2V6H7v12h10v-1h2v6z" />
                            </svg>
                            Address Book</a></li>
                    <li><a href="/order"><svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m17 16l-.15-1.25q-.2-.075-.35-.162t-.3-.238l-1.15.5l-1-1.75l1-.75q-.05-.2-.05-.375t.05-.375l-1-.75l1.05-1.7l1.1.45q.15-.125.3-.2t.35-.15L17 8h2l.15 1.25q.2.075.35.15t.3.2l1.1-.45l1.05 1.7l-1 .75q.05.2.05.375t-.05.375l1 .75l-1 1.75l-1.15-.5q-.15.15-.3.237t-.35.163L19 16zm1-2.5q.65 0 1.075-.425T19.5 12q0-.65-.425-1.075T18 10.5q-.65 0-1.075.425T16.5 12q0 .65.425 1.075T18 13.5M5 23V1h14v6h-2V6H7v12h10v-1h2v6z" />
                            </svg>
                            Orders</a></li>
                </ul>
            </div>
            <div class="content">
                <h2>My profile</h1>
                    <hr>
                    <div class="profile">
                        <form action="/user-update" method="post" class="form">
                            <div class="detail-1">
                                <div class="first-name">
                                    <p>First Name</p>
                                    <p><?php echo $row['firstname']?></p>
                                </div>
                                <div class="last-name">
                                    <p>Last Name</p>
                                    <p><?php echo $row['lastname'] ?></p>
                                </div>
                                <div class="email">
                                    <p>Email</p>
                                    <p><?php echo $row['email'] ?></p>
                                </div>
                            </div>
                            <div class="detail-2">
                                <div class="phone">
                                    <p>Phone</p>
                                    <p><?php echo $row['contact'] ?></p>
                                </div>
                                <div class="gender">
                                    <p>Gender</p>
                                    <p><?php

                                        if ($row['gender'] == null) {
                                            echo "Gender";
                                        }
                                        echo  $row['gender'];

                                        ?></p>
                                </div>
                            </div>
                            <div class="btn">
                                <button type="submit">Edit Profile</button>
                            </div>
                    </div>
            </div>
        </div>
    </div>

    </div>
</body>

</html>