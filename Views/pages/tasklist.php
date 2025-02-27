<?php
include 'header.php';
foreach($tasks as $task):
?>
<tr>
    <td><?=$task['task_id']?></td>
    <td><?=$task['name']?></td>
    <td><?=$task['description']?></td>
    <td><?=$task['status']?></td>
</tr>
<?php endforeach;
include 'footer.php';
?>
