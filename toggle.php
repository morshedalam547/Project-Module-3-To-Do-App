<?php

define("TASKS_FILE", "tasks.json");

include "function.php";


if(isset($_POST['toggle'])) {
    $tasks[$_POST['toggle']]['done'] = !$tasks[$_POST['toggle']]['done'];
    saveTasks($tasks);
    header('Location: task.php');
    exit;
}