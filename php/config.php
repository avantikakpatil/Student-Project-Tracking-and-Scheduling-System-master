<?php
    $con = mysqli_connect("localhost:3308", "root", "", "sptss");
    
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>