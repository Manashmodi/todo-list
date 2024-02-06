<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_title = $_POST['task_title'];
    $project = $_POST['project'];
    $client = $_POST['client'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $extended = $_POST['extended'];
    $status = $_POST['status'];

    $sql = "INSERT INTO tasks (task_title, project, client, start_date, end_date, extended, status) 
            VALUES ('$task_title', '$project', '$client', '$start_date', '$end_date', '$extended', '$status')";

    if ($conn->query($sql) === TRUE) {
        header("Location: add_task.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<?php
include 'config.php';

// Query to select all tasks from the database
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
          body {
            background-color: #f2f2f2;
            padding: 20px;
            background-image: url();
            background-repeat: no-repeat;
            background-size:cover;
            
        } 
        td{ 
            font-weight:bold;

        } 
        th{ 
            font-weight:bold;

        }

    </style>
    <title>To-Do List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-3">To-Do List</h2>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Task Title</th>
                    <th>Project</th>
                    <th>Client</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Extended</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["task_title"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["project"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["client"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["start_date"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["end_date"]) . "</td>";
                        echo "<td>" . ($row["extended"] ? "Yes" : "No") . "</td>";
                        echo "<td>" . ($row["status"] ? "Completed" : "Not Completed") . "</td>";
                        echo "<td>
                        <a href='mark_completed.php?id=" . $row["id"] . "' class='btn btn-success btn-sm'>Mark Completed</a> 
                         </td>";
                        echo "<td><a href='edit_task.php?id=" . $row["id"] . "' class='btn btn-primary btn-sm'>Edit</a> | <a href='delete_task.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>0 results</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
