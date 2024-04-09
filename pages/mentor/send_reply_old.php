<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('../../php/config.php');

    $recipientEmail = $_POST['recipient'];
    $replyContent = $_POST['replyContent'];

    // Check if replyContent is not empty
    if (!empty($replyContent)) {
        session_start();
        $mentorUserId = $_SESSION['user_id'];

        $queryMentorEmail = "SELECT email FROM users WHERE user_id = ?";
        $stmtMentorEmail = $con->prepare($queryMentorEmail);
        $stmtMentorEmail->bind_param("i", $mentorUserId);

        if ($stmtMentorEmail->execute()) {
            $resultMentorEmail = $stmtMentorEmail->get_result();
            $rowMentorEmail = $resultMentorEmail->fetch_assoc();
            $mentorEmail = $rowMentorEmail['email'];

            $queryInsertReply = "INSERT INTO mentor_responses (sender_id, receiver_id, content) VALUES ((SELECT user_id FROM users WHERE email = ?), (SELECT user_id FROM users WHERE email = ?), ?)";
            $stmtInsertReply = $con->prepare($queryInsertReply);

            if ($stmtInsertReply) {
                $stmtInsertReply->bind_param("sss", $mentorEmail, $recipientEmail, $replyContent);

                try {
                    $stmtInsertReply->execute();
                    echo '<p>Reply sent successfully!</p>';
                } catch (mysqli_sql_exception $e) {
                    echo '<p>Error sending the reply. ' . $e->getMessage() . '</p>';
                }

                $stmtInsertReply->close();
            } else {
                echo '<p>Error preparing insert reply statement.</p>';
            }
        } else {
            echo '<p>Error fetching mentor email.</p>';
        }

        $stmtMentorEmail->close();
    } else {
        echo '<p>Error: Reply content cannot be empty.</p>';
    }

    $con->close();
} else {
    echo '<p>Error: Invalid request method.</p>';
}
?>