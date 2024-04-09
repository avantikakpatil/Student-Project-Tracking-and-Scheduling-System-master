<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include('../../php/config.php');

        $project_id = isset($_GET['PROJECT_ID']) ? $_GET['PROJECT_ID'] : null;
        // echo $project_id;
        $evaluation_round = isset($_POST['evaluation_round']) ? $_POST['evaluation_round'] : null;
        echo $evaluation_round;

        switch ($evaluation_round) {
            case 1:
                // Handle Evaluation Round 1
                $individual_evaluation = isset($_POST['individual_evaluation']) ? $_POST['individual_evaluation'] : null;
                $objective_methodology = isset($_POST['objective_methodology']) ? $_POST['objective_methodology'] : null;
                $planning_team_structure = isset($_POST['planning_team_structure']) ? $_POST['planning_team_structure'] : null;
                $overall_regularity_performance = isset($_POST['overall_regularity_performance']) ? $_POST['overall_regularity_performance'] : null;

                $sql = "INSERT INTO project_evaluations_r1 (project_id, evaluation_round, individual_evaluation, objective_methodology, planning_team_structure, overall_regularity_performance) 
                        VALUES ('$project_id', '$evaluation_round', '$individual_evaluation', '$objective_methodology', '$planning_team_structure', '$overall_regularity_performance')";
                $stmt = $con->query($sql);

                if ($stmt) {
                        echo "Data for Evaluation Round 1 inserted successfully!";
                        // You may want to redirect or show a confirmation message here
                    } else {
                        echo "Failed to insert data for Evaluation Round 1. Please try again.";
                    }

                break;

            case 2:
                // Handle Evaluation Round 2
                $SRS = $_POST['SRS'];
                $project_implementation = $_POST['Project_implementation'];
                $demo = $_POST['Demo'];
                $overall_regularity_performance = $_POST['overall_regularity_performance'];

                $sql = "INSERT INTO project_evaluations_r2 (PROJECT_ID, evaluation_round, SRS, Project_implementation, Demo, perf_r2) 
                        VALUES ('$project_id', '$evaluation_round', '$SRS', '$project_implementation', '$demo', '$overall_regularity_performance')";
                $stmt = $con->query($sql);

                if ($stmt) {
                    // $stmt->bind_param("iiiii", $project_id, $evaluation_round, $SRS, $project_implementation, $demo, $overall_regularity_performance);
                    // $stmt->execute();

                    if ($stmt) {
                        echo "Data for Evaluation Round 2 inserted successfully!";
                        // You may want to redirect or show a confirmation message here
                    } else {
                        echo "Failed to insert data for Evaluation Round 2. Please try again.";
                    }

                    // $stmt->close();
                } else {
                    echo "Error in preparing the SQL statement.";
                }
                break;

            case 3:
                // Handle Evaluation Round 3
                $final_srs = $_POST['SRS'];
                $project_implementation = $_POST['Project_implementation'];
                $demo_presentation = $_POST['Demo_presentation'];
                $overall_regularity_performance = $_POST['overall_regularity_performance'];

                $sql = "INSERT INTO project_evaluations_r3 (PROJECT_ID, evaluation_round, final_SRS, proj_impl_100, demo_presentation, perf_r3) 
                        VALUES ('$project_id', '$evaluation_round', '$final_srs', '$project_implementation', '$demo_presentation', '$overall_regularity_performance')";
                $stmt = $con->query($sql);

                if ($stmt) {
                    // $stmt->bind_param("iiiii", $project_id, $evaluation_round, $final_srs, $project_implementation, $demo_presentation, $overall_regularity_performance);
                    // $stmt->execute();

                    if ($stmt) {
                        echo "Data for Evaluation Round 3 inserted successfully!";
                        // You may want to redirect or show a confirmation message here
                    } else {
                        echo "Failed to insert data for Evaluation Round 3. Please try again.";
                    }

                    // $stmt->close();
                } else {
                    echo "Error in preparing the SQL statement.";
                }
                break;

            default:
                echo "Invalid evaluation round.";
                break;
        }

        header("Location: project_evaluation_sheet.php?PROJECT_ID=".$_GET['PROJECT_ID']);
        $con->close();
        exit();
    }
?>