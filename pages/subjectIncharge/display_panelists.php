<?php
    include('../../php/config.php');

    // Check if 'panel_id' is set in the URL
    if (isset($_SESSION['panel_id'])) {
        // Validate and sanitize the input to prevent SQL injection
        $session_id = $_GET['session_id'];
        $panel_id = $_SESSION['panel_id'];

        // Prepare and execute the SQL query
        $sql = "SELECT * FROM panelists WHERE id = (SELECT panelist_id FROM panel_panelist WHERE panel_id=$panel_id)";
        $result = $con->query($sql);


            if ($result) {
                echo "<table class='table'>";
                echo "<thead>";
                echo "<tr class='table table-secondary'><th scope='col'>Panelist ID</th><th scope='col'>Name</th></tr>";
                echo "</thead>";

                echo "<tbody>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p>No panelists found for this panel.</p>";
            }
            // unset($_SESSION['session_id']);
            // $stmt->close();
        } else {
            echo "<p>Failed to prepare the SQL statement.</p>";
        }
    // } else {
    //     echo "<p>'panel_id' not set in the URL.</p>";
    // }
    $con->close();
?>
