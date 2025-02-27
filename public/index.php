<?php
include '../src/bootstrap.php';

$path = mb_strtolower($_SERVER['REQUEST_URI']);
$path = substr($path, mb_strlen(DOC_ROOT));
$parameters = explode('/', $path);

switch ($parameters[0])
{
    case 'tasks':
        extract($_POST,EXTR_OVERWRITE,'prefix');
        $method = $parameters[1] ?: 'getAll';
        $id = $parameters[2] ?? null;
        $tasks = $CMS->getTask()->{$method}($name, $description);
        return $tasks;
        break;
    case 'controllers':
        $page = 'controllers/' . $path;
        break;
    default:
        $page = $parameters[0] ?: 'home';
        $id = $parameters[1] ?? null;
        break;
}
if ($parameters[0] !== 'tasks')
{
    $page = $parameters[0] ?: 'home';
    $id = $parameters[1] ?? null;
}
else
{
    $method = $parameters[1] ?: 'getAll';
    $id = $parameters[2] ?? null;
    $tasks = $CMS->getTask()->{$method}($id);
}

$php_page = APP_ROOT . '/Views/pages/' . $page . '.php';
if (file_exists($php_page))
{
    include $php_page;
}
else
{
    include APP_ROOT . '/Views/pages/404.php';
}
//switch ($parameters[0])
//{
//    case 'mommy':
//        switch ($parameters[1])
//        {
//            case 'milkers':
//                include APP_ROOT.'/Views/header.php';
//                include APP_ROOT . '/Views/milkers.php';
//                include APP_ROOT.'/Views/footer.php';
//                break;
//        }
//        break;
//    case 'tasks':
//        $method = $parameters[1] ?? 'getAll';
//        $tasks = $CMS->getTask()->{$method}();
//        include APP_ROOT . '/Views/tasklist.php';
//        break;
//    case 'home':
//        include APP_ROOT.'/Views/header.php';
//        include APP_ROOT . '/Views/home.php';
//        include APP_ROOT.'/Views/footer.php';
//        break;
//}

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