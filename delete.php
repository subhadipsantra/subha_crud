<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Student</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php
include 'connection.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $con->prepare("DELETE FROM student WHERE id = ?");
    $stmt->bind_param("i", $id);
    $success = $stmt->execute();

    if ($success) {
        echo "<script>
            alert('Data deleted successfully');
            window.location.href = 'http://localhost/demo/view.php';
        </script>";
    } else {
        echo "<script>
            alert('Please try again');
        </script>";
    }

    $stmt->close();
} else {
    echo "<div class='alert alert-danger text-center m-4'>Invalid ID</div>";
}
?>

</body>
</html>

