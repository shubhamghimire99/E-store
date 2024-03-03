<?php
     include "src/user/authentication.php";
     include "src/Database/connect.php";
    
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

    if(isset($_FILES['profile'])){
        echo "inside the saving file";
        $errors= array();
        $file_name = $_FILES['profile']['name'];
        $file_size = $_FILES['profile']['size'];
        $file_tmp = $_FILES['profile']['tmp_name'];
        $file_type = $_FILES['profile']['type'];

        $file_ext=strtolower(explode('.',$file_name)[1]);
        
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($file_size > 2097152) {
           $errors[]='File size must be excately 2 MB';
        }
        
        if(empty($errors)==true) {
           move_uploaded_file($file_tmp,"src/images/".$file_name);
           echo "Success";
        }else{
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
            /* padding: 20px; */
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px 100px 20px 20px;
        }
        .detail-1{
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }
    .profile-pic{
        height: 80px;
        width: 30%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .profile-pic label{
        width: 100%;
        height: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #4D47C3;
        color: #FFFFFF;
        cursor: pointer;
    }
    .profile-pic input{
        display: none;
    }
        .first-name, .last-name, .email{
            width: 30%;
            height:80px;
            display: flex;
            flex-direction: column;
        }

        .detail-2{
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }
        .phone{
            width: 30%;
            height:80px;
            display: flex;
            flex-direction: column;
        }

        .gender{
            width: 30%;
            height: 80px;
            display: inline-block;
            position: relative;
        }
        .btn{
            margin-top: 20px;
            width: 45%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .btn button{
            width: 50%;
            height: 40px;
            background-color: #4D47C3;
            border: none;
            color: #FFFFFF;
            cursor: pointer ;
        }
    </style>
</head>
<body>
<div class="container">
        <header class="navbar">
            <svg width="110" height="38" viewBox="0 0 158 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M52.3361 23.25V27.225H64.8111V30H49.0111V13.825H64.7861V16.6H52.3361V20.625H62.5361V23.25H52.3361ZM67.7384 22H76.0884V24.45H67.7384V22ZM78.9419 24.55H82.3169C82.3836 25.1167 82.6419 25.6333 83.0919 26.1C83.5586 26.55 84.1669 26.9083 84.9169 27.175C85.6669 27.425 86.5086 27.55 87.4419 27.55C88.2919 27.55 88.9919 27.4583 89.5419 27.275C90.0919 27.0917 90.5003 26.8333 90.7669 26.5C91.0336 26.1667 91.1669 25.7667 91.1669 25.3C91.1669 24.85 91.0003 24.5083 90.6669 24.275C90.3336 24.025 89.8086 23.825 89.0919 23.675C88.3753 23.5083 87.4336 23.3417 86.2669 23.175C85.3503 23.0417 84.4836 22.8583 83.6669 22.625C82.8503 22.375 82.1253 22.0583 81.4919 21.675C80.8753 21.2917 80.3836 20.825 80.0169 20.275C79.6669 19.7083 79.4919 19.0417 79.4919 18.275C79.4919 17.325 79.7586 16.4917 80.2919 15.775C80.8419 15.0583 81.6503 14.5 82.7169 14.1C83.7836 13.7 85.0919 13.5 86.6419 13.5C88.9753 13.5 90.7669 14 92.0169 15C93.2836 15.9833 93.9003 17.3417 93.8669 19.075H90.6169C90.5503 18.0917 90.1336 17.3833 89.3669 16.95C88.6169 16.5167 87.6669 16.3 86.5169 16.3C85.4503 16.3 84.5669 16.4583 83.8669 16.775C83.1836 17.0917 82.8419 17.6333 82.8419 18.4C82.8419 18.7 82.9253 18.9667 83.0919 19.2C83.2586 19.4167 83.5419 19.6083 83.9419 19.775C84.3419 19.9417 84.8836 20.1 85.5669 20.25C86.2503 20.4 87.1003 20.55 88.1169 20.7C89.0669 20.8333 89.9253 21.0167 90.6919 21.25C91.4753 21.4667 92.1419 21.7583 92.6919 22.125C93.2586 22.475 93.6919 22.925 93.9919 23.475C94.2919 24.025 94.4419 24.7 94.4419 25.5C94.4419 26.4833 94.1836 27.3417 93.6669 28.075C93.1669 28.7917 92.3836 29.35 91.3169 29.75C90.2669 30.15 88.9003 30.35 87.2169 30.35C86.0169 30.35 84.9586 30.225 84.0419 29.975C83.1253 29.7083 82.3336 29.3583 81.6669 28.925C81.0003 28.4917 80.4586 28.0167 80.0419 27.5C79.6253 26.9833 79.3253 26.4667 79.1419 25.95C78.9753 25.4333 78.9086 24.9667 78.9419 24.55ZM96.0753 17.575H105.725V20.1H96.0753V17.575ZM99.2753 14.175H102.525V30H99.2753V14.175ZM114.944 30.3C113.378 30.3 111.994 30.05 110.794 29.55C109.611 29.05 108.686 28.325 108.019 27.375C107.353 26.4083 107.019 25.225 107.019 23.825C107.019 22.425 107.353 21.2417 108.019 20.275C108.686 19.2917 109.611 18.55 110.794 18.05C111.994 17.55 113.378 17.3 114.944 17.3C116.511 17.3 117.878 17.55 119.044 18.05C120.228 18.55 121.153 19.2917 121.819 20.275C122.486 21.2417 122.819 22.425 122.819 23.825C122.819 25.225 122.486 26.4083 121.819 27.375C121.153 28.325 120.228 29.05 119.044 29.55C117.878 30.05 116.511 30.3 114.944 30.3ZM114.944 27.8C115.811 27.8 116.586 27.65 117.269 27.35C117.969 27.0333 118.519 26.5833 118.919 26C119.319 25.4 119.519 24.675 119.519 23.825C119.519 22.975 119.319 22.25 118.919 21.65C118.519 21.0333 117.978 20.5667 117.294 20.25C116.611 19.9333 115.828 19.775 114.944 19.775C114.078 19.775 113.294 19.9333 112.594 20.25C111.894 20.5667 111.336 21.025 110.919 21.625C110.519 22.225 110.319 22.9583 110.319 23.825C110.319 24.675 110.519 25.4 110.919 26C111.319 26.5833 111.869 27.0333 112.569 27.35C113.269 27.65 114.061 27.8 114.944 27.8ZM125.222 17.575H128.472V30H125.222V17.575ZM133.247 20.25C132.313 20.25 131.505 20.4333 130.822 20.8C130.138 21.15 129.588 21.5833 129.172 22.1C128.755 22.6167 128.463 23.1167 128.297 23.6L128.272 22.225C128.288 22.025 128.355 21.7333 128.472 21.35C128.588 20.95 128.763 20.525 128.997 20.075C129.23 19.6083 129.538 19.1667 129.922 18.75C130.305 18.3167 130.772 17.9667 131.322 17.7C131.872 17.4333 132.513 17.3 133.247 17.3V20.25ZM146.581 25.875H149.731C149.598 26.725 149.239 27.4833 148.656 28.15C148.089 28.8167 147.314 29.3417 146.331 29.725C145.348 30.1083 144.148 30.3 142.731 30.3C141.148 30.3 139.748 30.05 138.531 29.55C137.314 29.0333 136.364 28.2917 135.681 27.325C134.998 26.3583 134.656 25.1917 134.656 23.825C134.656 22.4583 134.989 21.2917 135.656 20.325C136.323 19.3417 137.248 18.5917 138.431 18.075C139.631 17.5583 141.031 17.3 142.631 17.3C144.264 17.3 145.623 17.5583 146.706 18.075C147.789 18.5917 148.589 19.375 149.106 20.425C149.639 21.4583 149.864 22.7833 149.781 24.4H137.931C138.014 25.0333 138.248 25.6083 138.631 26.125C139.031 26.6417 139.564 27.05 140.231 27.35C140.914 27.65 141.723 27.8 142.656 27.8C143.689 27.8 144.548 27.625 145.231 27.275C145.931 26.9083 146.381 26.4417 146.581 25.875ZM142.481 19.775C141.281 19.775 140.306 20.0417 139.556 20.575C138.806 21.0917 138.323 21.7333 138.106 22.5H146.556C146.473 21.6667 146.073 21.0083 145.356 20.525C144.656 20.025 143.698 19.775 142.481 19.775Z" fill="black" />
                <path d="M19.8369 3.98163V19L15.536 17.0441C7.89965 13.5515 3.15985 7.05515 3.15985 0H0V17.1838C0 22.7721 4.0376 27.9412 10.4451 30.386L19.9247 34.0184V19L24.2256 20.9559C31.8619 24.4485 36.6017 30.9449 36.6017 38H39.7616V20.8162C39.7616 15.2279 35.724 10.0588 29.3165 7.61397L19.8369 3.98163Z" fill="black" />
            </svg>
            <nav>
                <div class="profile">
                    P
                </div>
                <p><?php echo $row['firstname'] ?></p>
            </nav>
        </header>

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
                    <li onclick="openFormPage()"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m17 16l-.15-1.25q-.2-.075-.35-.162t-.3-.238l-1.15.5l-1-1.75l1-.75q-.05-.2-.05-.375t.05-.375l-1-.75l1.05-1.7l1.1.45q.15-.125.3-.2t.35-.15L17 8h2l.15 1.25q.2.075.35.15t.3.2l1.1-.45l1.05 1.7l-1 .75q.05.2.05.375t-.05.375l1 .75l-1 1.75l-1.15-.5q-.15.15-.3.237t-.35.163L19 16zm1-2.5q.65 0 1.075-.425T19.5 12q0-.65-.425-1.075T18 10.5q-.65 0-1.075.425T16.5 12q0 .65.425 1.075T18 13.5M5 23V1h14v6h-2V6H7v12h10v-1h2v6z" />
                            </svg>
                            Address Book</a></li>
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
                            <input type="text" placeholder="Enter your last-name" value="<?php echo $row['lastname'] ?>" name="lastname" >
                        </div>
                       
                    </div>
                    <div class="detail-2">
                    <div class="email">
                            <p>Email</p>
                            <input type="text" placeholder="Enter your email" value="<?php echo $row['email'] ?>" name="email" >
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