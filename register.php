<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/Account.php");

    $account = new Account($conn);

    if(isset($_POST["submitButton"])) {

         $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
         $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
         $username = FormSanitizer::sanitizeFormString($_POST["username"]);
         $email = FormSanitizer::sanitizeFormString($_POST["email"]);
         $email2 = FormSanitizer::sanitizeFormString($_POST["email2"]);
         $password = FormSanitizer::sanitizeFormString($_POST["password"]);
         $password2 = FormSanitizer::sanitizeFormString($_POST["password2"]);
         
         $success = $account->register($firstName, $lastName, $username, $email, $email2, $password, $password2);
        
        if($success) {
            $_SESSION["userLoggedIn"] = $username;
            header("Location: index.php");
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
            <h3> Sign Up </h3>
            <!-- <span> to continue to Chalchitra </span> -->
            
        </div>
        <form method="POST">

            <?php echo $account->getError(Constants::$firstNameCharacters); ?>
            <input type="text" name="firstName" placeholder="firstname" value="<?php getInputValue("firstName"); ?>"required>

            <?php echo $account->getError(Constants::$lastNameCharacters); ?>
            <input type="text" name="lastName" placeholder="lastname" value="<?php getInputValue("lastName"); ?>" required>
            
            <?php echo $account->getError(Constants::$usernameCharacters); ?>
            <?php echo $account->getError(Constants::$usernameTaken); ?>
            <input type="text" name="username" placeholder="username" value="<?php getInputValue("username"); ?>" required>
           
            <?php echo $account->getError(Constants::$emailsDontMatch); ?>
            <?php echo $account->getError(Constants::$emailInvalid); ?>
            <?php echo $account->getError(Constants::$emailTaken); ?>
            <input type="email" name="email" placeholder="email" value="<?php getInputValue("email"); ?>"required>

            <input type="email" name="email2" placeholder="Confirm email" value="<?php getInputValue("email2"); ?>"required>
        
            <?php echo $account->getError(Constants::$passwordsDontMatch); ?>
            <?php echo $account->getError(Constants::$passwordLength); ?>
            <input type="password" name="password" placeholder="password" required>
        
            <input type="password" name="password2" placeholder="Confirm password" required>

            <div class="submitBtn">
            <input type="submit" name="submitButton" value="SUBMIT">
</div>
        </form>

        <a href="login.php" class="signInMessage"> Already have an account? Sign in here!</a>

    </div>

</div>
</center>
</body>
    </html>