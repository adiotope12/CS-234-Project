<?php
session_start();
if (!((isset($_SESSION["username"]))&&(isset($_SESSION["password"])))){
    $_SESSION["username"] = "logged out";
    $_SESSION["password"] = "logged out";
    header("Location: index.html");
}
echo "$_SESSION[username] you have succesfully logged out of the system, Goodbye!</h1>";

$_SESSION= NULL;

session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = stylesheet href =Home.css>
    <title>Logout</title>
</head>
<body>
    
</body>
</html>