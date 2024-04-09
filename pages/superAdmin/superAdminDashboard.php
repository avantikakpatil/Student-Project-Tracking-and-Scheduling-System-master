<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Session.css">
    <?php require('../../php/links.php'); ?>
    <title>SuperAdminDashboard</title>
</head>
<body>

    <section>
        <div class="container-fluid">
            <div class="row">
                <?php include("../../components/superAdminNavbar.php"); ?>
                <div class="col py-3 min-vh-100">
                    <?php
                        if(isset($_SESSION['success']) && $_SESSION['success'] == 1) {
                            echo '<div class="alert alert-warning alert-dismissible fade show col-md-4" role="alert">
                                Subject Incharge Added Successfully!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                            unset($_SESSION['success']);
                        }
                        if(isset($_SESSION['success']) && $_SESSION['success'] == 2) {
                            echo '<div class="alert alert-warning alert-dismissible fade show col-md-4" role="alert">
                                Session Created Successfully!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                            unset($_SESSION['success']);
                        }
                    ?>
                    <div class="row">
                        <?php
                            include('../../php/config.php');

                            // Fetch distinct departments and semesters from the database
                            $departmentQuery = "SELECT DISTINCT branch FROM session";
                            $semesterQuery = "SELECT DISTINCT semester FROM session";

                            $departmentResult = $con->query($departmentQuery);
                            $semesterResult = $con->query($semesterQuery);

                            $departments = array();
                            $semesters = array();

                            while ($row = $departmentResult->fetch_assoc()) {
                                $departments[] = $row['branch'];
                            }

                            while ($row = $semesterResult->fetch_assoc()) {
                                $semesters[] = $row['semester'];
                            }

                            echo '<div class="filter-bar mb-3">
                                <label for="departmentFilter" class="me-2">Department:</label>
                                <select id="departmentFilter">
                                    <option value="">All</option>';
                            
                            foreach ($departments as $department) {
                                echo '<option value="' . $department . '">' . $department . '</option>';
                            }

                            echo '</select>

                                <label for="semesterFilter" class="mx-2">Semester:</label>
                                <select id="semesterFilter">
                                    <option value="">All</option>';
                            
                            foreach ($semesters as $semester) {
                                echo '<option value="' . $semester . '">' . $semester . '</option>';
                            }

                            echo '</select>
                                <label for="titleFilter" class="mx-2">Title:</label>
                                <input type="text" id="titleFilter" placeholder="Search by title">
                            </div>';                            
                            $con->close();
                        ?>
                    </div>
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        <?php include 'display_sessions.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const departmentFilter = document.getElementById('departmentFilter');
            const semesterFilter = document.getElementById('semesterFilter');
            const titleFilter = document.getElementById('titleFilter');
            const cards = document.querySelectorAll('.card');

            function filterCards() {
                const selectedDepartment = departmentFilter.value;
                const selectedSemester = semesterFilter.value;
                const titleQuery = titleFilter.value.toLowerCase();

                cards.forEach(card => {
                    const cardDepartment = card.querySelector('.card-title').innerText.trim();
                    const cardSemester = card.querySelector('.card-text').innerText.trim();
                    const cardTitle = card.querySelector('.card-header').innerText.trim().toLowerCase();

                    const departmentMatch = selectedDepartment === '' || cardDepartment === selectedDepartment;
                    const semesterMatch = selectedSemester === '' || cardSemester === selectedSemester;
                    const titleMatch = titleQuery === '' || cardTitle.includes(titleQuery);

                    if (departmentMatch && semesterMatch && titleMatch) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }

            // Attach event listeners to the filter inputs
            departmentFilter.addEventListener('change', filterCards);
            semesterFilter.addEventListener('change', filterCards);
            titleFilter.addEventListener('input', filterCards);
        });
    </script>
</body>
</html>