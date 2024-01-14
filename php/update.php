<?php include('header.php'); ?>
<?php include('../db/dbconnect.php'); ?>

<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    //selected id with each other
    $query = "select * from `students` where `id` = '$id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("query failed" . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}

?>

<?php
if (isset($_POST['update_students'])) {
    if (isset($_GET['id_new'])) {
        $idnew = $_GET['id_new'];
    }
    $fname = $_POST['fName'];
    $lname = $_POST['lName'];
    $age = $_POST['age'];

    $query = "update `students` set `first_name` = '$fname', `last_name` = '$lname', `age` = '$age' where `id` = '$idnew'";
    $result = mysqli_query($connection, $query);
    print_r($result);

    if (!$result) {
        die("query failed" . mysqli_error($connection));
    } else {
        header('location:index.php?update_msg=you have successfully updated the data');
    }
}
?>

<form action="update.php?id_new=<?php echo $id; ?>" class="mt-2" method="post">
    <div class="mb-3">
        <label for="fName" class="form-label">First Name</label>
        <input type="text" class="form-control" name="fName" id="fName" value="<?php echo $row['first_name']; ?>" placeholder="first name">
    </div>
    <div class="mb-3">
        <label for="lName" class="form-label">Last Name</label>
        <input type="text" class="form-control" name="lName" value="<?php echo $row['last_name']; ?>" id="lName" placeholder="Last name">
    </div>
    <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input type="number" class="form-control" name="age" value="<?php echo $row['age']; ?>" id="age" placeholder="Age">
    </div>
    <button type="button" class="btn btn-secondary">Close</button>
    <button type="submit" class="btn btn-success" name="update_students">Update</button>
</form>

<?php include('footer.php'); ?>