<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Meeting Details</title>
    <?php require('../../php/links.php'); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <?php include('../../components/mentorNavbar.php'); ?>
            <div class="col mt-5">
                <h2>Add Meeting Details</h2>
                <?php
                    if (isset($_GET['PROJECT_ID'])) {
                        $project_id = $_GET['PROJECT_ID'];
                        echo '<form action="insert_meeting_details.php?PROJECT_ID=' . $project_id . '" method="post">
                            <div class="form-group">
                                <label for="date">Date:</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="form-group">
                                <label for="points_of_discussion">Points of Discussion:</label>
                                <textarea class="form-control" id="points_of_discussion" name="points_of_discussion" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="team_members_present">Team Members Present:</label>
                                <input type="text" class="form-control" id="team_members_present" name="team_members_present" required>
                            </div>
                            <div class="form-group">
                                <label for="implementation_status">Implementation Status:</label>
                                <input type="text" class="form-control" id="implementation_status" name="implementation_status" required>
                            </div>
                            <div class="form-group">
                                <label for="rating">Rating for Work Progress:</label>
                                <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
                            </div>
                            <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>';
                    } else {
                        echo "Error: PROJECT_ID not set.";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>