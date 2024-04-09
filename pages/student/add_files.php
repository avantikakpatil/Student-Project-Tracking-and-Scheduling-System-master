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
            <?php include('../../components/studentNavbar.php'); ?>
            <div class="col min-vh-100 mt-3">
                <h2>Add Files and Hyperlinks</h2>
                <?php
                    if (isset($_GET['PROJECT_ID'])) {
                        $project_id = $_GET['PROJECT_ID'];
                        echo '<form action="insert_files.php?PROJECT_ID=' . $project_id . '" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="date">Date:</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" rows="3" required>
                            </div>
                            <div class="form-group">
                                <label for="file">Files:</label>
                                <input type="file" class="form-control" id="file" name="file">
                            </div>
                            <div class="form-group">
                                <label for="link">Hyperlinks:</label>
                                <input type="text" class="form-control" id="link" name="link">
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