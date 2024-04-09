<?php 
    include('../../php/config.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST['email'];
        $name = $_POST['name'];
        $phoneNo = $_POST['phoneNo'];
        $dept = $_POST['dept'];

        $sql = "INSERT INTO mentor(email, name, phone_no, dept) 
                VALUES ('$email','$name','$phoneNo','$dept')";

        if(mysqli_query($con, $sql)){
            echo "Insertion Successful";
            header("Location: subjectInchargeDashboard.php");
            exit;
        } else {
            echo "Error fetching session_id: " . $con->error;
        }
    }

    mysqli_close($con);
?>