<?php
    include('../../php/config.php');

    $user_id = $_SESSION['user_id'];

    $sql = "SELECT * FROM projects WHERE PROJECT_ID IN 
            (SELECT project_id FROM project_panelist WHERE panelist_id = (
            SELECT id FROM panelists WHERE user_id = $user_id))";
    $result = $con->query($sql);

    if (!$result) {
        echo "Error: " . $con->error;
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col">
                    <a href="project_evaluation_sheet.php?PROJECT_ID=' . $row['PROJECT_ID'] . '" class="text-decoration-none text-reset">
                    <div class="card border-dark mb-3" style="max-width: 18rem;">
                        <div class="card-header">Team Lead:<br><strong>' . $row['TEAM_LEADER'] . '</strong></div>
                        <div class="card-body text-dark">
                            <h5 class="card-title">' . $row['PROJECT_TITLE'] . '</h5>
                        </div>
                    </div>
                </div>';
            }

            $result->free_result();
        } else {
            echo "No records found.";
        }
    }

    $con->close();
?>