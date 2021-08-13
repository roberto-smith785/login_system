<?php
if(isset($_POST['submit'])){
    session_start();
    require_once "req/database.php";

    $account = $_POST['find_account'];

    if(empty($account) || empty($account)){
        $_SESSION['status_search_acc']="Field empty";
        header("location:reset_password.php");
        exit();
    }

    $sql = "SELECT * FROM signup WHERE (Email ='$account') OR (Contact='$account')";
    $result = mysqli_query($connect, $sql) or die("Error : ".mysqli_error($connect));
    $rows = mysqli_num_rows($result);
    if($rows==1){
         header("location:change_password.php?account={$account}");
    }else{
        $_SESSION['status_search_acc'] = "Account not found";
        header("location:reset_password.php");
        exit();
    }


}else{
    header("location:reset_password.php?invalid access");
}

?>