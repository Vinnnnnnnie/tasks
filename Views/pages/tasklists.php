<?php
include_once  '/var/www/html/task/src/bootstrap.php';
$tasks = $CMS->getTask()->getAll();

$tasklists = [$tasks];
//foreach ($tasklists as $list):

if (count($tasks) > 0):?>
<div id="tasklist-0" class="task-container">
    <div class="task-list-title">Tasklist Title</div>
    <ul class="task-list">
        <?php foreach ($tasks as $task): ?>
            <li id="task-<?=$task['task_id']?>" data-id="<?=$task['task_id']?>" class="task-item">
                <input type="checkbox" class="check-task">
                <div class="task-details">
                    <input readonly class="task-title" value="<?=$task['name']?>">
                    <div contenteditable="false" class="task-description"><?=$task['description']?></div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>

    <!--</table>-->
    <?php else:?>
        <div>No tasks to be found</div>
    <?php endif;?>
    <form class="task-form" method="post" action="<?=DOC_ROOT?>Controllers/controller.php?action=addTask">
        <div class="task-item">
            <div class="task-details">
                <input type="text" placeholder="Name" name="name">
                <textarea  placeholder="Description" name="description"></textarea>
            </div>
            <input type="submit" class="add-task" value="+">
        </div>
    </form>
</div>
