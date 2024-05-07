<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Succession Planning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for changing navbar color */
        .navbar-custom {
            background-color: white; /* Change this color code to your desired color */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container">
        <a class="navbar-brand" href="index.php"><img src="bomba.png" alt="ATS Logo" height="100" width="100"></a>
            <a class="navbar-brand" href="index.php">Succession Planning</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="planning.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_planning.php">Add New </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    // Establish database connection
    $conn = mysqli_connect('localhost:3306', 'root', '', 'succession');

    // Check connection
    if (!$conn) {
        die("Connection failed: ". mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $role = $_POST['role'];
        $achievement = $_POST['achievement'];

        // Check if the updated email already exists for another applicant
        $sql_check = "SELECT * FROM succession_tbl WHERE role='$role' AND id!= $id";
        $result_check = mysqli_query($conn, $sql_check);

        if (mysqli_num_rows($result_check) > 0) {
            echo "Error: Another applicant with this email already exists";
        } else {
            // Update the applicant if no duplicate email is found
            $sql = "UPDATE succession_tbl SET name='$name', role='$role', achievement='$achievement' WHERE id=$id";

            if (mysqli_query($conn, $sql)) {
                header("Location: index.php?id=$id");
                exit();
            } else {
                echo "Error: ". $sql. "<br>". mysqli_error($conn);
            }
        }
    }

    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM succession_tbl WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Application not found";
            exit();
        }
    } else {
        echo "Invalid application ID";
        exit();
    }

    mysqli_close($conn);
   ?>

    <div class="container mt-5">
        <h1 class="mb-4">Edit Application</h1>
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'];?>" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Position</label>
                <input type="text" class="form-control" id="role" name="role" value="<?php echo $row['role'];?>" required>
            </div>
            <div class="mb-3">
                <label for="achievement" class="form-label">Achievement</label>
                <input type="text" class="form-control" id="achievement" name="achievement" value="<?php echo $row['achievement'];?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>