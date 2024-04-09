<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('../../php/links.php'); ?>
    <title>Add Panel</title>
</head>
<body>
    <section>
        <div class="container-fluid">
            <div class="row">
                <?php include("../../components/subjectInchargeNavbar.php"); ?>
                <div class="col py-3 min-vh-100">
                <?php
                    $session_id = $_GET['session_id'];
                    echo "Session ID: " . $session_id;
                    $_SESSION['session_id'] = $session_id;
                ?>
                    <h4>Add Panel Form</h4>
                    <form action="process_form.php" method="post">

                        <!-- <div class="col-md-6">
                            <h6><label for="selectSession" class="pt-3">Select Session:</label></h6>
                            <select class="form-select" name="selectSession" id="selectSession">
                                <option selected>Select Option:</option>
                                <?php
                                    include('../../php/config.php');
                                    $sql = "SELECT id, title FROM session";
                                    $result = $con->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['id'] . "'>" . $row['title'] . "</option>";
                                    }
                                    $con->close();
                                ?>
                            </select>
                        </div> -->

                        <div class="col-md-6">
                            <h6><label for="selectProjects" class="pt-3">Select Projects:</label></h6>
                            <select class="form-select" name="selectProjects[]" id="selectProjects" multiple>
                                <option selected>Select Option:</option>
                                <?php
                                    include('../../php/config.php');
                                    $sql = "SELECT PROJECT_ID, PROJECT_TITLE FROM projects";
                                    $result = $con->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['PROJECT_ID'] . "'>" . $row['PROJECT_TITLE'] . "</option>";
                                    }
                                    $con->close();
                                ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <h6><label for="selectPanelists" class="pt-3">Select Panelists:</label></h6>
                            <select class="form-select" name="selectPanelists[]" id="selectPanelists" multiple>
                                <option selected>Select One or Multiple Option:</option>
                                <?php
                                    include('../../php/config.php');
                                    $sql = "SELECT id, name FROM panelists";
                                    $result = $con->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                    }
                                    $con->close();
                                ?>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-3">Add Panel</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>