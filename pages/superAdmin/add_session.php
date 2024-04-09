<?php
session_start();
include('../../php/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $branch = $_POST["branch"];
    $semester = $_POST["sem"];
    $section = $_POST["sec"];
    $date_of_creation = $_POST["date"];
    $sIncharge = $_POST["sIncharge"];

    $targetDir = "../../uploads/csv_files/";
    
    $fileName = isset($_FILES["file"]["name"]) ? $title . "-" . $_FILES["file"]["name"] : "";
    $csvFilePath = $targetDir . $fileName;
    $tname = isset($_FILES["file"]["tmp_name"]) ? $_FILES["file"]["tmp_name"] : "";

    if (move_uploaded_file($tname, $csvFilePath)) {
        $sql = "INSERT INTO session(title, branch, semester, section, date_of_creation, csv, s_Incharge_Id)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssssi",$title, $branch, $semester, $section, $date_of_creation, $csvFilePath, $sIncharge);

        if ($stmt->execute()) {

            $session_id_query = "SELECT id FROM session WHERE title='$title'";
            $session_id_result = mysqli_query($con, $session_id_query);
            if ($session_id_result) {
                $row = mysqli_fetch_assoc($session_id_result);
                $session_id = isset($row['id']) ? $row['id'] : "";

                $csvFile = "../../uploads/csv_files/{$fileName}";

                if (($handle = fopen($csvFile, "r")) !== FALSE) {
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

                        $query = "INSERT INTO projects (PROJECT_TITLE, DOMAIN, DESCRIPTION, TEAM_LEADER, LEADER_PRN, MEMBER_1_PRN, MEMBER_2_PRN, MEMBER_3_PRN, SESSION_ID, mentor_id) 
                        VALUES ('$proj_title', '$domain', '$description', '$leader', '$lead_prn', '$m1_prn', '$m2_prn', '$m3_prn', '$session_id', '$mentor_id')";
                        $resQuery = $con->query($query);
                    }

                    fclose($handle);
                    $user_id = $_SESSION["user_id"];
                }
            } else {
                echo "Error fetching session_id: " . $con->error;
            }
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }

        session_start();
        $_SESSION['success'] = 2;
        $stmt->close();
    } else {
        echo "Error uploading the file.";
        echo "Error: " . $con->error;
    }
}

header("Location: superAdminDashboard.php?user_id=$user_id");
$con->close();
?>