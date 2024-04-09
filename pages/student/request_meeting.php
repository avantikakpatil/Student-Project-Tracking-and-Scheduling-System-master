<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('../../php/links.php'); ?>
    <title>Request Meeting</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <?php include("../../components/studentNavbar.php"); ?>
            <div class="col py-3 min-vh-100">
                <h2>Request Meeting</h2>

                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    require('../../php/config.php');

                    $studentUserId = $_SESSION['user_id'];
                    $projectId = $_SESSION['PROJECT_ID'];

                    $sql = "SELECT mentor_id FROM projects WHERE PROJECT_ID = " . mysqli_real_escape_string($con, $projectId);

                    $mentorUserIdResult = $con->query($sql);

                    // Check if the query was successful
                    if ($mentorUserIdResult) {
                        // Fetch the result as an associative array
                        $mentorRow = $mentorUserIdResult->fetch_assoc();

                        // Check if the 'mentor_id' key exists in the result
                        if (isset($mentorRow['mentor_id'])) {
                            $mentorUserId = $mentorRow['mentor_id'];

                            // Get the meeting reason from the form
                            $meetingReason = $_POST['meetingReason'];

                            $query = "INSERT INTO messages (sender_id, receiver_id, content) VALUES (?, ?, ?)";
                            $stmt = $con->prepare($query);
                            $stmt->bind_param("iis", $studentUserId, $mentorUserId, $meetingReason);

                            if ($stmt->execute()) {
                                echo "<div class='alert alert-success' role='alert'>
                                        Meeting request submitted successfully!
                                    </div>";
                            } else {
                                echo "<div class='alert alert-danger' role='alert'>
                                        Error submitting meeting request.
                                    </div>";
                            }

                            $stmt->close();

                        } else {
                            echo "<div class='alert alert-danger' role='alert'>
                                    Error: mentor_id not found in the result.
                                </div>";
                        }

                        // Close the result set
                        $mentorUserIdResult->close();

                    } else {
                        echo "<div class='alert alert-danger' role='alert'>
                                Error executing mentor_id query:  . $con->error;
                            </div>";
                    }

                    $con->close();

                } else {
                    // Display form for meeting request
                    echo '<form action="request_meeting.php" method="post">
                            <div class="mb-4">
                                <label for="meetingReason" class="form-label">Meeting Reason:</label>
                                <textarea class="form-control" id="meetingReason" name="meetingReason" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>';
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>