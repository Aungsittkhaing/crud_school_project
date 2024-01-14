<?php include('header.php'); ?>
<?php include('../db/dbconnect.php'); ?>


<div class="d-flex justify-content-between mt-3">
    <h4 class="text-uppercase text-black-50">All Students</h4>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#studentModel">Add Student</button>
</div>

<!-- validation -->
<?php
if (isset($_GET['message'])) {
    echo "<h6 class='alert alert-warning'>" . $_GET['message'] . "</h6>";
}
?>
<!-- add data -->
<?php
if (isset($_GET['insert_msg'])) {
    echo "<h6 class='alert alert-primary'>" . $_GET['insert_msg'] . "</h6>";
}
?>
<!-- update data -->
<?php
if (isset($_GET['update_msg'])) {
    echo "<h6 class='alert alert-primary'>" . $_GET['update_msg'] . "</h6>";
}
?>
<!-- delete data -->
<?php
if (isset($_GET['delete_msg'])) {
    echo "<h6 class='alert alert-primary'>" . $_GET['delete_msg'] . "</h6>";
}
?>
<table class="table table-bordered table-hover table-striped mt-3">
    <thead class="">
        <tr>
            <th class="">
                ID
            </th>
            <th class="">
                First Name
            </th>
            <th class="">
                Last Name
            </th>
            <th class="">
                Age
            </th>
            <th>
                Update
            </th>
            <th>
                Delete
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        // selected with all data
        $query = "select * from `students`";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("query failed" . mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr class="">
                    <td class="">
                        <?php echo $row['id']; ?>
                    </td>
                    <td class="">
                        <?php echo $row['first_name']; ?>
                    </td>
                    <td class="">
                        <?php echo $row['last_name']; ?>
                    </td>
                    <td class="">
                        <?php echo $row['age']; ?>
                    </td>
                    <td>
                        <a href="update.php?id=<?php echo $row['id'] ?>" class="btn btn-primary"><i class="bi bi-pencil"></i>
                            Update
                        </a>
                    </td>
                    <td>
                        <a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"><i class="bi bi-trash3"></i>
                            Delete
                        </a>
                    </td>
                </tr>
        <?php

            }
        }
        ?>
    </tbody>
</table>

<form action="insert_data.php" method="post">
    <div class="modal fade" id="studentModel" tabindex="-1" aria-labelledby="studentModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="studentModelLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="fName" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="fName" id="fName" placeholder="first name">
                    </div>
                    <div class="mb-3">
                        <label for="lName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lName" id="lName" placeholder="Last name">
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" name="age" id="age" placeholder="Age">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" name="add_students">Add</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php include('footer.php'); ?>