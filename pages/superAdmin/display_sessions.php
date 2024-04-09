<?php
    include('../../php/config.php');

    $sql = "SELECT * FROM session ORDER BY id DESC";
    $result = $con->query($sql);

    $row = 0;

    if ($result->num_rows > 0) {
        while ($row !== false && $row = $result->fetch_assoc()) {
            $session_id = $row['id']; 
            echo '<div class="col">
                <a href="superAdminProjectOverview.php?session_id=' . $session_id . '" class="text-decoration-none text-reset">
                <div class="card border-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">' . $row['title'] . ' 
                    <a href="utils/delete_session.php?session_id=' . $session_id . '" class="text-decoration-none text-reset" onclick="return confirm(\'Are you sure you want to delete this panel?\')">
                        <i class="fa-solid fa-trash float-end"></i>
                    </a>
                    <a href="edit_session.php?session_id='. $session_id .'">
                        <i class="fa-regular fa-pen-to-square float-end me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i>
                    </a>
                </div>
                <div class="card-body text-dark">
                  <h5 class="card-title">' . $row['branch'] . '</h5>
                  <p class="card-text">' . $row['semester'] . '</p>
                </div>
                </a>
                </div>';
            echo '</div>';
        }
    } else {
        echo "No cards available.";
    }
    
    echo '</div>';

    $con->close();
?>