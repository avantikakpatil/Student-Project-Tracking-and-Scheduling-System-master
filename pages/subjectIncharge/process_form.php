<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedProjects = $_POST['selectProjects'];
    $selectedPanelists = $_POST['selectPanelists'];

    session_start();

    if (isset($_SESSION['session_id'])) {
        $session_id = $_SESSION['session_id'];
        echo "Session ID: " . $session_id;
    } else {
        echo "Session ID not found in the session.";
        exit();
    }

    include('../../php/config.php');
    $user_id = $_SESSION['user_id'];
    $temp = "SELECT id FROM subjectIncharge WHERE user_id = $user_id";
    $res = $con->query($temp);

    if ($res && $res->num_rows > 0) {
        $row  = $res->fetch_assoc();
        $id = $row['id'];

        $insertQuery1 = "INSERT INTO panels (s_id, created_by) VALUES ('$session_id', '$id')";
        $res = $con->query($insertQuery1);

        if (!$res) {
            echo "Error: " . $con->error;
            exit();
        }

        $sql = "SELECT max(id) as max_id FROM panels WHERE s_id = $session_id";
        $result = $con->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $panel_id = $row['max_id'];
        } else {
            echo "Panel ID not found.";
            exit();
        }

        foreach ($selectedProjects as $projectId) {
            $insertQuery2 = "INSERT INTO panel_project (panel_id, project_id) VALUES ('$panel_id','$projectId')";
            $con->query($insertQuery2);
        }

        foreach ($selectedPanelists as $panelistId) {
            $insertQuery3 = "INSERT INTO project_panelist (project_id, panelist_id) VALUES ('$projectId', '$panelistId')";
            $con->query($insertQuery3);

            $insertQuery4 = "INSERT INTO panel_panelists (panel_id, panelist_id) VALUES ('$panel_id', '$panelistId')";
            $con->query($insertQuery4);
        }

        unset($_SESSION['session_id']);
        $con->close();
        // header('Location: display_panels.php?session_id='.$session_id);
    } else {
        echo "No rows found for the user_id in the subjectIncharge table.";
    }
}
?>