<?php
    session_start();

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        echo "Session ID not found in the session.";
    }
?>

<div class="col-auto col-md-3 col-xl-1 px-sm-1 px-0 bg-dark sticky-top">
    <div class="d-flex flex-column align-items-middle align-items-middle px-3 pt-2 text-white min-vh-100 position-fixed">
        <a href="#" class="d-flex align-items-middle p-2 pb-5 mb-md-0 me-md-auto text-white text-decoration-none">
            <img src="../../assests/images/bitlogo_transparent.png" alt="img" style="width: 50px">
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-middle" id="menu">
            <li class="nav-item pb-3">
                <a href="../student/studentDashboard.php?user_id=<?php echo $user_id; ?>" class="nav-link align-middle px-0">
                    <i class="fa-solid fa-house fs-2" style="color: white" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard"></i><span class="ms-1 d-none d-sm-inline"></span>
                </a>
            </li>
            <li class="nav-item pb-3">
                <a href="request_meeting.php" class="nav-link align-middle px-0">
                    <i class="fa-solid fa-calendar-days fs-2" style="color: white" data-bs-toggle="tooltip" data-bs-placement="right" title="Request Meeting"></i><span class="ms-1 d-none d-sm-inline"></span>
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown p-3 pt-1">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../../assests/images/icon _User Cog_.svg" alt="img" width="30">
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <!-- <li><a class="dropdown-item" href="#">New project...</a></li> -->
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="../../php/logout.php">Sign out</a></li>
            </ul>
        </div>
    </div>
</div>