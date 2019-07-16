<?php 
    session_start();
    $cleardb_url      = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $cleardb_server   = $cleardb_url["host"];
    $cleardb_username = $cleardb_url["user"];
    $cleardb_password = $cleardb_url["pass"];
    $cleardb_db       = substr($cleardb_url["path"],1);
    $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
    if (!$conn) {
		  die("Error connecting to database: " . mysqli_connect_error());
    }
    
    $sql = "CREATE TABLE `data` (
      `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
      `title` varchar(255) NOT NULL
      )";
    if(mysqli_query($conn, $sql)){
      echo 'Table created.';
    }else{
      echo "ERROR: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>