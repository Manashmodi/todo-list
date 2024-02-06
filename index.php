<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-image: url('https://i.ibb.co/x679tJ4/mjlk7.jpg');
            background-repeat: no-repeat;
            background-size:cover;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="%23444444" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M7 10l5 5 5-5z" /></svg>');
            background-repeat: no-repeat;
            background-position-x: calc(100% - 12px);
            background-position-y: center;
        }
        input[type="submit"],
        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover,
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>To-Do List</h2>
        <h2>Add New Task</h2>
        <!-- Add Task Form -->
        <form action="add_task.php" method="post">
            <label for="task_title">Task Title:</label>
            <input type="text" id="task_title" name="task_title" required>

            <label for="project">Project:</label>
            <input type="text" id="project" name="project" required>

            <label for="client">Client:</label>
            <input type="text" id="client" name="client" required>

            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" required>

            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" required>

            <label for="extended">Extended:</label>
            <select id="extended" name="extended">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>

            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="1">Completed</option>
                <option value="0">Not Completed</option>
            </select>

            <center><input type="submit" value="Update Task"></center>
        </form>
    </div>
</body>
</html>
