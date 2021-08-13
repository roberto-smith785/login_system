<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>LOGIN SYSTEM | LOGIN</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="stylesheets/main.css" rel="stylesheet">
</head>

<body>
    
    <div class="form-container">
        <h2>Login</h2>
        <?php
            if(isset($_SESSION['status'])){
                echo"<li style='list-style-type:none; color:green'>".$_SESSION['status']."</li>";
                unset($_SESSION['status']);
            }else if(isset($_SESSION['status_reset'])){
                echo"<li style='list-style-type:none; color:green'>".$_SESSION['status_reset']."</li>";
                unset($_SESSION['status_reset']);
            }else if(isset($_SESSION['status_login'])){
                $errors = $_SESSION['status_login'];
                    for($i=0;$i<count($errors);$i++){
                        echo"<li style='list-style-type:none; color:red'>".$errors[$i]."</li>";
                    }
                    unset($_SESSION['status_login']);
            }
        ?>
        <form class="login-form" action="login_handle.php" method="post">
            <!-- future feature
            <div class="inputSelect">
                <label for="user-type">Login as</label>
                <select name="user-type" id="user-type">
                    <option value="Admin">Admin</option>
                    <option value="Student">Student</option>
                    <option value="Staff">Staff</option>
                </select>
            </div>
        -->
            <div class="inputText">
                <input type="text" name="username" id="username" placeholder="Username" autofocus required>
            </div>
            <div class="inputPassword">
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="link-text forgetPass">
                <a href="reset_password.php">Forget password?</a>
            </div>
            <div class="link-text signUp">
                <a href="sign_up.php">Don't have an account?</a>
            </div>
            <div class="form-btn btn-login">
                <button name="submit" type="submit" id="submit">Login</button>
            </div>
        </form>
    </div>
    <script src="scripts/login.js" async></script>
</body>

</html>