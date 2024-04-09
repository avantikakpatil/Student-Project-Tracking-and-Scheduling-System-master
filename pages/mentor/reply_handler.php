<?php
// Assuming you have a database connection in config.php
require('../../php/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipientEmail = $_POST['recipient'];  // Get the recipient's email from the form
    $replyContent = $_POST['replyContent'];  // Get the reply content from the form

    // Get the sender's user ID (replace 4 with the actual mentor's user ID)
    // $mentorUserId = 4; // Replace with your actual session management code
    $mentorUserId = $_SESSION['user_id'];

    // Fetch the sender's email
    $querySenderEmail = "SELECT email FROM users WHERE user_id = ?";
    $stmtSenderEmail = $con->prepare($querySenderEmail);
    $stmtSenderEmail->bind_param("i", $mentorUserId);

    if ($stmtSenderEmail->execute()) {
        $resultSenderEmail = $stmtSenderEmail->get_result();
        $rowSenderEmail = $resultSenderEmail->fetch_assoc();
        $senderEmail = $rowSenderEmail['email'];

        // Insert the mentor reply into the mentor_replies table
        $queryInsertReply = "INSERT INTO mentor_replies (sender_id, receiver_id, content) VALUES ((SELECT user_id FROM users WHERE email = ?), (SELECT user_id FROM users WHERE email = ?), ?)";
        $stmtInsertReply = $con->prepare($queryInsertReply);
        $stmtInsertReply->bind_param("sss", $senderEmail, $recipientEmail, $replyContent);

        if ($stmtInsertReply->execute()) {
            echo '<p>Reply sent successfully!</p>';
        } else {
            echo '<p>Error: ' . $stmtInsertReply->error . '</p>';
        }

        $stmtInsertReply->close();
    } else {
        echo '<p>Error fetching sender email.</p>';
    }

    $stmtSenderEmail->close();
    $con->close();
} else {
    echo '<p>Error: Invalid request method.</p>';
}
?>





