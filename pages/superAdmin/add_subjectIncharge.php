<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Session.css">
    <?php require('../../php/links.php'); ?>
    <title>Create Session</title>
</head>
<body>
    <section>
        <div class="container-fluid">
            <div class="row">
                <?php include("../../components/superAdminNavbar.php");?>
                <div class="col min-vh-100 m-2">
                    <h3 class="mb-4">Create Session</h3>
                    <form action="utils/insert_subjectIncharge.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Subject Incharge Email</label>
                            <input class="form-control" type="text" id="email" name="email">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Name</label>
                            <input class="form-control" type="text" id="name" name="name">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="sem" class="form-label">Choose Department</label>
                            <select id="dept" name="dept" class="form-select">
                                <option selected>Choose...</option>
                                <option value="Computer Engineering">Computer Engineering</option>
                                <option value="Electrical Engineering">Electrical Engineering</option>
                                <option value="Civil Engineering">Civil Engineering</option>
                                <option value="Mechanical Engineering">Mechanical Engineering</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Add Subject Incharge</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>