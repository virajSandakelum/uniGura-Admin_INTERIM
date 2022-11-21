<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/401cc96be7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo ROOT ?>/public/assets/css/addNewSubject.css">
    <title>Uni-Gura-Subject</title>
</head>

<body>

    <nav>
        <div class="nav-left">
            <a href="Dashboard"><img src="<?php echo ROOT ?>/public/assets/images/addNewSubject/logo.png" alt="logo"></a>
        </div>

        <div class="nav-right">
            <div class="profile">
                <img src="<?php echo ROOT ?>/public/assets/images/addNewSubject/profile.png" alt="profile">
            </div>
            <div class="notifiaction">
                <img src="<?php echo ROOT ?>/public/assets/images/addNewSubject/notification.png" alt="notification">
            </div>
        </div>
    </nav>


    <div class="container">
        <h2>Add New Subject</h2><br><br>

        <div class="form">
            <form action="AddNewSubject/addNewSubject" method="POST">
                <label for="">Subject Name<span> *
                        <?php
                        if (isset($_GET['error'])) {
                            if ($_GET['error'] == "inputsEmpty") {
                                echo "Fill the fields";
                            }
                        }
                        ?>
                    </span></label>
                <br>
                <input type="text" name="subjectName" placeholder="Type the Subject Name..." autofocus>
                <br><br>

                <button type="submit" name="add_subject">Subject <i class="fa fa-solid fa-plus"></i></button>
            </form>
        </div>


        <table class="subject_tables">
            <tr>
                <th>Subject ID</th>
                <th>Subject Name</th>
                <th></th>
            </tr>

            <?php

            $subject = new Subject;

            $result = $subject->findAll();


            for ($i = 0; $i < count($result); $i++) {
                echo '<tr>';
                echo '<td>' . $result[$i]['subject_id'] . '</td>';
                echo '<td>' . $result[$i]['subject_name'] . '</td>';
                echo "<td><a href='DeleteSubject?subject_id=" . $result[$i]['subject_id'] . "'>Delete&nbsp&nbsp&nbsp<i class='fa fa-regular fa-trash'></i></a></td>";
                echo '</tr>';
            }
            ?>
        </table>


    </div>


</body>

</html>