<?php
// Establish database connection
$conn = mysqli_connect('localhost:3306', 'root', '', 'succession');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM succession_tbl";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['role'] . "</td>";
        echo "<td>" . $row['achievement'] . "</td>";
        // Action buttons
        echo "<td>";
        echo "<a href='view_planning.php?id=" . $row['id'] . "' class='btn btn-info'>View</a> ";
        echo "<a href='edit_planning.php?id=" . $row['id'] . "' class='btn btn-primary'>Update</a> ";
        echo "<a href='delete_planning.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No successors found</td></tr>";
}

mysqli_close($conn);
?>