<?

// start session
session_start();



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "connect.php";

    $email = $password = $role = "";

    $email = trim($_POST["email"]);
    $password = trim($_POST["pass"]);
    $role = $_POST["role"];

    // select statement
    $sql = "select user_id, email, password, role FROM user WHERE email = ? and role = ?";

    // 
    if ($stmp = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_password);

        $param_email = $email;
        $param_password = $password;

        if (mysqli_stmt_execute($stmt)) {
            // Store result
            mysqli_stmt_store_result($stmt);

            // Check if username exists, if yes then verify password
            if (mysqli_stmt_num_rows($stmt) == 1) {
                // Bind result variables
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $role);

                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {
                        // Password is correct, start a new session
                        session_start();
                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["email"] = $email;
                        $_SESSION["role"] = $role;

                        // Redirect user to their respective page
                        switch ($role) {
                            case 'buyer':
                                header("location: landingpage.php");
                                break;
                            case 'seller':
                                header("location: ../seller/dashboard.php");
                                break;
                            case 'admin':
                                header("location: ../admin/dashboard.php");
                                break;
                            default:
                                // Invalid role
                                header("location: index.php");
                                break;
                        }
                    }
                    else{
                        echo "invalid password";
                    }
                }
            }else{
                echo "email not found";
            }
        }
        else{
            echo "Oops! Something went wrong. Please try again later.";
        }
         // Close statement
         mysqli_stmt_close($stmt);
    }
        
    // Close connection
    mysqli_close($link);
}
