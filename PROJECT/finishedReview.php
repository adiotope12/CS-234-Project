<?php
function checkName($name){
    global $pdo;

    $sql = "SELECT realname FROM Reviews WHERE realname = ? ";

    $statement = $pdo->prepare($sql);
    $statement->execute([$name]);

    if ((strlen($name)>20)||($name == $statement->fetch()["realname"])){
        echo"<h2>This name has already submitted a review or is too long</h2>";
        return false;
    } else {
        return true;
    }
}

function checkUsername($username){
    global $pdo;

    $sql = "SELECT username FROM Reviews WHERE username = ? ";

    $statement = $pdo->prepare($sql);
    $statement->execute([$username]);

    if (($username == $statement->fetch()["username"])){
        echo"<h2>You have already made a review</h2>";
        return false;
    } else {
        return true;
    }
}
session_start();

$username = $_SESSION["username"];
$name = $_POST["name"];
$stars = $_POST["stars"];
$review = $_POST["review"];

$pdo = new PDO("mysql:host=localhost:8889;dbname=project","root","root");

if(!((checkName($name))&&(checkUsername($username)))){
    require ("review.php");
    
    
} else{
    $sql = "INSERT IGNORE INTO Reviews(username,realname,stars,review) VALUES(?,?,?,?)";

    $statement = $pdo->prepare($sql);
    $statement->execute([$username,$name,$stars,$review]);

    echo "Thank you for your review!";
    require ("review.php");

}


?>