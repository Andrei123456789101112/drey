<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    $conn = mysqli_connect('localhost:3306', 'root', '', 'succession');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $id = $_POST['id'];
    $role = $_POST['role'];
    $achievement = $_POST['achievement'];

    // Check if the applicant already exists
    $sql_check = "SELECT * FROM succession_tbl WHERE id='$id'";
    $result_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        echo "Error: Applicant with this email already exists";
    } else {
        // Insert the new applicant if they don't exist
        $sql_insert = "INSERT INTO succession_tbl (name, id, role, achievement) VALUES ('$name', '$id', '$role', '$achievement')";

        if (mysqli_query($conn, $sql_insert)) {
            // Set session variable for success message
            $_SESSION['success_message'] = "Successor added successfully.";
            // Close database connection
            mysqli_close($conn);
        } else {
            echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Succession Planning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_planning.php">Add Successor</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Add New Successor</h1>
        <form id="successorForm" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Position</label>
                <input type="text" class="form-control" id="role" name="role" required>
            </div>
            <div class="mb-3">
                <label for="achievement" class="form-label">Achievement</label>
                <input type="text" class="form-control" id="achievement" name="achievement" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <?php
    if(isset($_SESSION['success_message'])) {
        ?>
        <div id="successAlert" class="alert alert-success" role="alert" style="display: none; position: absolute; top: 0; left: 0; width: 100vw">
            <?php echo $_SESSION['success_message']; ?>
        </div>
        <script>
            // Display success alert message
            document.getElementById("successAlert").style.display = "block";
            // Redirect after 2 seconds
            setTimeout(function() {
                window.location.href = 'index.php';
            }, 1000);
        </script>
        <?php
        // Unset session variable
        unset($_SESSION['success_message']);
    }
    ?>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>