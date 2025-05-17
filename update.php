<?php include 'connection.php';

$id = $_GET['id'];
$select = "SELECT * FROM student WHERE id='$id'";
$data = mysqli_query($con, $select);
$row = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Student</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Update Student Information</h2>
    <form action="" method="POST" class="bg-white p-4 rounded shadow-sm">
        <div class="mb-3">
            <label class="form-label">First Name</label>
            <input value="<?php echo $row['firstname'] ?>" type="text" name="firstname" class="form-control" placeholder="First Name">
        </div>

        <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" name="lastname" class="form-control" placeholder="Last Name" value="<?php echo $row['lastname'] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="number" name="age" class="form-control" placeholder="Age" value="<?php echo $row['age'] ?>">
        </div>

        <button type="submit" name="update_btn" class="btn btn-primary">Update</button>
        <a href="view.php" class="btn btn-secondary ms-2">Back</a>
    </form>
</div>

<?php
if (isset($_POST['update_btn'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $age = $_POST['age'];

    $update = "UPDATE student SET firstname='$fname', lastname='$lname', age='$age' WHERE id='$id'";
    $data = mysqli_query($con, $update);

    if ($data) {
        echo '<script>
            alert("Data updated successfully");
            window.location.href = "view.php";
        </script>';
    } else {
        echo '<script>
            alert("Please try again");
        </script>';
    }
}
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
