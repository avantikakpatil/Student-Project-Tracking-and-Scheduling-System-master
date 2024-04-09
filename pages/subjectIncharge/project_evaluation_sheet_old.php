<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation Sheet</title>
    <?php require('../../php/links.php'); ?>
</head>
<body class="me-3">
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
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr class="table table-secondary">
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

                <div class="container-fluid px-5 border border-secondary rounded">
                    <div class="row py-3">
                        <div class="col">
                            <h5>Evaluation Round 1 </h5>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table">
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
                                    <td><input type="text" name="individual_evaluation"></td>
                                    <td><input type="text" name="objective_methodology"></td>
                                    <td><input type="text" name="planning_team_structure"></td>
                                    <td><input type="text" name="overall_regularity_performance"></td>
                                </tr> 
                            </tbody>
                            <tbody>
                                <?php
                                    include('../../php/config.php');

                                    $sql = "SELECT * FROM meeting_details WHERE PROJECT_ID = ?";
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

                <div class="container-fluid my-3 px-5 pt-3 border border-secondary rounded">
                    <div class="row py-3">
                        <div class="col">
                            <h5>Evaluation Round 2 </h5>
                        </div>
                    </div>
                    <div class="row">
                    <table class="table">
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
                                <td><input type="int" name="SRS"></td>
                                <td><input type="int" name="Project_implementation"></td>
                                <td><input type="int" name="Demo"></td>
                                <td><input type="int" name="overall_regularity_performance"></td>
                            </tr> 
                        </tbody>
                        <tbody>
                            <?php
                                include('../../php/config.php');

                                $sql = "SELECT * FROM meeting_details WHERE PROJECT_ID = ?";
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

                <div class="container-fluid my-3 px-5 pt-3 border border-secondary rounded">
                    <div class="row py-3">
                        <div class="col">
                            <h5>Evaluation Round 3 </h5>
                        </div>
                    </div>
                    <div class="row">
                    <table class="table">
                        <thead>
                            <tr class="table table-secondary">
                                <th scope="col">Final SRS</th>
                                <th scope="col">Project implementation 100%</th>
                                <th scope="col">Demo & presentation</th>
                                <th scope="col">Overall regularity & performance</th>
                            </tr>
                        </thead>                    
                        <tbody>
                        <tbody>
                            <tr>
                                <td><input type="int" name="Final_SRS"></td>
                                <td><input type="int" name="Project_implementation"></td>
                                <td><input type="int" name="Demo_presentation"></td>
                                <td><input type="int" name="overall_regularity_performance"></td>
                            </tr> 
                        </tbody>
                            <?php
                                include('../../php/config.php');

                                $sql = "SELECT * FROM meeting_details WHERE PROJECT_ID = ?";
                                $stmt = $con->prepare($sql);

                                if ($stmt) {
                                    $stmt->bind_param("i", $project_id);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['Final_SRS'] . "</td>";
                                            echo "<td>" . $row['Project_implementation'] . "</td>";
                                            echo "<td>" . $row['Demo_presentation'] . "</td>";
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

                <div class="container-fluid my-3 px-5 pt-3 border border-secondary rounded">
                    <div class="row pb-3">
                        <h5>Files and Hyperlinks</h5>
                    </div>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr class="table table-secondary">
                                <th scope="col">Title</th>
                                <th scope="col">Files</th>
                                <th scope="col">Hyperlinks</th>
                                <th scope="col">Date Added</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                include('../../php/config.php');

                                $sql = "SELECT * FROM project_files WHERE PROJECT_ID = ?";
                                $stmt = $con->prepare($sql);

                                if ($stmt) {
                                    $stmt->bind_param("i", $project_id);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['title'] . "</td>";
                                            echo "<td>" . $row['files'] . "</td>";
                                            echo "<td>" . $row['hyperlinks'] . "</td>";
                                            echo "<td>" . $row['date_added'] . "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5'>No Files found for this project.</td></tr>";
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
        </div>
    </div>

    <script>
        function redirectToPage() {
            window.location.href = "php/add_meeting.php?PROJECT_ID=".$project_id;
        }
    </script>

</body>
</html>