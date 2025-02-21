<?php
include '../src/bootstrap.php';

$path = mb_strtolower($_SERVER['REQUEST_URI']);

$path = substr($path, mb_strlen(DOC_ROOT));
$parameters = explode('/', $path);

switch ($parameters[0])
{
    case 'mommy':
        switch ($parameters[1])
        {
            case 'milkers':
                include APP_ROOT.'/Views/header.php';
                include APP_ROOT.'/Views/milkers.php';
                include APP_ROOT.'/Views/footer.php';
                break;
        }
        break;
    case 'tasks':
        $method = $parameters[1] ?? 'getAll';
        $tasks = $CMS->getTask()->{$method}();
        include APP_ROOT.'/Views/tasklist.php';
        break;
    case 'home':
        include APP_ROOT.'/Views/header.php';
        include APP_ROOT.'/Views/home.php';
        include APP_ROOT.'/Views/footer.php';
}

//$task = $CMS->getTask()->getTaskFromId(1);
//
//?>
<!--<h1>Results</h1>-->
<!--<div>-->
<!--    --><?php //=$task['task_id']?>
<!--    --><?php //=$task['name']?>
<!--    --><?php //=$task['description']?>
<!--    --><?php //=$task['status']?>
<!--</div>-->
<!---->
<!--<form action="task/add">-->
<!---->
<!--</form>-->