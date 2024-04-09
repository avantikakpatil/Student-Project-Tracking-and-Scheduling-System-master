<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details</title>
    <?php require('../../php/links.php'); ?>
</head>
<body>
    <div class="contaniner-fluid pe-3">
        <div class="row">
            <?php include("../../components/superAdminNavbar.php"); ?>
            <div class="col py-3 min-vh-100">
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
                                                echo "<tr><td colspan='5'>No meeting details found for this project.</td></tr>";
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
                            <h5>Weekly Evaluation Details</h5>
                        </div>
                    </div>
                    <div class="row">
                    <table class="table">
                        <thead>
                            <tr class="table table-secondary">
                                <th scope="col">Date</th>
                                <th scope="col">Points of Discussion</th>
                                <th scope="col">Team Members Present</th>
                                <th scope="col">Implementation Status</th>
                                <th scope="col">Rating for Work Progress</th>
                            </tr>
                        </thead>
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
                                            echo "<td>" . $row['date_column'] . "</td>";
                                            echo "<td>" . $row['points_of_discussion'] . "</td>";
                                            echo "<td>" . $row['team_members_present'] . "</td>";
                                            echo "<td>" . $row['implementation_status'] . "</td>";
                                            echo "<td>" . $row['rating'] . "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5'>No meeting details found for this project.</td></tr>";
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