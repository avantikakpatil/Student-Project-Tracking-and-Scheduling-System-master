<!-- meeting_request_handler.php -->
<?php
include('../../php/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = $_POST['project_id'];
    $student_id = $_SESSION['user_id'];  // You need to manage user sessions
    $message = $_POST['message'];

    // Insert the meeting request into the database
    $sql = "INSERT INTO messages (sender_id, receiver_id, message, meeting_id) 
            VALUES (?, (SELECT mentor_id FROM projects WHERE PROJECT_ID = ?), ?, ?)";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("iisi", $student_id, $project_id, $message, $project_id);

    if ($stmt->execute()) {
        // Redirect to the project details page with a success message
        header("Location: project_details.php?PROJECT_ID=$project_id&success=1");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
}
?>
