<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "sptss";

// Connect to the MySQL database
$mysqli = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// CSV file to read
$csvFile = "Session Dummy Data - Sheet1.csv";

// Open and read the CSV file
if (($handle = fopen($csvFile, "r")) !== FALSE) {
    // Loop through the CSV data
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        // Assuming the CSV file has three columns (first_name, last_name, age)
        $proj_title = $data[0];
        $domain = $data[1];
        $description = $data[2];
        $leader = $data[3];
        $lead_prn = $data[4];
        $m1_prn = $data[5];
        $m2_prn = $data[6];
        $m3_prn = $data[7];
        // $s_id = 
        
        // Insert data into the MySQL table
        $query = "INSERT INTO projects (PROJECT_TITLE, DOMAIN, DESCRIPTION, TEAM_LEADER, LEADER_PRN, MEMBER_1_PRN, MEMBER_2_PRN, MEMBER_3_PRN) 
        VALUES ('$proj_title', '$domain', '$description', '$leader', '$lead_prn', '$m1_prn', '$m2_prn', '$m3_prn')";
        
        if ($mysqli->query($query) === TRUE) {
            echo "Record inserted successfully.<br>";
        } else {
            echo "Error: " . $query . "<br>" . $mysqli->error;
        }
    }
    
    fclose($handle);
}

// Close the MySQL connection
$mysqli->close();
?>