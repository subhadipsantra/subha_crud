<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

   
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #343a40;
        }

        .btn-primary {
            width: 100px;
        }

        .btn-secondary {
            width: 100px;
        }

        input::placeholder {
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="form-container">
            <h2 class="mb-4">Student Form</h2>
            <form action="" method="POST">
                <div class="mb-3">
                    <input type="text" name="firstname" class="form-control" placeholder="First Name" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="lastname" class="form-control" placeholder="Last Name" required>
                </div>
                <div class="mb-3">
                    <input type="number" name="age" class="form-control" placeholder="Age" required>
                </div>
                <div class="d-flex justify-content-between">
                    <input type="submit" name="save_btn" value="Save" class="btn btn-primary">
                    <a href="view.php" class="btn btn-secondary">View</a>
                </div>
            </form>
        </div>
    </div>

<?php
if (isset($_POST['save_btn'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $age = $_POST['age'];

    $query = "INSERT INTO student (firstname, lastname, age) VALUES ('$fname', '$lname', '$age')";
    $data = mysqli_query($con, $query);

    if ($data) {
        echo "<script>alert('Data Saved Successfully');</script>";
    } else {
        echo "<script>alert('Please try again');</script>";
    }
}
?>
</body>
</html>
