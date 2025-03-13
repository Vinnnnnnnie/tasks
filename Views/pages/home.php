<?php
include APP_ROOT . '/Views/header.php';
$tasks = $CMS->getTask()->getAll();

?>
<h2>Home</h2>

<?php if (count($tasks) > 0):?>
<div class="task-container">
    <div class="task-list-title">Uncompleted</div>
    <ul class="task-list">
    <?php foreach ($tasks as $task): ?>
        <li id="task-<?=$task['task_id']?>" data-id="<?=$task['task_id']?>" class="task-item">
<!--            <div class="task-options">-->
<!--                <button class="button edit-button">E</button>-->
<!--                <button class="button delete-button">D</button>-->
<!--            </div>-->
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


<script>
    document.addEventListener('submit', (e) => {
        // Store reference to form to make later code easier to read
        const form = e.target;
        console.log(form);
        // Post data using the Fetch API
        fetch(form.action, {
            method: form.method,
            body: new FormData(form),
        });
        form[0].value = '';
        form[1].value = '';
        // Prevent the default form submit
        e.preventDefault();
    });
    $(document).ready(function() {
        $('li.task-item').on('click', function editTask(e) {
            // Edit Function
            let taskTitle = e.currentTarget.children[1].children[0];
            let taskDescription = e.currentTarget.children[1].children[1];

            taskTitle.readOnly = false;
            taskDescription.contentEditable = true;
            taskDescription.classList.toggle('editable');

            taskTitle.focus();
            taskTitle.setSelectionRange(-1,-1);
            $(this).off("click");
            $(this).on("keydown", function saveTask(e) {
                if (e.originalEvent.key === 'Enter')
                {
                    console.log('Title:',taskTitle.value,
                    'Descirption:',taskDescription.innerHTML,
                    'id',$(this).data('id'))
                    // Send save post
                    // This does not work
                    fetch('/task/Controllers/controller.php?action=updateTask', {
                        method: 'POST',
                        body: JSON.stringify({
                            id:$(this).data('id'),
                            name:taskTitle.value,
                            description:taskDescription.innerHTML
                        }),
                    });
                    // This works
                    $.post('/task/Controllers/controller.php?action=updateTask', {
                                id:$(this).data('id'),
                                name:taskTitle.value,
                                description:taskDescription.innerHTML
                            })
                    // read only the items
                    taskTitle.readOnly = true;
                    taskDescription.contentEditable = false;
                    taskDescription.classList.toggle('editable');
                    // reattach editTask handler
                    $('li.task-item').on('click', editTask);
                    $(this).off('keydown');
                }
            })
        })
    })
</script>
<?php
include APP_ROOT . '/Views/footer.php';
?>

