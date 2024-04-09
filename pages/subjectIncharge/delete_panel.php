<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $panel_id_to_delete = $_GET['panel_id'];

    include('../../php/config.php');

    // Delete records from panel_project
    $deleteQuery1 = "DELETE FROM panel_project WHERE panel_id = $panel_id_to_delete";
    $con->query($deleteQuery1);

    // Delete records from project_panelist
    $deleteQuery2 = "DELETE FROM project_panelist WHERE project_id IN (SELECT project_id FROM panel_project WHERE panel_id = $panel_id_to_delete)";
    $con->query($deleteQuery2);

    // Delete records from panel_panelists
    $deleteQuery3 = "DELETE FROM panel_panelists WHERE panel_id = $panel_id_to_delete";
    $con->query($deleteQuery3);

    // Delete records from panels
    $deleteQuery4 = "DELETE FROM panels WHERE id = $panel_id_to_delete";
    $con->query($deleteQuery4);

    $con->close();
    header("Location: display_panels.php?session_id=".$_GET['session_id']);
// }
?>