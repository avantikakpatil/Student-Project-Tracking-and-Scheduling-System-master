<?php
include('../../php/config.php');

// Fetch data from the first table
$sql_table1 = "SELECT project_id, individual_evaluation, objective_methodology, planning_team_structure, overall_regularity_performance 
            FROM project_evaluations_r1";
$result_table1 = $con->query($sql_table1);

// Fetch data from the second table
$sql_table2 = "SELECT project_id, SRS, Project_implementation, Demo, perf_r2 FROM project_evaluations_r2";
$result_table2 = $con->query($sql_table2);

// Fetch data from the third table
$sql_table3 = "SELECT project_id, final_SRS, proj_impl_100, demo_presentation, perf_r3 FROM project_evaluations_r3";
$result_table3 = $con->query($sql_table3);

// Combine all data into a single array
$data = array(
    // Headers for Table 1
    array('Project_Id', 'Individual Evaluation', 'Objective Methodology', 'Planning Team Structure', 'Overall Regularity Performance'),
);

// Add data from Table 1
while ($row = $result_table1->fetch_assoc()) {
    $data[] = array($row['project_id'], $row['individual_evaluation'], $row['objective_methodology'], $row['planning_team_structure'], $row['overall_regularity_performance']);
}

// Add a separator row between tables
$data[] = array('', '', '', '');

// Headers for Table 2
$data[] = array('Project Id', 'SRS', 'Project Implementation 30%', 'Demo', 'Overall Regularity Performance');

// Add data from Table 2
while ($row = $result_table2->fetch_assoc()) {
    $data[] = array($row['project_id'], $row['SRS'], $row['Project_implementation'], $row['Demo'], $row['perf_r2']);
}

// Add another separator row
$data[] = array('', '', '', '');

// Headers for Table 3
$data[] = array('Project Id', 'Final SRS', 'Project Implementation 100%', 'Demo Presentation', 'Overall Regularity Performance');

// Add data from Table 3
while ($row = $result_table3->fetch_assoc()) {
    $data[] = array($row['project_id'], $row['final_SRS'], $row['proj_impl_100'], $row['demo_presentation'], $row['perf_r3']);
}

// Set CSV file name
$filename = 'exported_data.csv';

// Set headers
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');

// Open a file pointer
$output = fopen('php://output', 'w');

// Output data to CSV
foreach ($data as $row) {
    fputcsv($output, $row);
}

// Close the file pointer
fclose($output);

// Close database connection
$con->close();

// Exit to prevent further output
exit();
?>