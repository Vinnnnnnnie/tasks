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
            <div class="task-options">
                <button class="button edit-button">E</button>
                <button class="button delete-button">D</button>
            </div>
            <div class="task-details">
                <input readonly class="task-title" value="<?=$task['name']?>">
                <div contenteditable="false" class="task-description"><?=$task['description']?></div>
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
        // fetch(form.action, {
        //     method: form.method,
        //     body: new FormData(form),
        // });
        form[0].value = '';
        form[1].value = '';
        // Prevent the default form submit
        e.preventDefault();
    });
    $(document).ready(function() {
        $('button.edit-button').on('click', function(e) {
            // Edit Function
            console.log('Whole Event: ',e);
            let editButton = e.currentTarget;
            editButton.innerHTML = 'S';
            editButton.classList.toggle('save-button');
            editButton.classList.toggle('edit-button');
            $(editButton).on('click', function(e) {
                // Save function
                editButton.innerHTML = 'E';
                editButton.classList.toggle('save-button');
                editButton.classList.toggle('edit-button');
            })
        })
    })
</script>
<?php
include APP_ROOT . '/Views/footer.php';
?>

