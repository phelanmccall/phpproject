   <?php include_once("navbar.php"); ?>
   
   <h1><?php
        session_start();
        $_SESSION["username"] = $_POST["name"];
        echo $_SESSION["username"];

    ?></h1>