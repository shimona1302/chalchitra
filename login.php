<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/Account.php");

$account = new Account($conn);

    if(isset($_POST["submitButton"])) {
       

            
            $username = FormSanitizer::sanitizeFormString($_POST["username"]);
            $password = FormSanitizer::sanitizeFormString($_POST["password"]);
            
            $success = $account->login( $username,  $password,);
           
           if($success) {
               $_SESSION["userLoggedIn"] = $username;
               header("Location: index.html");
         
    }
        }
    function getInputValue($name) {
        if(isset($_POST[$name])){
            echo $_POST[$name];
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <title> Welcome to Chalchitra </title>
    <link rel="stylesheet" type="text/css" href="assets/style/style.css" />
</head>
        <body>
        <center> 
    <div class="signInContainer">

    <div class="column">

        <div class="header">
        <img src="assets/images/logo.png" title="Logo" alt="Site logo" />
            <h3> Sign In </h3>
            <!-- <span> to continue to Chalchitra </span> -->
            
        </div>
        <form method="POST">

        <?php echo $account->getError(Constants::$loginFailed); ?>
            <input type="text" name="username" placeholder="username" value="<?php getInputValue("username"); ?>" required>
 
            <input type="password" name="password" placeholder="password" required>
        
            <div class="submitBtn">
            <input type="submit" name="submitButton" value="SUBMIT">
            </div>
        </form>

        
        <a href="register.php" class="signInMessage"> Don't have an account? Sign up here!</a> 


    </div>

</div>
</center> 
</body>
    </html>