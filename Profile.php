<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>User Profile</title>
    <!-- Add your stylesheet link here -->
    <link rel="stylesheet" href="Profile.css">
</head>
<body>
<div class="container">
<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body pb-0">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="text-center border-end">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-fluid avatar-xxl rounded-circle" alt="">
                            <h4 class="text-primary font-size-20 mt-3 mb-2">Jansh Wells</h4>
                            <h5 class="text-muted font-size-13 mb-0">Web Designer</h5>
                        </div>
                    </div><!-- end col -->
                    <div class="col-md-9">
                        <div class="ms-3">
                            <div>
                                <h4 class="card-title mb-2">Biography</h4>
                                <p class="mb-0 text-muted">Hi I'm Jansh,has been the industry's standard
                                    dummy text To an English person alteration text.</p>
                            </div>
                            <div class="row my-4">
                                <div class="col-md-12">
                                    <div>
                                        <p class="text-muted mb-2 fw-medium"><i class="mdi mdi-email-outline me-2"></i>Janshwells@probic.com
                                        </p>
                                        <p class="text-muted fw-medium mb-0"><i class="mdi mdi-phone-in-talk-outline me-2"></i>418-955-4703
                                        </p>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                         
                            <ul class="nav nav-tabs nav-tabs-custom border-bottom-0 mt-3 nav-justfied" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link px-4 active" data-bs-toggle="tab" href="#projects-tab" role="tab" aria-selected="false" tabindex="-1">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Projects</span>
                                    </a>
                                </li><!-- end li -->
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link px-4"  href="https://bootdey.com/snippets/view/profile-task-with-team-cards" target="__blank" >
                                        <span class="d-block d-sm-none"><i class="mdi mdi-menu-open"></i></span>
                                        <span class="d-none d-sm-block">Tasks</span>
                                    </a>
                                </li><!-- end li -->
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link px-4 "  href="https://bootdey.com/snippets/view/profile-with-team-section" target="__blank" >
                                        <span class="d-block d-sm-none"><i class="mdi mdi-account-group-outline"></i></span>
                                        <span class="d-none d-sm-block">Team</span>
                                    </a>
                                </li><!-- end li -->
                            </ul><!-- end ul -->
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end card body -->
        </div><!-- end card -->

        <div class="card">
            <div class="tab-content p-4">
                <div class="tab-pane active show" id="projects-tab" role="tabpanel">
                    <div class="d-flex align-items-center">
                        <div class="flex-1">
                            <h4 class="card-title mb-4">Projects</h4>
                        </div>
                    </div>

                    <div class="row" id="all-projects">
                        <div class="col-md-6" id="project-items-1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex mb-3">
                                        <div class="flex-grow-1 align-items-start">
                                            <div>
                                                <h6 class="mb-0 text-muted">
                                                    <i class="mdi mdi-circle-medium text-danger fs-3 align-middle"></i>
                                                    <span class="team-date">21 Jun, 2021</span>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="dropdown ms-2">
                                            <a href="#" class="dropdown-toggle font-size-16 text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript: void(0);" data-bs-toggle="modal" data-bs-target=".bs-example-new-project" onclick="editProjects('project-items-1')">Edit</a>
                                                <a class="dropdown-item" href="javascript: void(0);">Share</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item delete-item" onclick="deleteProjects('project-items-1')" data-id="project-items-1" href="javascript: void(0);">Delete</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <h5 class="mb-1 font-size-17 team-title">Marketing</h5>
                                        <p class="text-muted mb-0 team-description">Every Marketing Plan
                                            Needs</p>
                                    </div>
                                    <div class="d-flex">
                                        <div class="avatar-group float-start flex-grow-1 task-assigne">
                                            <div class="avatar-group-item">
                                                <a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" value="member-6" aria-label="Terrell Soto" data-bs-original-title="Terrell Soto">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="rounded-circle avatar-sm">
                                                </a>
                                            </div>
                                            <div class="avatar-group-item">
                                                <a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" value="member-1" aria-label="Ruhi Shah" data-bs-original-title="Ruhi Shah">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="rounded-circle avatar-sm">
                                                </a>
                                            </div>
                                            <div class="avatar-group-item">
                                                <a href="javascript: void(0);" class="d-block" data-bs-toggle="tooltip" data-bs-placement="top" value="member-15" data-bs-original-title="Denny Silva">
                                                    <div class="avatar-sm">
                                                        <div class="avatar-title rounded-circle bg-primary">
                                                            D
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div><!-- end avatar group -->
                                        <div class="align-self-end">
                                            <span class="badge badge-soft-danger p-2 team-status">Pending</span>
                                        </div>
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-md-6" id="project-items-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex mb-3">
                                        <div class="flex-grow-1 align-items-start">
                                            <div>
                                                <h6 class="mb-0 text-muted">
                                                    <i class="mdi mdi-circle-medium text-success fs-3 align-middle"></i>
                                                    <span class="team-date">13 Aug, 2021</span>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="dropdown ms-2">
                                            <a href="#" class="dropdown-toggle font-size-16 text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript: void(0);" data-bs-toggle="modal" data-bs-target=".bs-example-new-project" onclick="editProjects('project-items-2')">Edit</a>
                                                <a class="dropdown-item" href="javascript: void(0);">Share</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item delete-item" href="javascript:void(0);" onclick="deleteProjects('project-items-2')" data-id="project-items-2">Delete</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <h5 class="mb-1 font-size-17 team-title">Website Design</h5>
                                        <p class="text-muted mb-0 team-description">Creating the design
                                            and layout of a
                                            website.</p>
                                    </div>
                                    <div class="d-flex">
                                        <div class="avatar-group float-start flex-grow-1 task-assigne">
                                            <div class="avatar-group-item">
                                                <a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" value="member-10" aria-label="Kelly Osborn" data-bs-original-title="Kelly Osborn">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="rounded-circle avatar-sm">
                                                </a>
                                            </div>
                                            <div class="avatar-group-item">
                                                <a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" value="member-2" aria-label="John Page" data-bs-original-title="John Page">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" class="rounded-circle avatar-sm">
                                                </a>
                                            </div>
                                        </div><!-- end avatar group -->
                                        <div class="align-self-end">
                                            <span class="badge badge-soft-success p-2 team-status">Completed</span>
                                        </div>
                                    </div>
                                </div><!-- end cad-body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-md-6" id="project-items-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex mb-3">
                                        <div class="flex-grow-1 align-items-start">
                                            <div>
                                                <h6 class="mb-0 text-muted">
                                                    <i class="mdi mdi-circle-medium text-warning fs-3 align-middle"></i>
                                                    <span class="team-date">08 Sep, 2021</span>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="dropdown ms-2">
                                            <a href="#" class="dropdown-toggle font-size-16 text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript: void(0);" data-bs-toggle="modal" data-bs-target=".bs-example-new-project" onclick="editProjects('project-items-3')">Edit</a>
                                                <a class="dropdown-item" href="javascript: void(0);">Share</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item delete-item" href="javascript: void(0);" data-id="project-items-3" onclick="deleteProjects('project-items-3')">Delete</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <h5 class="mb-1 font-size-17 team-title">UI / UX Design</h5>
                                        <p class="text-muted mb-0 team-description">Plan and onduct user
                                            research and analysis</p>
                                    </div>
                                    <div class="d-flex">
                                        <div class="avatar-group float-start flex-grow-1 task-assigne">
                                            <div class="avatar-group-item">
                                                <a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" value="member-3" aria-label="Judy Newland" data-bs-original-title="Judy Newland">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" class="rounded-circle avatar-sm">
                                                </a>
                                            </div>
                                            <div class="avatar-group-item">
                                                <a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" value="member-5" aria-label="Jeffery Legette" data-bs-original-title="Jeffery Legette">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="" class="rounded-circle avatar-sm">
                                                </a>
                                            </div>
                                            <div class="avatar-group-item">
                                                <a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" value="member-6" aria-label="Jose Rosborough" data-bs-original-title="Jose Rosborough">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="" class="rounded-circle avatar-sm">
                                                </a>
                                            </div>
                                        </div><!-- end avatar group -->
                                        <div class="align-self-end">
                                            <span class="badge badge-soft-warning p-2 team-status">Progress</span>
                                        </div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-md-6" id="project-items-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex mb-3">
                                        <div class="flex-grow-1 align-items-start">
                                            <div>
                                                <h6 class="mb-0 text-muted">
                                                    <i class="mdi mdi-circle-medium text-danger fs-3 align-middle"></i>
                                                    <span class="team-date">20 Sep, 2021</span>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="dropdown ms-2">
                                            <a href="#" class="dropdown-toggle font-size-16 text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript: void(0);" data-bs-toggle="modal" data-bs-target=".bs-example-new-project" onclick="editProjects('project-items-4')">Edit</a>
                                                <a class="dropdown-item" href="javascript: void(0);">Share</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item delete-item" href="javascript:void(0);" data-id="project-items-4" onclick="deleteProjects('project-items-4')">Delete</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <h5 class="mb-1 font-size-17 team-title">Testing</h5>
                                        <p class="text-muted mb-0 team-description">The procurement
                                            specifications should
                                            describe</p>
                                    </div>
                                    <div class="d-flex">
                                        <div class="avatar-group float-start flex-grow-1 task-assigne">
                                            <div class="avatar-group-item">
                                                <a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" value="member-10" aria-label="Jansh Wells" data-bs-original-title="Jansh Wells">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="rounded-circle avatar-sm">
                                                </a>
                                            </div>
                                        </div><!-- end avatar group -->
                                        <div class="align-self-end">
                                            <span class="badge badge-soft-danger p-2 team-status">Pending</span>
                                        </div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-md-6" id="project-items-5">
                            <div class="card mb-lg-0">
                                <div class="card-body">
                                    <div class="d-flex mb-3">
                                        <div class="flex-grow-1 align-items-start">
                                            <div>
                                                <h6 class="mb-0 text-muted">
                                                    <i class="mdi mdi-circle-medium text-success fs-3 align-middle"></i>
                                                    <span class="team-date">12 April, 2021</span>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="dropdown ms-2">
                                            <a href="#" class="dropdown-toggle font-size-16 text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript: void(0);" data-bs-toggle="modal" data-bs-target=".bs-example-new-project" onclick="editProjects('project-items-5')">Edit</a>
                                                <a class="dropdown-item" href="javascript: void(0);">Share</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item delete-item" onclick="deleteProjects('project-items-5')" data-id="project-items-5" href="javascript: void(0);">Delete</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <h5 class="mb-1 font-size-17 team-title">Typography</h5>
                                        <p class="text-muted mb-0 team-description">Typography is the
                                            style or appearance
                                            of text.</p>
                                    </div>
                                    <div class="d-flex">
                                        <div class="avatar-group float-start flex-grow-1 task-assigne">
                                            <div class="avatar-group-item">
                                                <a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" value="member-1" aria-label="Ruhi Luft" data-bs-original-title="Ruhi Luft">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="rounded-circle avatar-sm">
                                                </a>
                                            </div>
                                            <div class="avatar-group-item">
                                                <a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" value="member-5" aria-label="Elias Hardage" data-bs-original-title="Elias Hardage">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="" class="rounded-circle avatar-sm">
                                                </a>
                                            </div>
                                            <div class="avatar-group-item">
                                                <a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" value="member-10" aria-label="Jansh Wells" data-bs-original-title="Jansh Wells">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="rounded-circle avatar-sm">
                                                </a>
                                            </div>
                                        </div><!-- end avatar group -->
                                        <div class="align-self-end">
                                            <span class="badge badge-soft-success p-2 team-status">Completed</span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end tab pane -->
            </div>
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="pb-2">
                    <h4 class="card-title mb-3">About</h4>
                    <p>Hi I'm Jansh, has been the industry's standard dummy text To an English
                        person, it will seem like
                        simplified.</p>
                    <ul class="ps-3 mb-0">
                        <li>it will seem like simplified.</li>
                        <li>To achieve this, it would be necessary to have uniform pronunciation</li>
                    </ul>
                    <!-- end ul -->
                </div>
                <hr>
                <div class="pt-2">
                    <h4 class="card-title mb-4">My Skill</h4>
                    <div class="d-flex gap-2 flex-wrap">
                        <span class="badge badge-soft-secondary p-2">HTML</span>
                        <span class="badge badge-soft-secondary p-2">Bootstrap</span>
                        <span class="badge badge-soft-secondary p-2">Scss</span>
                        <span class="badge badge-soft-secondary p-2">Javascript</span>
                        <span class="badge badge-soft-secondary p-2">React</span>
                        <span class="badge badge-soft-secondary p-2">Angular</span>
                    </div>
                </div>
            </div><!-- end cardbody -->
        </div><!-- end card -->

        <div class="card">
            <div class="card-body">
                <div>
                    <h4 class="card-title mb-4">Personal Details</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td>Jansh Wells</td>
                                </tr><!-- end tr -->
                                <tr>
                                    <th scope="row">Location</th>
                                    <td>California, United States</td>
                                </tr><!-- end tr -->
                                <tr>
                                    <th scope="row">Language</th>
                                    <td>English</td>
                                </tr><!-- end tr -->
                                <tr>
                                    <th scope="row">Website</th>
                                    <td>abc12@probic.com</td>
                                </tr><!-- end tr -->
                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->

        <div class="card">
            <div class="card-body">
                <div>
                    <h4 class="card-title mb-4">Work Experince</h4>
                    <ul class="list-unstyled work-activity mb-0">
                        <li class="work-item" data-date="2020-21">
                            <h6 class="lh-base mb-0">ABCD Company</h6>
                            <p class="font-size-13 mb-2">Web Designer</p>
                            <p>To achieve this, it would be necessary to have uniform grammar, and more
                                common words.</p>
                        </li>
                        <li class="work-item" data-date="2019-20">
                            <h6 class="lh-base mb-0">XYZ Company</h6>
                            <p class="font-size-13 mb-2">Graphic Designer</p>
                            <p class="mb-0">It will be as simple as occidental in fact, it will be
                                Occidental person, it will seem like simplified.</p>
                        </li>
                    </ul><!-- end ul -->
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div>
</div>
</body>
<?php
// Sample data for demonstration purposes. You should replace this with your data fetching logic.
$userProfile = array(
    'name' => 'Jansh Wells',
    'designation' => 'Web Designer',
    'bio' => "Hi, I'm Jansh, has been the industry's standard dummy text. To an English person, it will seem like simplified.",
    'email' => 'Janshwells@probic.com',
    'phone' => '418-955-4703',
    'location' => 'California, United States',
    'language' => 'English',
    'skills' => array('HTML', 'Bootstrap', 'Scss', 'Javascript', 'React', 'Angular'),
    'workExperience' => array(
        array(
            'company' => 'ABCD Company',
            'position' => 'Web Designer',
            'description' => 'To achieve this, it would be necessary to have uniform grammar, and more common words.',
            'date' => '2020-21'
        ),
        array(
            'company' => 'XYZ Company',
            'position' => 'Graphic Designer',
            'description' => 'It will be as simple as occidental, in fact, it will be Occidental person, it will seem like simplified.',
            'date' => '2019-20'
        )
    )
);

// Check if the form is submitted for editing details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission here (update database or perform necessary actions)
    // For demonstration, I'll just update the email address in the sample data
    $newEmail = $_POST['email'];
    $userProfile['email'] = $newEmail;
}

// Function to display skills
function displaySkills($skills)
{
    foreach ($skills as $skill) {
        echo '<span class="badge badge-soft-secondary p-2">' . $skill . '</span>';
    }
}

// Function to display work experience
function displayWorkExperience($workExperience)
{
    echo '<ul class="list-unstyled work-activity mb-0">';
    foreach ($workExperience as $work) {
        echo '<li class="work-item" data-date="' . $work['date'] . '">';
        echo '<h6 class="lh-base mb-0">' . $work['company'] . '</h6>';
        echo '<p class="font-size-13 mb-2">' . $work['position'] . '</p>';
        echo '<p>' . $work['description'] . '</p>';
        echo '</li>';
    }
    echo '</ul>';
}
?>


</html>
