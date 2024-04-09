<?php
include('../../php/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $date = $_POST["date"];
    $title = $_POST["title"];
    $project_id = isset($_GET['PROJECT_ID']) ? $_GET["PROJECT_ID"] : ""; 
    $link = $_POST["link"];

    $targetDir = "../../uploads/project_files/";
    
    $fileName = isset($_FILES["file"]["name"]) ? $title . "-" . $_FILES["file"]["name"] : "";
    $targetFilePath = $targetDir . $fileName;
    $tname = isset($_FILES["file"]["tmp_name"]) ? $_FILES["file"]["tmp_name"] : "";

    if (move_uploaded_file($tname, $targetFilePath)) {
        $sql = "INSERT INTO project_files (title, files, hyperlinks, project_id, date_added) 
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssi", $title, $targetFilePath, $link, $project_id, $date);

        if ($stmt->execute()) {
            header("Location:project_details.php?PROJECT_ID=$project_id&success=1");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error uploading the file.";
    }

    $con->close();
}
?>