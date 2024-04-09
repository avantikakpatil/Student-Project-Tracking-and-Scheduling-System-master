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
                <?php include("../../components/subjectInchargeNavbar.php");?>
                <div class="col min-vh-100 m-2">
                    <h3>Create Session</h3>
                    <form class="row g-3" action="add_session.php" method="post" enctype="multipart/form-data">
                        <div class="col-md-4">
                            <label class="form-label">Session Title</label>
                            <input class="form-control" type="text" placeholder="Ex: Mini-Project I, Seminar II" id="title" name="title">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Branch</label>
                            <input class="form-control" type="text" placeholder="Ex: Computer Engineering" id="branch" name="branch">
                        </div>
                        <div class="col-md-4">
                            <label for="sem" class="form-label">Semester</label>
                            <select id="sem" name="sem" class="form-select">
                            <option selected>Choose...</option>
                                <option value="Sem I">I</option>
                                <option value="Sem II">II</option>
                                <option value="Sem III">III</option>
                                <option value="Sem IV">IV</option>
                                <option value="Sem V">V</option>
                                <option value="Sem VI">VI</option>
                                <option value="Sem VII">VII</option>
                                <option value="Sem VIII">VIII</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Section</label>
                            <select id="sec" name="sec" class="form-select" type="text">
                                <option selected>Choose...</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="file" class="form-label">CSV File</label>
                            <input class="form-control" type="file" id="file" name="file">
                        </div>
                        <div class="col-md-4">
                            <label for="date" class="form-label">Date of Creation</label>
                            <input class="form-control" type="date" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" />
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>