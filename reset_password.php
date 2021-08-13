<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>LOGIN SYSTEM | RESET PASSWORD</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="stylesheets/main.css" rel="stylesheet">
    </head>
    <body>

        <div class="form-container">
            <h2>Reset Password</h2>
            <?php
                if(isset($_SESSION['status_reset'])){
                    echo"<li style='list-style-type:none; color:red'>".$_SESSION['status_reset']."</li>";
                    unset($_SESSION['status_reset']);
                }else if(isset($_SESSION['status_search_acc'])){
                    echo"<li style='list-style-type:none; color:red'>".$_SESSION['status_search_acc']."</li>";
                    unset($_SESSION['status_search_acc']);
                }
            ?>
            <form class="reset-form" action="recover_acc.php" method="POST">
                <div class="inputText">
                <input type="text" name="find_account" id="find_account" placeholder="email/contact" autofocus required />
                </div>
                <div class="link-text login">
                    <a href="login.php">Login instead?</a>
                </div>
                <div class="link-text signUp">
                    <a href="sign_up.php">Don't have an account?</a>
                </div>
                <div class="form-btn btn-reset">
                    <button name="submit" type="submit">Search</button>
                </div>    
            </form>
        </div>
    
    </body>
</html>