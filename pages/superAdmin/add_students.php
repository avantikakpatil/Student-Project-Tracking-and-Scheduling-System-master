<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../../php/links.php'); ?>
    <title>Import Data from CSV</title>
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <?php include("../../components/superAdminNavbar.php"); ?>
            <div class="col py-3 min-vh-100">
                <h5 class="pb-2">Add Students Data from CSV</h5>
                <?php
                include('../../php/config.php');

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_FILES["csvFile"]) && !empty($_FILES["csvFile"]["tmp_name"])) {
                        // Get the uploaded CSV file
                        $csvFile = $_FILES["csvFile"]["tmp_name"];

                        // Read the CSV file
                        $csvData = array_map('str_getcsv', file($csvFile));

                        // Loop through each row in the CSV file
                        foreach ($csvData as $row) {
                            // Extract data from the CSV file
                            $prn = $row[0];
                            $name = $row[1];
                            $dept = $row[2];
                            $year_of_admission = $row[3];
                            $email = $row[4];

                            // Generate a random password
                            $password = generateRandomPassword();

                            // Insert data into the users table
                            $userInsertQuery = "INSERT INTO users (email, password, user_role) VALUES ('$email', '$password', 'student')";
                            $con->query($userInsertQuery);

                            // Get the user_id of the inserted user
                            $userId = $con->insert_id;

                            // Insert data into the students table
                            $studentInsertQuery = "INSERT INTO students (prn, name, dept, year_of_admission, email, user_id) VALUES ('$prn', '$name', '$dept', '$year_of_admission', '$email', '$userId')";
                            $con->query($studentInsertQuery);
                        }

                        echo '<div class="alert alert-warning alert-dismissible fade show col-md-4" role="alert">
                                Data Added Successfully!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                    } else {
                        echo "Please upload a CSV file.";
                    }
                }

                function generateRandomPassword($length = 8) {
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $password = '';
                    for ($i = 0; $i < $length; $i++) {
                        $password .= $characters[rand(0, strlen($characters) - 1)];
                    }
                    return $password;
                }

                $con->close();
                ?>
            <form method="post" enctype="multipart/form-data">
                <div class="input-group" style="max-width: 40rem">
                    <label class="input-group-text" for="csvFile">Choose a CSV file:</label>
                    <input type="file" class="form-control" name="csvFile" accept=".csv">
                </div>
                <br>
                <button type="submit" value="Import Data" class="btn btn-primary">Submit</button>
                <!-- <input type="submit" value="Import Data"> -->
            </form>
            </div>
        </div>
    </div>
</body>
</html>