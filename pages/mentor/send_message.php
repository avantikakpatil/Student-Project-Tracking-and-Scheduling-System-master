<?php
// send_message.php

include('../../php/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_SESSION['user_id'];
    $mentor_id = getAssignedMentorId($student_id);
    $message_content = $_POST['messageContent'];

    $sql = "INSERT INTO messages (sender_id, receiver_id, content) VALUES (?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("iis", $student_id, $mentor_id, $message_content);

    if ($stmt->execute()) {
        // Redirect back to student dashboard with a success message
        header("Location: studentDashboard.php?success=1");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
}

function getAssignedMentorId($student_id) {
    // Implement the logic to get the assigned mentor ID based on the student ID
    // Replace this with your actual implementation.
    return 1; // Replace with the actual mentor ID
}
?>
