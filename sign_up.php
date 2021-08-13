<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>LOGIN SYSTEM | SIGN-UP</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="stylesheets/main.css" rel="stylesheet">
    </head>
    <body">
        
        <div class="form-container">
            <h2>Sign up</h2>
            <?php
                if(isset($_SESSION['status'])){
                    $errors = $_SESSION['status'];
                    for($i=0;$i<count($errors);$i++){
                        echo"<li style='list-style-type:none; color:red'>".$errors[$i]."</li>";
                    }
                    unset($_SESSION['status']);
                }
            ?>
            <form class="sign_up-form" action="create_account.php" method="post">
            <div class="inputEmail">
                <input type="email" name="email" id="email" placeholder="Email" required autofocus/>
            </div>
            <span id="reply-email" ></span>
            <div class="inputContact">
                <input type="text" name="contact" id="contact" placeholder="Contact" required />
            </div>
            <span id="reply-contact"></span>
            <div class="inputPassword">
                <input type="password" name="password" id="password" placeholder="Password" max-length="10" min-length="10" />
            </div>
            <span id="reply-password"></span>
            <div class="inputConfirmPassword">
            <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm Password" limit="10" />
            </div>
            <span id="reply-confirm-password"></span>
            <div class="link-text login">
                <a href="login.php">Have an account ?</a>
            </div>
            <div class="form-btn btn-submit">
                <button type="submit" name="submit" id="submit">Sign up</button>
            </div>
            </form>
        </div>
    </body>
   <script src="scripts/sign_up.js" async></script>
</html>