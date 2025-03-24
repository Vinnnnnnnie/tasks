<?php
include '../src/bootstrap.php';
$action = $_GET['action'] ?? null;
switch($_GET['action']) {
    case 'addTask':
        $name = $_POST['name'] ?? null;
        $description = $_POST['description'] ?? null;
        $result = $CMS->getTask()->addTask($name, $description);
        return $result;
        break;
    case 'deleteTask':
        $id = $_GET['id'] ?? null;
        $result = $CMS->getTask()->deleteTask($id);
        return $result;
        break;
    case 'updateTask':
        print_rr($_POST);
        print_rr($_REQUEST);
        $id = $_POST['id'] ?? null;
        $name = $_POST['name'] ?? null;
        $description = $_POST['description'] ?? null;
        $result = $CMS->getTask()->updateTask($id, $name, $description);
        return $result;
        break;
    case 'getTasks':
        $tasks = $CMS->getTask()->getAll();
        $tasklists = [$tasks];
        foreach ($tasklists as $list):
            include APP_ROOT . '/Views/pages/tasklists.php';
        endforeach;

        break;
}