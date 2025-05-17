<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    >
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            vertical-align: middle !important;
        }

        .table thead th {
            text-align: center;
        }

        .table td {
            text-align: center;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-warning, .btn-danger {
            width: 80px;
        }

        .btn-warning:hover {
            background-color: #ffc107;
            color: black;
        }

        .btn-danger:hover {
            background-color: #dc3545;
        }
    </style>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <a href="index.php" class="btn btn-primary mb-3">Home</a>

        <h2 class="mb-4">Student Records</h2>
        
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM student";
                $data = mysqli_query($con, $query);
                $result = mysqli_num_rows($data);

                if ($result) {
                    while ($row = mysqli_fetch_array($data)) {
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['firstname']); ?></td>
                            <td><?php echo htmlspecialchars($row['lastname']); ?></td>
                            <td><?php echo htmlspecialchars($row['age']); ?></td>
                            <td>
                                <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                            <td>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="5" class="text-center">No Records Found</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
