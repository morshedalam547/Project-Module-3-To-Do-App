<?php
define("TASKS_FILE", "tasks.json");

include "function.php";


     if(isset($_POST['delete'])) {
        unset($tasks[$_POST['delete']]);
        $tasks = array_values($tasks);
        saveTasks($tasks);
        header('Location: index.php');
        exit;
    }