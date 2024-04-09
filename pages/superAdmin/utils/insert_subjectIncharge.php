<?php 
    include('../../../php/config.php');

    function generateRandomPassword($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-_=+[]{}|;:,.<>?';
        $password = '';

        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $password;
    }

    function isPasswordUnique($password) {
        global $con;

        $sql = "SELECT COUNT(*) as count FROM users WHERE password = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $count = $row['count'];

        $stmt->close();

        return $count == 0;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST['email'];
        $name = $_POST['name'];
        $dept = $_POST['dept'];
        $user_role = 'Subject Incharge';

        do {
            $password = generateRandomPassword();
        } while (!isPasswordUnique($password));

        $sqlInsertUser = "INSERT INTO users (email, password, user_role) VALUES (?, ?, ?)";
        $stmtInsertUser = $con->prepare($sqlInsertUser);
        // define('PASSWORD_DEFAULT', "$email");
        $stmtInsertUser->bind_param("sss", $email, password_hash($password, PASSWORD_DEFAULT), $user_role);

        if ($stmtInsertUser->execute()) {
            // Get the generated user_id
            $user_id = $con->insert_id;
    
            // Insert into subjectincharge table
            $sqlInsertSubjectIncharge = "INSERT INTO subjectincharge (email, name, user_id, dept) VALUES (?, ?, ?, ?)";
            $stmtInsertSubjectIncharge = $con->prepare($sqlInsertSubjectIncharge);
            $stmtInsertSubjectIncharge->bind_param("ssis", $email, $name, $user_id, $dept);
    
            if ($stmtInsertSubjectIncharge->execute()) {
                echo "Data inserted successfully into both tables.";
                echo "Generated Password: " . $password;
            } else {
                echo "Error inserting data into subjectincharge table: " . $con->error;
            }
            $stmtInsertSubjectIncharge->close();
        } else {
            echo "Error inserting data into users table: " . $con->error;
        }
    
        $stmtInsertUser->close();
        $con->close();
        
        session_start();
        $_SESSION['success'] = 1;
        header("Location: ../superAdminDashboard.php");
    }
?>