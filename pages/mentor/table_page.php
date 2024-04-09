<?php
    include('../../php/config.php');

    if (isset($_GET['session_id'])) {
        $session_id = $_GET['session_id'];

        // Query the database to retrieve the data for the given session_id
        $sql = "SELECT * FROM projects WHERE SESSION_ID = " . $session_id;
        $result = $con->query($sql);

        // Display the data in a table
        if ($result->num_rows > 0) {
            echo "<table class='table table-hover'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col'>Project Title</th>";
            echo "<th scope='col'>Team Leader</th>";
            echo "<th scope='col'>Domain</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($row = $result->fetch_assoc()) {
                $project_id = $row['PROJECT_ID'];
                echo "<tr>";
                echo "<td><a href='project_details.php?PROJECT_ID=$project_id' class='text-decoration-none text-reset'>" . $row['PROJECT_TITLE'] . "</a></td>";
                echo "<td><a href='project_details.php?PROJECT_ID=$project_id' class='text-decoration-none text-reset'>" . $row['TEAM_LEADER'] . "</a></td>";
                echo "<td><a href='project_details.php?PROJECT_ID=$project_id' class='text-decoration-none text-reset'>" . $row['DOMAIN'] . "</a></td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "No data available for this session.";
        }
    }

$con->close();
?>