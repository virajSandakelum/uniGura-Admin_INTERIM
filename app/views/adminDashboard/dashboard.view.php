<?php
session_start();

// user not logged in
// (this is means, user is not logged in)
if (!isset($_SESSION['session_email'])) {
    header("location:" . ROOT . "/public/Login");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/401cc96be7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo ROOT?>/public/assets/css/dashboard.css">
    <title>Uni-Gura-Dashboard</title>
</head>

<body>

    <nav>
        <div class="nav-left">
            <img src="<?php echo ROOT?>/public/assets/images/adminDashboard/logo.png" alt="logo">
        </div>

        <div class="nav-middle">
            <h4>Hello! <span class="admin_name"><?php
                                                if (isset($_SESSION['session_username'])) {
                                                    echo $_SESSION['session_username'];
                                                }
                                                ?></span></h4>
        </div>

        <div class="nav-right">
            <div class="profile">
                <img src="<?php echo ROOT?>/public/assets/images/adminDashboard/profile.png" alt="profile" class="dropdownBtn">
                
                <div class="dropdown_content">
                    <a href="#">Profile</a>
                    <a href="#">Settings</a>
                    <a href="<?php echo ROOT?>/public/Logout">Logout</a>
                </div>
            </div>
            <div class="notifiaction">
                <img src="<?php echo ROOT ?>/public/assets/images/adminDashboard/notification.png" alt="notification">
            </div>
        </div>
    </nav>



    <div class="container">

        <div class="menu_btn">

            <a href="#">
                <div class="tutors">
                    <div class="details">
                        <h2>TUTORS</h2>
                        <h2>- 00 -</h2>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-person-chalkboard"></i>
                    </div>
                </div>
            </a>

            <a href="#">
                <div class="students">
                    <div class="details">
                        <h2>STUDENTS</h2>
                        <h2>- 00 -</h2>
                    </div>
                    <div class="icon">
                        <i class="fa fa-light fa-graduation-cap"></i>
                    </div>
                </div>
            </a>

            <a href="#">
                <div class="classes">
                    <div class="details">
                        <h2>CLASSES</h2>
                        <h2>- 00 -</h2>
                    </div>
                    <div class="icon">
                        <i class="fa fa-school"></i>
                    </div>
                </div>
            </a>

            <a href="AddNewSubject">
                <div class="subjects">
                    <div class="details">
                        <h2>SUBJECTS</h2>
                        <h2>- 0<?php 
                            $subject = new Subject;
                            $result = $subject->findAll();

                            $count = 0;

                            foreach ($result as $key => $subject) {
                                $count++;
                            }
                            echo $count;
                            
                        ?> -</h2>
                    </div>
                    <div class="icon">
                        <i class="fa fa-light fa-book"></i>
                    </div>
                </div>
            </a>

        </div>


        <div class="new-approvals">
            <h2>New Approvals</h2>

            <div class="approvals_not_available">
                <img src="<?php echo ROOT?>/public/assets/images/adminDashboard/approvals.png" alt=""><br>
                <h3>Recent Approvals Not Available</h3>
            </div>

            <!-- <div class="name">
                <h3>Name</h3>
            </div> -->
        </div>


        <div class="current-classes">
            <div class="selectDate">
                <input type="date">
                <h3>00</h3>
            </div>

            <div class="classes_not_available">
                <img src="<?php echo ROOT?>/public/assets/images/adminDashboard/not_availble_classes.png" alt=""><br>
                <h3>Current Classes Not Available</h3>
            </div>

            <!-- <div class="name">
                <h3>Name</h3>
            </div> -->
        </div>



        <div class="payment">

            <div class="paymentDate">
                <h3>Payments</h3>
                <input type="date">
            </div>

            <div class="payment_details">
                <img src="<?php echo ROOT?>/public/assets/images/adminDashboard/payment.png" alt=""><br>
                <div class="total_payment">
                    <h3>Total Payment</h3>
                    <h3>Rs. 000.00</h3>
                </div>
            </div>


            <!-- <div class="name">
                <h3>Name</h3>
            </div> -->

        </div>



        <div class="complaints">
            <h2>COMPLAINTS</h2>

            <div class="complaints_not_available">
                <img src="<?php echo ROOT?>/public/assets/images/adminDashboard/complaints.png" alt=""><br>
                <h3>Complaints Not Available</h3>
            </div>

            <!-- <div class="name">
                <h3>Name</h3>
            </div> -->

        </div>

    </div>



</body>

</html>