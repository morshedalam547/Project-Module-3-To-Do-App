<?php


define("TASKS_FILE", "tasks.json");

include "function.php";




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['task']) && !empty(trim($_POST['task']))) {
        $tasks[] = [
            "task" => htmlspecialchars(trim($_POST['task'])),
            "done" => false
        ];

        saveTasks($tasks);
        header('Location: task.php');
        exit;
    } 
    


}

?>



<!-- UI -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">


</head>
<body>
    <div class="container">
        <div class="task-card">
            <h1 class="text-center">To-Do App</h1>

            <!-- Add Task Form -->
            <form  method="POST"   class="mb-4">
                <div class="row mb-3">
                    <div class="col-md-9">
                        <input type="text" name="task" class="form-control" placeholder="Enter a new task" required>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary w-100">Add Task</button>
                    </div>
                </div>
            </form>

            <!-- Task List -->
            <h2>Task List</h2>
            <ul class="list-unstyled">
                <?php if (empty($tasks)): ?>
                    <li>No tasks yet. Add one above!</li>
                <?php else: ?>
                    <?php foreach ($tasks as $index => $task): ?>
                        <li class="task-item">
                            <form action ="delete.php" method="POST"  style="flex-grow: 1;">
                                <input type="hidden" name="toggle" value="<?= $index ?>">
                                <button type="submit" class="btn btn-link w-100 text-start" style="border: none; background: none;">
                                    <span class="task <?= $task['done'] ? 'task-done' : '' ?>">
                                        <?= $task['task'] ?>
                                    </span>
                                </button>
                            </form>

                            <form action ="delete.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="delete" value="<?= $index ?>">
                                <button type="submit" class="btn btn-outline-danger ms-2">Delete</button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>

        </div>
    </div>

</body>
</html>
