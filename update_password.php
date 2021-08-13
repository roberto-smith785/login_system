<?php
    if(isset($_POST["submit"])){
        session_start();

        $account = $_POST["account"];
        $pass = $_POST["password"];
        $confirm_pass = $_POST["confirm-password"];

        require_once "req/database.php";

        if(empty($pass) || empty($confirm_pass)){
            $_SESSION['status_reset'] = "Fill in all fields";
            header("location:change_password?account='$account'");
            exit();
        }else{
        
        if($pass == $confirm_pass){
            $encrypt = md5($pass);
            $sql = "UPDATE `signup` SET `Password` = '$encrypt' WHERE (`Email` = '$account' OR `Contact` = '$account')";
            if(!mysqli_query($connect,$sql)){
                $_SESSION['status_reset'] = "Failed to change password";
                header("location:reset_password.php");
                exit();
            }else{
                $_SESSION['status_reset'] = "Password changed successfully";
                header("location:login.php");
                exit();
            }
        }else{
            $_SESSION['status_reset'] = "Password mismatch";
            header("location:reset_password.php");
            exit();
        }
    }

    }else{
        header("location:login.php");
    }
?>