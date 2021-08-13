<?php
$connect = mysqli_connect("localhost","root","","loginsystem");

if(!$connect){
    die("Database connection faild: ".mysqli_connect_error());
}

?>