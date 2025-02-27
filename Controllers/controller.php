<?php
include '../src/bootstrap.php';
?>
<script>console.log('made it here')</script>
<?php
$action = $_GET['action'] ?? null;
switch($_GET['action'])
{
    case 'addTask':
        $name = $_POST['name'] ?? null;
        $description = $_POST['description'] ?? null;
        $result = $CMS->getTask()->addTask($name, $description);
        return $result;
        break;
}