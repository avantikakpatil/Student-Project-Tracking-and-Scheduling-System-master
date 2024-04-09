<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('../../php/links.php'); ?>
    <title>Add Mentor</title>
</head>
<body>
    <div class="container-fliud pe-3">
        <div class="row">
            <?php include('../../components/mentorNavbar.php'); ?>
            <div class="col min-vh-100 ps-3">
                <h3 class="pt-3">Add Mentor</h3>
                <form action="insert_mentor.php" method="post">
                    <div class="col-md-4 mb-3">
                        <label for="email" class="form-label">Email Address:</label>
                        <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="phoneNo" class="form-label">Phone Number:</label>
                        <input type="text" name="phoneNo" class="form-control" id="phoneNo">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="dept" class="form-label">Department</label>
                        <select id="dept" name="dept" class="form-select">
                        <option selected>Choose...</option>
                            <option value="Computer Engineering">Computer Engineering</option>
                            <option value="Civil Engineering">Civil Engineering</option>
                            <option value="Electrical Engineering">Electrical Engineering</option>
                            <option value="Mechanical Engineering">Mechanical Engineering</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>