<?php
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Establish database connection
    $conn = mysqli_connect('localhost:3306', 'root', '', 'succession');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id = $_GET['id'];

    $sql = "DELETE FROM succession_tbl WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
