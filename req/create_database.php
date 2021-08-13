<?php
    $connect = mysqli_connect("localhost","root","");
    if(!$connect){
        die("Error connecting to server: ".mysqli_connect_error());
    }

    $select_db = mysqli_select_db($connect,"loginsystem");
    if(!$select_db){
        $create_db = "CREATE DATABASE loginsystem;";
        if(!mysqli_query($connect,$create_db)){
            die("Database creation failed: ".mysqli_error($connect));
        }else{
            $use_database = mysqli_select_db($connect,"loginsystem");
            if(!$use_database){
                die("Failed to select database: ".mysqli_error($connect));
            }else{
                $create_table = "CREATE TABLE IF NOT EXISTS signup(
                    ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    Email VARCHAR(100) NOT NULL,
                    Contact varchar(50) NOT NULL,
                    Password varchar(50) NOT NULL
                );";

                if(!mysqli_query($connect,$create_table)){
                    die("Error creating table: ".mysqli_error($connect));
                }else{
                    header("location:../login.php");
                }
            }
        }
    }else{
        die("Database already exist");
    }
?>