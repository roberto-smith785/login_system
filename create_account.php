<?php
if(isset($_POST['submit'])){
    session_start();
    require_once "req/database.php";

    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $pass_word = $_POST["password"];
    $confirmPassword = $_POST["confirm-password"];

    
    $password;

        $errors = array();

        if(!empty($email) || $email != ""){
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                array_push($errors,"Enter a valid email");
            }
        }else{
            $_SESSION['status'] = 'Fill email';
            array_push($errors,"Fill in email");
        }

        if(!empty($contact) || $contact !=""){
            if(preg_match('#[^0-9]#',$contact)){
                array_push($errors,"Enter a valid contact");
            }
        }else{
            array_push($errors,"Fill in contact");
        }

        if((!empty($pass_word) || $pass_word != "" )&& (!empty($confirmPassword) || $confirmPassword != "")){
            if($confirmPassword !== $pass_word){
                array_push($errors,"Password mismatch");
            }else{
                $password = MD5($pass_word);
            }
        }else{
            array_push($errors,"Fill in all password fields");
        }
        
        if(count($errors)>0){
            $_SESSION['status'] = $errors;
            header("location:sign_up.php");
            exit();
        }

    $sql = "SELECT * FROM signup WHERE (Email ='$email') OR (Contact ='$contact')";
    $result = mysqli_query($connect, $sql) or die("Error : ".mysqli_error($connect));
    $rows = mysqli_num_rows($result);
    echo "The result has ".$rows." rows";
    if($rows > 0){
        $_SESSION['status']='Account already exist';
        header("location:sign_up.php");
    }else if($rows ==0){

        $insertRecord = "INSERT INTO signUp(Email,Contact,Password) VALUES ('$email','$contact','$password')";

        if(!mysqli_query($connect,$insertRecord)){
            $_SESSION['status']= 'Error: '.mysqli_error($connect);
            header("location:sign_up.php");
            exit();
        }else{
            $_SESSION['status'] = 'Sign-up successful';
            header("location:login.php");
            exit();
        }
    }

}else{
    header("location:sign_up.php?invalid access");
}



?>