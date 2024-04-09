<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../css/student_notification.css">
    <link rel="stylesheet" href="../../css/mentor_notification.css">
    <?php require('../../php/links.php'); ?>
    <title>Student Dashboard</title>
</head>
<body>

    <section>
        <div class="container-fluid">
            <div class="row">
                <?php include("../../components/studentNavbar.php"); ?>
                <div class="col py-3 min-vh-100">
                <div class="col text-end">
                        <i class="fa-regular fa-comment" id="notificationIcon"></i>
                        <div class="notification-panel" id="notificationPanel">
                            <span class="close-btn" onclick="closeNotificationPanel()">
                                <i class="fa-regular fa-circle-xmark"></i>
                            </span>
                            <?php
                            require('../../php/config.php');
                            // Replace 1 with the actual student's user ID
                            $studentUserId = $_SESSION['user_id']; // Replace with your actual session management code

                            $queryMentorReplies = "SELECT mentor_responses.*, users.email AS mentor_email
                                                    FROM mentor_responses
                                                    JOIN users ON mentor_responses.sender_id = users.user_id
                                                    WHERE mentor_responses.receiver_id = ?
                                                    ORDER BY mentor_responses.timestamp DESC
                                                    LIMIT 3";
                            $stmtMentorReplies = $con->prepare($queryMentorReplies);
                            $stmtMentorReplies->bind_param("i", $studentUserId);

                            if ($stmtMentorReplies->execute()) {
                                $resultMentorReplies = $stmtMentorReplies->get_result();

                                while ($rowMentorReplies = $resultMentorReplies->fetch_assoc()) {
                                    echo '<div class="notification-message text-start">';
                                    echo '<strong>From: ' . $rowMentorReplies["mentor_email"] . '</strong><br>';
                                    echo 'Message: ' . $rowMentorReplies["content"] . '<br>';
                                    echo 'Timestamp: ' . $rowMentorReplies["timestamp"] . '</div>';
                                }
                            } else {
                                echo '<p>Error fetching mentor replies.</p>';
                            }

                            $stmtMentorReplies->close();
                            ?>

                            <!-- Add a link to view all notifications -->
                            <button class="view-all-btn text-start">
                                <a href="all_notifications.php" class="text-decoration-none text-reset">View All Notifications</a>
                            </button>
                        </div>

                    <div class="row row-cols-1 row-cols-md-4 g-4 text-start">
                        <?php
                            include("display_projects.php");
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var notificationPanel = document.getElementById("notificationPanel");

            document.getElementById("notificationIcon").addEventListener("click", function() {
                if (notificationPanel.style.display === "none" || notificationPanel.style.display === "") {
                    notificationPanel.style.display = "block";
                } else {
                    notificationPanel.style.display = "none";
                }
            });
        });

        function closeNotificationPanel() {
            var notificationPanel = document.getElementById("notificationPanel");
            notificationPanel.style.display = "none";
        }
    </script>
</body>
</html>