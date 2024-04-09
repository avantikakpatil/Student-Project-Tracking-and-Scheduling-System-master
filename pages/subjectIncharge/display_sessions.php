<?php
    include('../../php/config.php');

    $user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;
    $query = "SELECT id from subjectincharge WHERE user_id = " . $user_id;
    $s = $con->prepare($query);
    $s->execute();
    $subIn_id_result = $s->get_result();
    $subIn_id_row = $subIn_id_result->fetch_assoc();
    $subIn_id = $subIn_id_row['id'];

    $sql = "SELECT * FROM session WHERE s_Incharge_Id = $subIn_id ORDER BY id DESC";
    $result = $con->query($sql);

    $row = 0;

    if ($result->num_rows > 0) {
        while ($row !== false && $row = $result->fetch_assoc()) {
            $session_id = $row['id'];
            echo '<div class="col">
                <a href="subjectInchargeProjectOverview.php?session_id=' . $session_id . '" class="text-decoration-none text-reset">
                <div class="card border-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">' . $row['title'] . '</div>
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