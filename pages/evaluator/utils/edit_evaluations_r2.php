<?php
// edit_evaluation.php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['PROJECT_ID']) && isset($_GET['round'])) {
    $project_id = $_GET['PROJECT_ID'];
    $evaluation_round = $_GET['round'];

    include('../../../php/config.php');

    // Fetch existing data from the database based on project_id and evaluation_round
    $sql = "SELECT * FROM project_evaluations_r2 WHERE project_id = ? AND evaluation_round = ?";
    $stmt = $con->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ii", $project_id, $evaluation_round);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Populate the form with existing data
            $SRS = $row['SRS'];
            $proj_impl = $row['Project_implementation'];
            $demo = $row['Demo'];
            $overall_regularity_performance = $row['perf_r2'];
        } else {
            echo "No data found for this project and evaluation round.";
            exit();
        }

        $stmt->close();
    } else {
        echo "Error in preparing the SQL statement.";
        exit();
    }

    $con->close();
} else {
    echo "Invalid request.";
    exit();
}

// Update data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('../../../php/config.php');

    // Get updated values from the form
    $updated_SRS = $_POST['SRS'];
    $updated_proj_impl = $_POST['Project_implementation'];
    $updated_demo = $_POST['Demo'];
    $updated_overall_regularity_performance = $_POST['perf_r2'];

    // Update the data in the database
    $update_sql = "UPDATE project_evaluations_r2 
                   SET SRS = ?, 
                       Project_implementation = ?, 
                       Demo = ?, 
                       pref_r2 = ? 
                   WHERE project_id = ? AND evaluation_round = ?";
    $update_stmt = $con->prepare($update_sql);

    if ($update_stmt) {
        $update_stmt->bind_param("ddddii", $updated_SRS, $updated_proj_impl, $updated_demo, $updated_overall_regularity_performance, $project_id, $evaluation_round);
        $update_stmt->execute();

        if ($update_stmt->affected_rows > 0) {
            echo "Data for Evaluation Round $evaluation_round updated successfully!";
        } else {
            echo "No changes made or failed to update data.";
        }

        $update_stmt->close();
    } else {
        echo "Error in preparing the SQL statement for update.";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Evaluation</title>
    <?php include("../../../php/links.php"); ?>
</head>
<body>

    <h2>Edit Evaluation - Round <?php echo $evaluation_round; ?></h2>

    <form method="post" action="edit_evaluations_r2.php?PROJECT_ID=<?php echo $project_id; ?>&round=<?php echo $evaluation_round; ?>">
        
        <div class="mb-3">
            <label for="individual_evaluation" class="form-label">SRS:</label>
            <input type="number" class="form-control" name="SRS" value="<?php echo $SRS; ?>" min="0" max="10" step="0.1" required>
        </div>
        <div class="mb-3">
            <label for="objective_methodology" class="form-label">Project Implementation:</label>
            <input type="number" class="form-control" name="Project_implementation" value="<?php echo $proj_impl ?>" min="0" max="10" step="0.1" required>
        </div>
        <div class="mb-3">
            <label for="planning_team_structure" class="form-label">Demo:</label>
            <input type="number" class="form-control" name="Demo" value="<?php echo $demo; ?>" min="0" max="10" step="0.1" required>
        </div>
        <div class="mb-3">
            <label for="overall_regularity_performance" class="form-label">Overall regularity & performance:</label>
            <input type="number" class="form-control" name="pref_r2" value="<?php echo $overall_regularity_performance; ?>" min="0" max="10" step="0.1" required>
        </div>
        <input type="hidden" name="evaluation_round" value="<?php echo $evaluation_round; ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</body>
</html>