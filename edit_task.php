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
    $task_id = $_POST['task_id']; // Hidden input field in the form

    $sql = "UPDATE tasks SET 
            task_title = '$task_title',
            project = '$project',
            client = '$client',
            start_date = '$start_date',
            end_date = '$end_date',
            extended = '$extended',
            status = '$status'
            WHERE id = '$task_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: add_task.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Fetch task details based on task ID
    if(isset($_GET['id'])) {
        $task_id = $_GET['id'];
        $sql = "SELECT * FROM tasks WHERE id = '$task_id'";
        $result = $conn->query($sql);
        $task = $result->fetch_assoc();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f2f2f2;
            padding: 20px;
            background-image: url('https://i.ibb.co/x679tJ4/mjlk7.jpg');
            background-repeat: no-repeat;
            background-size:cover;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        } 
        label{
            font-weight:bold;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            font-weight:bold;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
            font-weight:bold;
        }
        .container{
            width:40%;

        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Edit Task</h2>
        <form action="edit_task.php" method="post">
            <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
            <div class="mb-3">
                <label for="task_title" class="form-label">Task Title:</label>
                <input type="text" id="task_title" name="task_title" value="<?php echo $task['task_title']; ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="project" class="form-label">Project:</label>
                <input type="text" id="project" name="project" value="<?php echo $task['project']; ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="client" class="form-label">Client:</label>
                <input type="text" id="client" name="client" value="<?php echo $task['client']; ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date:</label>
                <input type="date" id="start_date" name="start_date" value="<?php echo $task['start_date']; ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">End Date:</label>
                <input type="date" id="end_date" name="end_date" value="<?php echo $task['end_date']; ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="extended" class="form-label">Extended:</label>
                <select id="extended" name="extended" class="form-select">
                    <option value="1" <?php if($task['extended']) echo 'selected'; ?>>Yes</option>
                    <option value="0" <?php if(!$task['extended']) echo 'selected'; ?>>No</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select id="status" name="status" class="form-select">
                    <option value="1" <?php if($task['status']) echo 'selected'; ?>>Completed</option>
                    <option value="0" <?php if(!$task['status']) echo 'selected'; ?>>Not Completed</option>
                </select>
            </div>

           <center> <button type="submit" class="btn btn-primary">Update Task</button> </center>
        </form>
    </div>
    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


