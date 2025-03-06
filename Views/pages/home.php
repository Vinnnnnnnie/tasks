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
        <li class="task-item">
            <div class="task-details">
                <div class="task-title"><?=$task['name']?></div>
                <div class="task-description"><?=$task['description']?></div>
            </div>
            <input type="checkbox" class="check-task">
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
                <textarea type="text" placeholder="Description" name="description"></textarea>
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
        // fetch(form.action, {
        //     method: form.method,
        //     body: new FormData(form),
        // });
        form[0].value = '';
        form[1].value = '';
        // Prevent the default form submit
        e.preventDefault();
    });
</script>
<?php
include APP_ROOT . '/Views/footer.php';
?>

