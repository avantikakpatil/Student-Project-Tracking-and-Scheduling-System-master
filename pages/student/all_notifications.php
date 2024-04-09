<!-- all_notifications.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Notifications</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .notification-panel {
            margin-top: 20px;
        }

        .notification-message {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .notification-message strong {
            font-weight: bold;
            color: #333;
        }

        .notification-message a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        .notification-message a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h1>All Notifications</h1>

<!-- Display all notifications -->
<div class="notification-panel">
    <?php
    // Include your database configuration file
    require('../../php/config.php');

    // Replace 1 with the actual student's user ID
    $studentUserId = 1; // Replace with your actual session management code

    // Fetch all mentor replies for the student
    $queryAllMentorReplies = "SELECT mentor_replies.*, users.email AS mentor_email
                                FROM mentor_replies
                                JOIN users ON mentor_replies.sender_id = users.user_id
                                WHERE mentor_replies.receiver_id = ?
                                ORDER BY mentor_replies.timestamp DESC";
    $stmtAllMentorReplies = $con->prepare($queryAllMentorReplies);
    $stmtAllMentorReplies->bind_param("i", $studentUserId);

    if ($stmtAllMentorReplies->execute()) {
        $resultAllMentorReplies = $stmtAllMentorReplies->get_result();

        while ($rowAllMentorReplies = $resultAllMentorReplies->fetch_assoc()) {
            echo '<div class="notification-message">';
            echo '<strong>From: ' . $rowAllMentorReplies["mentor_email"] . '</strong><br>';
            echo 'Message: ' . $rowAllMentorReplies["content"] . '<br>';
            echo 'Timestamp: ' . $rowAllMentorReplies["timestamp"] . '</div>';
        }
    } else {
        echo '<p>Error fetching all mentor replies.</p>';
    }

    $stmtAllMentorReplies->close();
    ?>
</div>

</body>
</html>

