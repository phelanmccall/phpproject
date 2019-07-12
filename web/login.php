<?php
        session_start();
        $_SESSION["username"] = $_POST["name"];
        echo $_SESSION["username"];
        header("Location: {$_SERVER["HTTP_REFERER"]}");
    ?>