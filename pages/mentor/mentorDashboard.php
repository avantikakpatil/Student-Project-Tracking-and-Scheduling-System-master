<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../css/mentor_notification.css">
    <script src='../../js/notifications.js'></script>
    <?php require('../../php/links.php'); ?>
    <title>MentorDashboard</title>
</head>
<body>

    <section>
        <div class="container-fluid">
            <div class="row">
                <?php include("../../components/mentorNavbar.php"); ?>
                <div class="col py-3 min-vh-100">
                    <?php
                        if(isset($_SESSION['success']) && $_SESSION['success'] == 1) {
                            echo '<div class="alert alert-warning alert-dismissible fade show col-md-4" role="alert">
                                Reply sent successfully!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                            unset($_SESSION['success']);
                        }
                    ?>
                    <div class="col text-end">
                        <i class="fa-regular fa-comment" id="notificationIcon"></i>
                        <div class="notification-panel" id="notificationPanel">
                            <span class="close-btn" onclick="closeNotificationPanel()">
                                <i class="fa-regular fa-circle-xmark"></i>
                            </span>
                            <?php
                            require('../../php/config.php');
                            $mentorUserId = $_SESSION['user_id'];

                            echo '<script>';
                            echo 'var showAllNotifications = false;';
                            echo '</script>';

                            $query = "SELECT messages.*, users.email AS sender_email
                                    FROM messages
                                    JOIN users ON messages.sender_id = users.user_id
                                    WHERE messages.receiver_id = ?
                                    ORDER BY messages.timestamp DESC
                                    LIMIT 3";

                            $stmt = $con->prepare($query);

                            if (!$stmt) {
                                echo "Prepare failed: (" . $con->errno . ") " . $con->error;
                            } else {
                                $stmt->bind_param("i", $mentorUserId);

                                if ($stmt->execute()) {
                                    $result = $stmt->get_result();

                                    while ($row = $result->fetch_assoc()) {
                                        echo '<div class="notification-message text-start">';
                                        echo '<strong>From: ' . $row["sender_email"] . '</strong><br>';
                                        echo '<strong>Content: ' . $row["content"] . '</strong><br>';
                                        echo 'Timestamp: ' . $row["timestamp"] . '</div>';
                                    }
                                } else {
                                    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                                }

                                $stmt->close();
                                $con->close();
                            }
                            ?>

                            <button class="view-all-btn" onclick="viewAllNotifications()">View All Notifications</button>
                        </div>
                    </div>

                    <!-- Grid of sessions -->
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        <?php include('display_sessions.php'); ?>
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

        function viewAllNotifications() {
            showAllNotifications = true;
            window.location.href = "all_notifications.php";
        }

        document.addEventListener('DOMContentLoaded', function () {
            if (!showAllNotifications) {
                var notifications = document.querySelectorAll('.notification-message');
                for (var i = 3; i < notifications.length; i++) {
                    notifications[i].style.display = 'none';
                }
            }
        });
    </script>
</body>
</html>