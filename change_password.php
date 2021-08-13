<?php
    session_start();
   if(isset($_GET["account"])){
       $account = $_GET["account"];
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN SYSTEM | CHANGE PASSWORD</title>
    <link href="stylesheets/main.css" rel="stylesheet">
</head>
<body>
<div class="form-container">
            <h2>Change Password</h2>
            <?php
                if(isset($_SESSION['status_reset'])){
                        echo"<li style='list-style-type:none; color:red'>".$_SESSION['status_reset']."</li>";
                    unset($_SESSION['status_reset']);
                }
            ?>
            <form class="sign_up-form" action="update_password.php" method="post">
            <div class="account">
                <input type="text" name="account" id="account" value= "<?php echo $account; ?>" />
            </div>
            <div class="inputPassword">
                <input type="password" name="password" id="password" placeholder="Enter new password" min-length="10" autofocus required />
            </div>
            <span id="reply-password"></span>
            <div class="inputConfirmPassword">
            <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm Password" limit="10" required/>
            </div>
            <span id="reply-confirm-password"></span>
            <div class="link-text login">
                <a href="login.php">Login instead ?</a>
            </div>
            <div class="form-btn btn-submit">
                <button type="submit" name="submit" id="submit">Submit</button>
            </div>
            </form>
        </div>
    <script src="scripts/change_password.js" async></script>
</body>
</html>