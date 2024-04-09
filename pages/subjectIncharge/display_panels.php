<?php 
    $_SESSION['session_id'] = $_GET['session_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('../../php/links.php'); ?>
    <title>Display Panels</title>
</head>
<body>
    
    <section>
        <div class="container-fluid">
            <div class="row">
                <?php include("../../components/subjectInchargeNavbar.php"); ?>
                <div class="col min-vh-100 py-3">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-outline-dark m-1" style='max-width: 8rem;'>
                                <a href="add_panel.php?session_id=<?php echo $_GET['session_id']; ?>" class='text-decoration-none text-reset'>Add Panel</a>
                            </button>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        <?php
                            include('../../php/config.php');

                            $user_id = $_SESSION['user_id'];
                            $session_id = $_GET['session_id'];
                            $query = "SELECT * from panels WHERE s_id = " . $session_id;
                            $result = $con->query($query);

                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    // $panel_id = $row['id'];
                                    // $_SESSION['panel_id'] = $panel_id;

                                    echo '<div class="col py-3">
                                    <div class="card border-dark mb-3" style="max-width: 18rem;">
                                        <div class="card-header"> Panel ID: ' . $row['id'] . '
                                            <a href="display_panel_details.php?session_id=' . $session_id . '&panel_id=' . $row['id'] . '" class="text-decoration-none text-reset mr-2">View Details</a>
                                            <a href="delete_panel.php?panel_id=' . $row['id'] . '&session_id=' . $session_id . '" class="text-decoration-none text-reset" onclick="return confirm(\'Are you sure you want to delete this panel?\')"><i class="fa-solid fa-trash float-end"></i></a>
                                        </div>
                                        <div class="card-body text-dark">';


                                    // include("display_panelists.php");
                                    $sql_panelists = "SELECT * FROM panelists WHERE id IN (SELECT panelist_id FROM panel_panelists WHERE panel_id = " . $row['id'] . ")";
                                    $result_panelists = $con->query($sql_panelists);

                                    if ($result_panelists && $result_panelists->num_rows > 0) {
                                        echo "<table class='table'>";
                                        echo "<thead>";
                                        echo "<tr class='table table-secondary'><th scope='col'>Panelist ID</th><th scope='col'>Name</th></tr>";
                                        echo "</thead>";

                                        echo "<tbody>";
                                        while ($row_panelists = $result_panelists->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row_panelists['id'] . "</td>";
                                            echo "<td>" . $row_panelists['name'] . "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</tbody>";
                                        echo "</table>";
                                    } else {
                                        echo "<p>No panelists found for this panel.</p>";
                                    }

                                    echo '</div>
                                        </a>
                                        </div>';
                                    echo '</div>';
                                }
                            } else {
                                echo "<div class='pt-3'><h6>No cards available.</h6></div>";
                            }
                            $con->close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>