<? 
    $email = $_POST['email'];
    $password = $_POST['pass'];

    require_once "../Database/connect.php";

    $query= "select *FROM user WHERE email = '$email' AND pass = '$password' ";

    $result = $con->query($query);

    if($result ->num_rows == 1){
        //login success
        header("location: success.html");
        exit();
    }
    else{
        // login failed
        header("location: errorlogin.html");
        exit();
    }

?>