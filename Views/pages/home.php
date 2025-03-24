<?php
include APP_ROOT . '/Views/header.php';
?>
<h2>Home</h2>
<h3>Welcome Vincent, here are your outstanding tasks.</h3>
<div id="tasklists">
    <?php include APP_ROOT."/Views/pages/tasklists.php"?>
</div>
<script>
    console.log('help me');
    document.addEventListener('submit', (e) => {
        // Store reference to form to make later code easier to read
        const form = e.target;
        let newTask;
        console.log(form);
        // Post data using the Fetch API
        (async function getNewTasks() {
            const response = await fetch(form.action, {
                method: form.method,
                body: new FormData(form),
            });
            console.log('made it to the okay response.');
            $('#tasklists').load('<?=DOC_ROOT?>Views/pages/tasklists.php');
        })()

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

