<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('../../php/config.php');

    $recipientEmail = $_POST['recipient'];
    // echo $recipientEmail;
    $replyContent = $_POST['replyContent'];

    if (!empty($replyContent)) {
        session_start();
        $mentorUserId = $_SESSION['user_id'];

        $queryMentorEmail = "SELECT email FROM users WHERE user_id = $mentorUserId";
        $result = $con->query($queryMentorEmail);

        if ($result) {
            $row = $result->fetch_assoc();
            $MentorEmail = $row['email']; 
            // echo "Mentor's Email: $MentorEmail";
        } else {
            echo "Error: " . $con->error;
        }
        $result->free_result(); 

        $querySender = "SELECT user_id FROM users WHERE email = '$MentorEmail'";
        $res1 = $con->query($querySender);
        if($res1){
            $r1 = $res1->fetch_assoc();
            $sender = $r1['user_id'];
            // echo $sender;
        }
        $res1->free_result();

        $queryReceiver = "SELECT user_id FROM users WHERE email = '$recipientEmail'";
        $res2 = $con->query($queryReceiver);
        if($res2){
            $r2 = $res2->fetch_assoc();
            $receiver = $r2['user_id'];
            // echo $receiver;
        }
        $res2->free_result();

        $insertQuery = "INSERT INTO mentor_responses (sender_id, receiver_id, content) VALUES (?, ?, ?)";
        $stmt = $con->prepare($insertQuery);
        $stmt->bind_param("sss", $sender, $receiver, $replyContent);
        $stmt->execute();
        $stmt->close();

        if($stmt){
            header("Location: mentorDashboard.php?user_id=".$_SESSION['user_id']);
        }
    }
    session_start();
    $_SESSION['success'] = 2;
    $con->close();
} else {
    echo '<p>Error: Invalid request method.</p>';
}
?>