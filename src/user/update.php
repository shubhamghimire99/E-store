<?php
// include "src/user/authentication.php";
include "src/Database/connect.php";
include "src/user/Navbar.php";

$buyer_id = $_SESSION['user_id'];
$sql = "select * from `user` where id = '$buyer_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $profile = $_POST['profile'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];

    if (isset($_FILES['profile'])) {
        echo "inside the saving file";
        $errors = array();
        $file_name = $_FILES['profile']['name'];
        $file_size = $_FILES['profile']['size'];
        $file_tmp = $_FILES['profile']['tmp_name'];
        $file_type = $_FILES['profile']['type'];

        $file_ext = strtolower(explode('.', $file_name)[1]);

        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "src/images/" . $file_name);
            echo "Success";
        } else {
            print_r($errors);
        }
    }


    //sql query to update data to database
    $sql = "update user set firstname='$firstname',profile_pic='$file_name',lastname='$lastname',email='$email',contact='$phone',gender='$gender' where id='$buyer_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script> data updated successfully </script>";
        header('location: /user-profile');
    } else {
        die(mysqli_error($conn));
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="/src/css/seller/profile.css">
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap");


            .content {
                padding: 0 7% 0 10%;
                display: flex;
                flex-direction: column;
                height: 100vh;
                width: 80%;
            }

            .content h2 {
                margin-top: 20px;
                font-size: 1.3em;
                font-weight: 500;
            }

            .content hr {
                margin-top: 30px;
                border: 1px solid #e0e0e0;
                width: 100%;
            }

            .box {
                width: 100%;
                padding: 40px 0px 20px 0;
                height: auto;
                display: flex;
                justify-content: space-between;
            }

            .form {
                width: 100%;
                height: 60vh;
                background-color: #FFFFFF;
                display: flex;
                flex-direction: column;
                /* padding: 20px; */
                border-radius: 10px;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                margin-bottom: 20px;
                padding: 20px 100px 20px 20px;
            }

            .detail-1 {
                width: 100%;
                display: flex;
                justify-content: space-between;
                padding: 20px;
            }

            .profile-pic {
                height: 80px;
                width: 30%;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .profile-pic label {
                width: 100%;
                height: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: #4D47C3;
                color: #FFFFFF;
                cursor: pointer;
            }

            .profile-pic input {
                display: none;
            }

            .first-name,
            .last-name,
            .email {
                width: 30%;
                height: 80px;
                display: flex;
                gap: 10px;
                flex-direction: column;
            }

            .first-name input,
            .last-name input,
            .email input {
                width: 100%;
                height: 40px;
                padding: 10px;
                border: 1px solid #e0e0e0;
                border-radius: 5px;
                outline: none;
            }

            .first-name p,
            .last-name p,
            .email p {
                font-size: 0.9em;
                color: #000000;
                font-weight: 500;
            }

            .detail-2 {
                width: 100%;
                display: flex;
                justify-content: space-between;
                padding: 20px;
            }

            .phone {
                width: 30%;
                height: 80px;
                gap: 10px;
                display: flex;
                flex-direction: column;
            }

            .gender {
                width: 30%;
                height: 80px;
                display: flex;
                gap :10px;
                flex-direction: column;
                position: relative;
            }

            .phone p,
            .gender label{
                font-size: 0.9em;
                color: #000000;
                font-weight: 500;
            }

            .phone input,
            .gender select,
            .gender option {
                width: 100%;
                height: 40px;
                padding: 10px;
                border: 1px solid #e0e0e0;
                border-radius: 5px;
                outline: none;
            }
            .btn {
                margin-top: 20px;
                width: 45%;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 20px;
            }

            .btn button {
                width: 50%;
                height: 40px;
                background-color: #4D47C3;
                border: none;
                color: #FFFFFF;
                cursor: pointer;
            }
        </style>
    </head>

    <body>
        <div class="container">
          <div class="wrapper">
                <div class="menubar">
                    <h2>Manage my account</h2>
                    <ul>
                        <li class="active"><a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                        <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2" />
                                        <path d="M4.271 18.346S6.5 15.5 12 15.5s7.73 2.846 7.73 2.846M12 12a3 3 0 1 0 0-6a3 3 0 0 0 0 6" />
                                    </g>
                                </svg>
                                Profile</a></li>
                        <li onclick="openFormPage()"><a href="/address-book"><svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 24 24">
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
                        <div class="box">
                            <form action="#" method="post" class="form" enctype="multipart/form-data">
                                <div class="detail-1">
                                    <div class="profile-pic">
                                        <label for="input-file">Upload image</label>
                                        <input type="file" accept="" id="input-file" name="profile">
                                    </div>
                                    <div class="first-name">
                                        <p>First Name</p>
                                        <input type="text" placeholder="Enter your first-name" value="<?php echo $row['firstname'] ?>" name="firstname">
                                    </div>
                                    <div class="last-name">
                                        <p>Last Name</p>
                                        <input type="text" placeholder="Enter your last-name" value="<?php echo $row['lastname'] ?>" name="lastname">
                                    </div>

                                </div>
                                <div class="detail-2">
                                    <div class="email">
                                        <p>Email</p>
                                        <input type="text" placeholder="Enter your email" value="<?php echo $row['email'] ?>" name="email">
                                    </div>
                                    <div class="phone">
                                        <p>Phone</p>
                                        <input type="text" placeholder="Phone No" value="<?php echo $row['contact'] ?>" name="phone">
                                    </div>
                                    <div class="gender">
                                        <label for="gender">Gender</label>
                                        <select name="gender" id="gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="btn">
                                    <button type="submit" name="submit">Save Changes</button>
                                </div>
                        </div>
                </div>
            </div>
        </div>

        </div>
    </body>

    </html>
</body>

</html>