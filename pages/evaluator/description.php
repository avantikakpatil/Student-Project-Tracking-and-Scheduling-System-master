<?php
    include('../../php/config.php');

    $sql = "SELECT DESCRIPTION FROM projects WHERE PROJECT_ID = " . $project_id;
    $result = $con->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        echo $row['DESCRIPTION'];
    } else {
        echo "Error: " . $con->error;
    }

    $con->close();
?>