<?php 
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "UPDATE tasks SET status=1 WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: add_task.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
