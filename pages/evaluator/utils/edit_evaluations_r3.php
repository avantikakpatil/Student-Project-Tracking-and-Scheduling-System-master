<?php
// edit_evaluation.php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['PROJECT_ID']) && isset($_GET['round'])) {
    $project_id = $_GET['PROJECT_ID'];
    $evaluation_round = $_GET['round'];

    include('../../../php/config.php');

    // Fetch existing data from the database based on project_id and evaluation_round
    $sql = "SELECT * FROM project_evaluations_r3 WHERE project_id = ? AND evaluation_round = ?";
    $stmt = $con->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ii", $project_id, $evaluation_round);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Populate the form with existing data
            $individual_evaluation = $row['individual_evaluation'];
            $objective_methodology = $row['objective_methodology'];
            $planning_team_structure = $row['planning_team_structure'];
            $overall_regularity_performance = $row['overall_regularity_performance'];
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
    $updated_SRS = $_POST['final_SRS'];
    $updated_proj_impl_100 = $_POST['proj_impl_100'];
    $updated_demo_presentation = $_POST['demo_presentation'];
    $updated_perf_r3 = $_POST['perf_r3'];

    // Update the data in the database
    $update_sql = "UPDATE project_evaluations_r3 
                   SET final_SRS = ?, 
                       proj_impl_100 = ?, 
                       demo_presentation = ?, 
                       perf_r3 = ? 
                   WHERE project_id = ? AND evaluation_round = ?";
    $update_stmt = $con->prepare($update_sql);

    if ($update_stmt) {
        $update_stmt->bind_param("ddddii", $updated_SRS, $updated_proj_impl_100, $updated_demo_presentation, $updated_perf_r3, $project_id, $evaluation_round);
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

    <form method="post" action="edit_evaluations_r3.php?PROJECT_ID=<?php echo $project_id; ?>&round=<?php echo $evaluation_round; ?>">
        
        <div class="mb-3">
            <label for="individual_evaluation" class="form-label">Final SRS:</label>
            <input type="number" class="form-control" name="individual_evaluation" value="<?php echo $individual_evaluation; ?>" min="0" max="10" step="0.1" required>
        </div>
        <div class="mb-3">
            <label for="objective_methodology" class="form-label">Project Implementation:</label>
            <input type="number" class="form-control" name="objective_methodology" value="<?php echo $objective_methodology; ?>" min="0" max="10" step="0.1" required>
        </div>
        <div class="mb-3">
            <label for="planning_team_structure" class="form-label">Demo and Presentation:</label>
            <input type="number" class="form-control" name="planning_team_structure" value="<?php echo $planning_team_structure; ?>" min="0" max="10" step="0.1" required>
        </div>
        <div class="mb-3">
            <label for="overall_regularity_performance" class="form-label">Overall regularity & performance:</label>
            <input type="number" class="form-control" name="overall_regularity_performance" value="<?php echo $overall_regularity_performance; ?>" min="0" max="10" step="0.1" required>
        </div>
        <input type="hidden" name="evaluation_round" value="<?php echo $evaluation_round; ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</body>
</html>