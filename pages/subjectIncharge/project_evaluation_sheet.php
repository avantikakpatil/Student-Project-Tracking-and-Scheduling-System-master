<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Evaluation Sheet</title>
        <?php require('../../php/links.php'); ?>
    </head>
    <body class="me-3">
        <style>
            .table-fixed {
                table-layout: fixed;
                width: 100%;
            }

            input{
                width: 200px;
            }
        </style>
        <div class="contaniner">
            <div class="row">
                <?php include("../../components/subjectInchargeNavbar.php"); ?>
                <div class="col min-vh-100">
                    <?php
                        if (isset($_GET['PROJECT_ID'])) {
                            $project_id = intval($_GET['PROJECT_ID']);

                            include('../../php/config.php');
                            $stmt = $con->prepare("SELECT PROJECT_TITLE FROM projects WHERE PROJECT_ID = ?");
                            $stmt->bind_param("i", $project_id);
                            $stmt->execute();
                            $stmt->bind_result($title);
                            
                            if ($stmt->fetch()) {
                                echo "<h4>$title </h4>";
                            } else {
                                echo "Project not found";
                            }

                            $stmt->close();
                            $con->close();
                        }
                    ?>
                    <div class="container-fluid px-5 pt-3 pb-4">
                        <div class="row">
                            <div class="col-md-7">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="table table-primary">
                                            <th scope="col">Team Member Name</th>
                                            <th scope="col">Position</th>
                                            <th scope="col">PRN</th>
                                            <th scope="col">Class</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include('../../php/config.php');

                                            $sql = "SELECT * FROM team_members WHERE PROJECT_ID = ?";
                                            $stmt = $con->prepare($sql);

                                            if ($stmt) {
                                                $stmt->bind_param("i", $project_id);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row['name'] . "</td>";
                                                        echo "<td>" . $row['position'] . "</td>";
                                                        echo "<td>" . $row['PRN'] . "</td>";
                                                        echo "<td>" . $row['class'] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='5'>No details found for this project.</td></tr>";
                                                }
                                                $stmt->close();
                                            } else {
                                                echo "Error in preparing the SQL statement.";
                                            }
                                            $con->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Project Description</h5>
                                        <p class="card-text"><?php include('description.php'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Evaluation Round 1 -->
                    <form method="post" action="insert_data.php?PROJECT_ID=<?php echo $project_id ?>">
                        <div class="container-fluid px-5 border border-secondary rounded">
                            <div class="row py-3">
                                <div class="col">
                                    <h5>Evaluation Round 1</h5>
                                    <div>
                                        <a href="utils/edit_evaluations.php?PROJECT_ID=<?php echo $project_id ?>&round=1" method="GET">
                                            <i class="fa-regular fa-pen-to-square" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <a href="utils/edit_evaluations.php">
                                    <i class="fa-regular fa-pen-to-square float-end" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i>
                                </a>
                            </div> -->
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-fixed table-bordered">
                                        <thead>
                                            <tr class="table table-secondary">
                                                <th scope="col">Individual Evaluation</th>
                                                <th scope="col">Objective & methodology of work</th>
                                                <th scope="col">Planning & team structure</th>
                                                <th scope="col">Overall regularity & performance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="number" name="individual_evaluation" min="0" max="10" step="0.1" required></td>
                                                <td><input type="number" name="objective_methodology" min="0" max="10" step="0.1" required></td>
                                                <td><input type="number" name="planning_team_structure" min="0" max="10" step="0.1" required></td>
                                                <td><input type="number" name="overall_regularity_performance" min="0" max="10" step="0.1" required></td>
                                                <input type="hidden" name="evaluation_round" value=1>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <?php
                                                include('../../php/config.php');

                                                $sql = "SELECT * FROM project_evaluations_r1 WHERE project_id = ?";
                                                $stmt = $con->prepare($sql);

                                                if ($stmt) {
                                                    $stmt->bind_param("i", $project_id);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();

                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<tr>";
                                                            echo "<td>" . $row['individual_evaluation'] . "</td>";
                                                            echo "<td>" . $row['objective_methodology'] . "</td>";
                                                            echo "<td>" . $row['planning_team_structure'] . "</td>";
                                                            echo "<td>" . $row['overall_regularity_performance'] . "</td>";
                                                            echo "</tr>";
                                                        }
                                                    } else {
                                                        echo "<tr><td colspan='5'>No details found for this project.</td></tr>";
                                                    }
                                                    $stmt->close();
                                                } else {
                                                    echo "Error in preparing the SQL statement.";
                                                }
                                                $con->close();
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Evaluation Round 2 -->
                    <form method="post" action="insert_data.php?PROJECT_ID=<?php echo $project_id ?>">
                        <div class="container-fluid my-3 px-5 pt-3 border border-secondary rounded">
                            <div class="row py-3">
                                <div class="col">
                                    <h5>Evaluation Round 2 </h5>
                                </div>
                                <div class="col text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-fixed table-bordered">
                                        <thead>
                                            <tr class="table table-secondary">
                                                <th scope="col">SRS/design</th>
                                                <th scope="col">Project implementation 30%</th>
                                                <th scope="col">Demo</th>
                                                <th scope="col">Overall regularity & performance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="number" name="SRS" min="0" max="10" step="0.1" required></td>
                                                <td><input type="number" name="Project_implementation" min="0" max="10" step="0.1" required></td>
                                                <td><input type="number" name="Demo" min="0" max="10" step="0.1" required></td>
                                                <td><input type="number" name="overall_regularity_performance" min="0" max="10" step="0.1" required></td>
                                                <input type="hidden" name="evaluation_round" value=2>
                                            </tr> 
                                        </tbody>
                                        <tbody>
                                            <?php
                                                include('../../php/config.php');

                                                $sql = "SELECT * FROM project_evaluations_r2 WHERE project_id = ?";
                                                $stmt = $con->prepare($sql);

                                                if ($stmt) {
                                                    $stmt->bind_param("i", $project_id);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();

                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<tr>";
                                                            echo "<td>" . $row['SRS'] . "</td>";
                                                            echo "<td>" . $row['Project_implementation'] . "</td>";
                                                            echo "<td>" . $row['Demo'] . "</td>";
                                                            echo "<td>" . $row['perf_r2'] . "</td>";
                                                            echo "</tr>";
                                                        }
                                                    } else {
                                                        echo "<tr><td colspan='5'>No details found for this project.</td></tr>";
                                                    }
                                                    $stmt->close();
                                                } else {
                                                    echo "Error in preparing the SQL statement.";
                                                }
                                                $con->close();
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Evaluation Round 3 -->
                    <form method="post" action="insert_data.php?PROJECT_ID=<?php echo $project_id ?>">
                        <div class="container-fluid my-3 px-5 pt-3 border border-secondary rounded">
                            <div class="row py-3">
                                <div class="col">
                                    <h5>Evaluation Round 3 </h5>
                                </div>
                                <div class="col text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-fixed table-bordered">
                                        <thead>
                                            <tr class="table table-secondary">
                                                <th scope="col">Final SRS</th>
                                                <th scope="col">Project implementation 100%</th>
                                                <th scope="col">Demo & presentation</th>
                                                <th scope="col">Overall regularity & performance</th>
                                            </tr>
                                        </thead>                    
                                        <tbody>
                                            <tr>
                                                <td><input type="number" name="SRS" min="0" max="10" step="0.1" required></td>
                                                <td><input type="number" name="Project_implementation" min="0" max="10" step="0.1" required></td>
                                                <td><input type="number" name="Demo" min="0" max="10" step="0.1" required></td>
                                                <td><input type="number" name="overall_regularity_performance" min="0" max="10" step="0.1" required></td>
                                                <input type="hidden" name="evaluation_round" value=3>
                                            </tr> 
                                        </tbody>
                                        <tbody>
                                            <?php
                                                include('../../php/config.php');

                                                $sql = "SELECT * FROM project_evaluations_r3 WHERE project_id = ?";
                                                $stmt = $con->prepare($sql);

                                                if ($stmt) {
                                                    $stmt->bind_param("i", $project_id);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();

                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<tr>";
                                                            echo "<td>" . $row['final_SRS'] . "</td>";
                                                            echo "<td>" . $row['proj_impl_100'] . "</td>";
                                                            echo "<td>" . $row['demo_presentation'] . "</td>";
                                                            echo "<td>" . $row['perf_r3'] . "</td>";
                                                            echo "</tr>";
                                                        }
                                                    } else {
                                                        echo "<tr><td colspan='5'>No details found for this project.</td></tr>";
                                                    }
                                                    $stmt->close();
                                                } else {
                                                    echo "Error in preparing the SQL statement.";
                                                }
                                                $con->close();
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
                
        <script>
            function redirectToPage() {
                window.location.href = "php/evaluatorDashboard.php?PROJECT_ID=<?php echo $project_id; ?>";
            }
        </script>

    </body>
</html>