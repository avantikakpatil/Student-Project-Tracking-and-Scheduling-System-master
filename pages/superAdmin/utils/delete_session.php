<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $session_id_to_delete = $_GET['session_id'];

    include('../../../php/config.php');

    $deleteQuery = "DELETE FROM session WHERE id = $session_id_to_delete";
    $con->query($deleteQuery);

    $con->close();
    header("Location: ../superAdminDashboard.php?user_id".$_SESSION['user_id']);
// }
?>