<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Session Table</title>
    <?php require('../../php/links.php'); ?>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
        <?php include("../../components/superAdminNavbar.php");?>
            <div class="col min-vh-100 py-3">
            <h2>Edit Session</h2>
                <form method="post" action="update_session.php" enctype="multipart/form-data">
                    <?php
                    include('../../php/config.php');

                    // Assuming you have the session_id available
                    $session_id = $_GET['session_id'];

                    // Fetch session details for the given session_id
                    $session_query = "SELECT * FROM session WHERE id = ?";
                    $stmt = $con->prepare($session_query);
                    $stmt->bind_param("i", $session_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $session = $result->fetch_assoc();

                    if ($session) {
                        ?>
                        <div class="mb-3 col-md-4">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $session['title']; ?>" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="branch" class="form-label">Branch</label>
                            <input type="text" class="form-control" id="branch" name="branch" value="<?php echo $session['branch']; ?>" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="sem" class="form-label">Semester</label>
                            <input type="text" class="form-control" id="sem" name="sem" value="<?php echo $session['semester']; ?>" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="sec" class="form-label">Section</label>
                            <input type="text" class="form-control" id="sec" name="sec" value="<?php echo $session['section']; ?>">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="date" class="form-label">Date of Creation</label>
                            <input type="date" class="form-control" id="date" name="date" value="<?php echo $session['date_of_creation']; ?>" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="file" class="form-label">CSV File</label>
                            <input type="file" class="form-control" id="file" name="file">
                        </div>
                        <input type="hidden" name="session_id" value="<?php echo $session_id; ?>">
                        <button type="submit" class="btn btn-primary">Update Session</button>
                        <?php
                    } else {
                        echo "Session not found.";
                    }

                    $stmt->close();
                    $con->close();
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
