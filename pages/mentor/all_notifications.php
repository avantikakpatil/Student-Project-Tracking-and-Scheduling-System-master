<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/all_notification.css">
    <? include('../../php/links.php'); ?>
    <title>All Notifications</title>
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <?php include("../../components/mentorNavbar.php"); ?>
            <div class="col min-vh-100">
                <h1>All Notifications</h1>
                <div class="notification-panel">
                    <?php
                    // Include your database configuration file
                    require('../../php/config.php');

                    // Get the user ID of the mentor (replace 4 with the actual mentor's user ID)
                    $mentorUserId = $_SESSION['user_id']; // Replace with your actual session management code

                    // Fetch all messages sent to the mentor from the database
                    $query = "SELECT messages.*, users.email AS sender_email
                            FROM messages
                            JOIN users ON messages.sender_id = users.user_id
                            WHERE messages.receiver_id = ?
                            ORDER BY messages.timestamp DESC";

                    $stmt = $con->prepare($query);
                    $stmt->bind_param("i", $mentorUserId);

                    if ($stmt->execute()) {
                        $result = $stmt->get_result();

                        // Display all messages
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="notification-message">';
                            echo '<strong>From: ' . $row["sender_email"] . '</strong><br>';
                            echo '<strong>Content: ' . $row["content"] . '</strong><br>';
                            echo 'Timestamp: ' . $row["timestamp"];
                            
                            // Add a link to reply_page.php with the sender's email as a parameter
                            echo '<a href="reply_page.php?receiver=' . urlencode($row["sender_email"]) . '">Reply</a>';
                            
                            echo '</div>';
                        }
                    } else {
                        // Print any errors that occur during query execution
                        echo "<div class='alert alert-danger' role='alert'>
                                Error fetching messages.
                            </div>";
                    }

                    $stmt->close();
                    $con->close();
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

