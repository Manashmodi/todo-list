<?php 
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM tasks WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: add_task.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
