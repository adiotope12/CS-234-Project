<?php
session_start();
$_POST = NULL;
if (!($_SESSION["username"]=="logged out")){
    echo "<h2>Welcome to my website $_SESSION[username]!</h2>";
} else {
    header("Location: index.html");
    exit();
}

if (!((isset($_SESSION["username"]))&&(isset($_SESSION["password"])))){
    $_SESSION["username"] = "logged out";
    $_SESSION["password"] = "logged out";
    header("Location: index.html");
    
}

if($_SESSION['status']==1){
    echo "<a href = 'admin.php'><button>Admin</button></a><br>";
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel= stylesheet href ="Home.css">
        <title>Home</title>
    </head>
    <body>

        <header>
            <h1>Tope Adio</h1>
        </header><br>
        <main>
            <div id = maindiv>
                <img src="IMG_1778.JPG" rel="picture of me" >
                <p id=bio>Hello, welcome to my website. My name is Tope Adio and I am an aspiring software developer.
                    The purpose of this website will be to showcase the projects i've worked on and to help you get to learn a little more about me.
                </p>

            </div>
            <div id = buttons>
                <a href = "mailto:adio.tope12@gmail.com"><button>Contact Me</button></a><br>
                <a href = "review.php"><button>Reviews</button></a><br>
                <a href = "logout.php"><button>Log Out</button></a><br>
            </div>
        </main>
        <footer id =homeFooter>
            2023 &copy; Tope Adio
        </footer>
    </body>
</html>