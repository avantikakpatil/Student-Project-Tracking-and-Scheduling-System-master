<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperAdminProjectOverview</title>
    <?php require('../../php/links.php'); ?>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <?php include("../../components/mentorNavbar.php"); ?>
            <div class="col py-3 min-vh-100">
            <?php
                if (isset($_GET['session_id'])) {
                    $session_id = intval($_GET['session_id']);
                    include('../../php/config.php');

                    $stmt = $con->prepare("SELECT title FROM session WHERE id = ?");
                    $stmt->bind_param("i", $session_id);
                    $stmt->execute();
                    $stmt->bind_result($title);
                    
                    // Fetch and display the title
                    if ($stmt->fetch()) {
                        echo "<h4>Title: $title </h4>";
                    } else {
                        echo "Session not found";
                    }

                    // Close connections
                    $stmt->close();
                    $con->close();
                }
                ?>
                <?php include("table_page.php");?>
            </div>
        </div>
    </div>
</body>
</html>