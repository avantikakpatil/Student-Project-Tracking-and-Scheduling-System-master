<?php
    include('config.php');
    session_start(); 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $userRole = $_POST["userRole"];

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format";
            exit;
        }

        // Validate password length
        if (strlen($password) < 8) {
            echo "Password must be at least 8 characters long";
            exit;
        }

        // Validate user role
        $validUserRoles = ["Administrator", "Subject Incharge", "Mentor", "Student", "Evaluator"];
        if (!in_array($userRole, $validUserRoles)) {
            echo "Invalid user role";
            exit;
        }

        if (isset($email) && isset($password)) {
            $query="SELECT * FROM users WHERE email='$email' and password='$password'";
            $result = $con->query($query);
            $row = $result->fetch_assoc();
            $id = $row['user_id'];

            $count= mysqli_num_rows($result);
            $result->free();
            if ($count==1) {
                $_SESSION["user_email"] = $email;
                $_SESSION["user_role"] = $row["user_role"];
                $_SESSION["user_id"] = $row["user_id"];

                switch ($userRole) {
                case 'Student':
                    header("Location: ../pages/student/studentDashboard.php?user_id=$id");
                    break;
                case 'Administrator':
                    header("Location: ../pages/superAdmin/superAdminDashboard.php?user_id=$id");
                    break;
                case 'Subject Incharge':
                    header("Location: ../pages/subjectIncharge/subjectInchargeDashboard.php?user_id=$id");
                    break;
                case 'Mentor':
                    header("Location: ../pages/mentor/mentorDashboard.php?user_id=$id");
                    break;
                case 'Evaluator':
                    header("Location: ../pages/evaluator/evaluatorDashboard.php?user_id=$id");
                    break;
                default:
                    echo 'Invalid User Role';
                }
                exit;
            } else {
                // Password doesn't match
                echo "Invalid credentials. Please try again.";
            }
        } else {
            // User not found
            echo "Invalid credentials. Please try again.";
        }

        mysqli_close($con);
    }
?>