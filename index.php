<?php
    require_once("includes/config.php");

    if(!isset($_SESSION["userLoggedIn"])){
        header("Location: register.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Chalchitra</title>
    <style>
        body{
            background-color: linen;
        }
        </style>
</head>
<body>
<a href="index.html"> Click here to enter to CHALCHITRA
 </a>
</body>
</html>

