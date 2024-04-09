<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('../../php/config.php');

    $project_id = isset($_GET['PROJECT_ID']) ? $_GET['PROJECT_ID'] : null;
    $evaluation_round = isset($_POST['evaluation_round']) ? $_POST['evaluation_round'] : null;

    function updateData($tableName, $updateFields, $conditionField, $conditionValue) {
        global $con;

        $updateSets = [];
        foreach ($updateFields as $field) {
            $updateSets[] = "$field = ?";
        }

        $updateString = implode(', ', $updateSets);

        $sql = "UPDATE $tableName SET $updateString WHERE $conditionField = ?";
        $stmt = $con->prepare($sql);

        if ($stmt) {
            $params = array_values($updateFields);
            $params[] = $conditionValue;

            $stmt->bind_param(str_repeat('s', count($updateFields)) . 's', ...$params);
            $stmt->execute();
            $stmt->close();

            return true;
        } else {
            return false;
        }
    }

    function handleEvaluationRound($evaluation_round) {
        global $project_id;

        switch ($evaluation_round) {
            case 1:
                // Handle Evaluation Round 1
                $updateFields = [
                    'individual_evaluation',
                    'objective_methodology',
                    'planning_team_structure',
                    'overall_regularity_performance'
                ];
                $conditionField = 'project_id';
                $conditionValue = $project_id;

                $success = updateData(
                    'project_evaluations_r1',
                    $updateFields,
                    $conditionField,
                    $conditionValue
                );
                break;

            case 2:
                // Handle Evaluation Round 2
                $updateFields = [
                    'SRS',
                    'Project_implementation',
                    'Demo',
                    'perf_r2'
                ];
                $conditionField = 'PROJECT_ID';
                $conditionValue = $project_id;

                $success = updateData(
                    'project_evaluations_r2',
                    $updateFields,
                    $conditionField,
                    $conditionValue
                );
                break;

            case 3:
                // Handle Evaluation Round 3
                $updateFields = [
                    'final_SRS',
                    'proj_impl_100',
                    'demo_presentation',
                    'perf_r3'
                ];
                $conditionField = 'PROJECT_ID';
                $conditionValue = $project_id;

                $success = updateData(
                    'project_evaluations_r3',
                    $updateFields,
                    $conditionField,
                    $conditionValue
                );
                break;

            default:
                echo "Invalid evaluation round.";
                return;
        }

        if ($success) {
            echo "Data for Evaluation Round $evaluation_round updated successfully!";
        } else {
            echo "Failed to update data for Evaluation Round $evaluation_round. Please try again.";
        }
    }

    handleEvaluationRound($evaluation_round);

    header("Location: project_evaluation_sheet.php?PROJECT_ID=$project_id");
    $con->close();
    exit();
}
?>