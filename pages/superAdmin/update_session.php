<?php
    session_start();
    include('../../php/config.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $session_id = $_POST["session_id"];
        $title = $_POST["title"];
        $branch = $_POST["branch"];
        $semester = $_POST["sem"];
        $section = $_POST["sec"];
        $date_of_creation = $_POST["date"];

        // Check if a new CSV file is provided
        if ($_FILES["file"]["size"] > 0) {
            $targetDir = "../../uploads/csv_files/";
            $fileName = $title . "-" . $_FILES["file"]["name"];
            $csvFilePath = $targetDir . $fileName;
            $tname = $_FILES["file"]["tmp_name"];

            // Move the uploaded file
            if (!move_uploaded_file($tname, $csvFilePath)) {
                echo "Error uploading the file.";
                exit();
            }
        } else {
            // No new CSV file provided, keep the existing file path
            $csvFilePath = $_POST["existing_csv_path"];
        }

        // Update session details in the database
        $sql = "UPDATE session SET title=?, branch=?, semester=?, section=?, date_of_creation=?, csv=? WHERE id=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssssi", $title, $branch, $semester, $section, $date_of_creation, $csvFilePath, $session_id);

        if ($stmt->execute()) {
            // Update the projects or any other related data here if needed
            $user_id = $_SESSION["user_id"];
            header("Location: superAdminDashboard.php?user_id=$user_id");
        } else {
            echo "Error updating session: " . $con->error;
        }

        $stmt->close();
        $con->close();
    }
?>