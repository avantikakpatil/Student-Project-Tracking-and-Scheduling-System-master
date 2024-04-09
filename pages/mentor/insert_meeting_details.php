<?php
    include('../../php/config.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $date = $_POST['date'];
        $points_of_discussion = $_POST['points_of_discussion'];
        $team_members_present = $_POST['team_members_present'];
        $implementation_status = $_POST['implementation_status'];
        $rating = $_POST['rating'];
        $project_id = isset($_GET['PROJECT_ID']) ? $_GET['PROJECT_ID'] : null;

        $stmt = $con->prepare("INSERT INTO meeting_details (date_column, points_of_discussion, team_members_present, implementation_status, rating, project_id) 
            VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $date, $points_of_discussion, $team_members_present, $implementation_status, $rating, $project_id);

        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $con->close();
?>