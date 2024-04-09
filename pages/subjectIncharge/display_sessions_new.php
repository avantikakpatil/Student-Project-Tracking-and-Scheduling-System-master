<?php
include('../../php/config.php');

// Define the sorting criteria (you can customize this)
$sortingCriteria = isset($_GET['sort']) ? $_GET['sort'] : 'title';

// Validate the sorting criteria to prevent SQL injection
$allowedSortingCriteria = ['title', 'branch', 'semester', 'academic_year'];
if (!in_array($sortingCriteria, $allowedSortingCriteria)) {
    // Use a default sorting criteria if an invalid one is provided
    $sortingCriteria = 'title';
}

// SQL query with ORDER BY clause based on the chosen sorting criteria
$sql = "SELECT * FROM session ORDER BY $sortingCriteria";
$result = $con->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        echo '<div class="row">';

        while ($row = $result->fetch_assoc()) {
            $session_id = $row['id'];
            echo '<div class="col">
                    <a href="superAdminProjectOverview.php?session_id=' . $session_id . '" class="text-decoration-none text-reset">
                        <div class="card border-dark mb-3" style="max-width: 18rem;">
                            <div class="card-header">' . $row['title'] . '</div>
                            <div class="card-body text-dark">
                                <h5 class="card-title">' . $row['branch'] . '</h5>
                                <p class="card-text">' . $row['semester'] . '</p>
                            </div>
                        </div>
                    </a>
                  </div>';
        }

        echo '</div>';
    } else {
        echo "No cards available.";
    }
    $result->close();
} else {
    echo "Error executing the query: " . $con->error;
}

$con->close();
?>
