<?php
$conn = mysqli_connect('localhost:3306', 'root', '', 'succession');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM succession_tbl WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        
        // HTML content can be placed here
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Successor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background-color: white; 
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

    <div class="container mt-5">
        <h1>Details</h1>
        <table class="table">
            <tr>
                <th>Name:</th>
                <td><?php echo $row['name']; ?></td>
            </tr>
            <tr>
                <th>Position:</th>
                <td><?php echo $row['role']; ?></td>
            </tr>
            <tr>
                <th>Achievement:</th>
                <td><?php echo $row['achievement']; ?></td>
            </tr>
        </table>
        <a href="index.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Back</a>
    </div>
</body>
</html>

<?php
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
