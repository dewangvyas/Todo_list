<?php 

require 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Online School UK</title>
    
    <link rel="icon" href="imgs/favicon.jpg" type="image/x-icon">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <div class="todo-container">
        <h1>To-Do List</h1>
        <div class="task-input">
            <input type="text" id="taskInput" placeholder="Add new task">
            <button id="addTaskBtn">Add</button>
        </div>
        <ul id="taskList"></ul>
    </div>

    
</body>
</html>