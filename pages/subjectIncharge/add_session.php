<?php
session_start();
include('../../php/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $branch = $_POST["branch"];
    $semester = $_POST["sem"];
    $section = $_POST["sec"];
    $date_of_creation = $_POST["date"];

    $targetDir = "../../uploads/csv_files/";
    
    $fileName = isset($_FILES["file"]["name"]) ? $title . "-" . $_FILES["file"]["name"] : "";
    $csvFilePath = $targetDir . $fileName;
    $tname = isset($_FILES["file"]["tmp_name"]) ? $_FILES["file"]["tmp_name"] : "";

    if (move_uploaded_file($tname, $csvFilePath)) {
        $sql = "INSERT INTO session(title, branch, semester, section, date_of_creation, csv)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssssi",$title, $branch, $semester, $section, $date_of_creation, $csvFilePath);

        if ($stmt->execute()) {
            // header("Location:project_details.php?PROJECT_ID=$project_id&success=1");
            // echo "File Successfully uploaded";

            $session_id_query = "SELECT id FROM session WHERE title='$title'";
            $session_id_result = mysqli_query($con, $session_id_query);
            if ($session_id_result) {
                $row = mysqli_fetch_assoc($session_id_result);
                $session_id = isset($row['id']) ? $row['id'] : "";

                $csvFile = "../../uploads/csv_files/{$fileName}";

                // Open and read the CSV file
                if (($handle = fopen($csvFile, "r")) !== FALSE) {
                    // Loop through the CSV data
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $proj_title = $data[0];
                        $domain = $data[1];
                        $description = $data[2];
                        $leader = $data[3];
                        $lead_prn = $data[4];
                        $m1_prn = $data[5];
                        $m2_prn = $data[6];
                        $m3_prn = $data[7];
                        $mentor_id = $data[8];

                        // Add s_Incharge_ID
                        $query = "INSERT INTO projects (PROJECT_TITLE, DOMAIN, DESCRIPTION, TEAM_LEADER, LEADER_PRN, MEMBER_1_PRN, MEMBER_2_PRN, MEMBER_3_PRN, SESSION_ID, mentor_id) 
                        VALUES ('$proj_title', '$domain', '$description', '$leader', '$lead_prn', '$m1_prn', '$m2_prn', '$m3_prn', '$session_id', '$mentor_id')";

                        // if ($con->query($query) === TRUE) {
                        //     echo "Record inserted successfully.<br>";
                        // } else {
                        //     echo "Error: " . $query . "<br>" . $con->error;
                        // }
                    }

                    fclose($handle);
                    $user_id = $_SESSION["user_id"];
                    header("Location: subjectInchargeDashboard.php?user_id=$user_id");
                }
            } else {
                echo "Error fetching session_id: " . $con->error;
            }
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }

        $stmt->close();
    } else {
        echo "Error uploading the file.";
        echo "Error: " . $con->error;
    }
        
}

// Close connection
$con->close();
?>