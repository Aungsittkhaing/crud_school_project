<?php
include('../db/dbconnect.php');
if (isset($_POST['add_students'])) {
    $fname = $_POST['fName'];
    $lname = $_POST['lName'];
    $age = $_POST['age'];

    if ($fname == "" || empty($fname)) {
        header('location:index.php?message=you need to fill first name!');
    } else {
        $query = "insert into  `students` (`first_name`, `last_name`, `age`) values ('$fname', '$lname','$age')";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("query failed!" . mysqli_error($connection));
        } else {
            header('location:index.php?insert_msg=your data has been added!');
        }
    }
}
