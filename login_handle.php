<?php
if(isset($_POST['submit'])){
    session_start();
    require_once "req/database.php";

    $userid = $_POST['username'];
    $pass_word = $_POST['password'];
    $errors = array();
    if(empty($userid)){
        array_push($errors,"Username empty");
    }
    if(empty($pass_word)){
        array_push($errors,"Password empty");
    }
    if(count($errors)>0){
        $_SESSION['status_login']= $errors;
        header("location:login.php");
        exit();
    }
    $encrypt = MD5($pass_word);
    $sql = "SELECT * FROM signup WHERE ((Email = '$userid') OR (Contact = '$userid')) AND (Password = '$encrypt')";
    $result = mysqli_query($connect,$sql);
    $rows = mysqli_num_rows($result);
    if($rows<=0){
        array_push($errors,"Login unsuccessful");
        $_SESSION['status_login']=$errors;
        header("location:login.php");
        exit();
    }else{
        echo "Login successful, username: {$userid} and password: {$pass_word}";
    }

}else{
    header("location:login.php?login unsuccessful");
}

?>