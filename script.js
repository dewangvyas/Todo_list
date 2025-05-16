$(document).ready(function() {
    function loadTasks() {
        $.post('functions.php', { action: 'list' }, function(data) {

            //console.log(data);

            const tasks = JSON.parse(data);
            $('#taskList').empty();
            //console.log(tasks);
            tasks.forEach(task_checklist => {
                $('#taskList').append(`
                    <li data-id="${task_checklist.id}" class="${task_checklist.status == 1 ? 'done' : 'pending'}">
                        <div class="task_desc col-md-6">
                            ${task_checklist.description}
                        </div>

                        <div class="status col-md-1">
                            ${task_checklist.status == 1 ? 'Completed' : 'Pending'}
                        </div>

                        <div class="task-time col-md-3">
                            ${task_checklist.created_at}
                        </div>
                        
                        <div class="action col-md-2">
                            <button class="complete"><img src="${toggleImg(task_checklist.status)}" height="24px" /></button>
                            <button class="delete"><img src="imgs/delete.png" height="24px" /></button>
                        </div>
                    </li>
                `);
            });
        });
    }

    $('#addTaskBtn').click(function() {
        const desc = $('#taskInput').val().trim();
        if (desc) {
            $.post('functions.php', { action: 'add', description: desc }, function() {
                
                $('#taskInput').val('');
                loadTasks();
            });
        }
    });

    $('#taskList').on('click', '.complete', function() {
        const id = $(this).closest('li').data('id');
        $.post('functions.php', { action: 'complete', id: id }, function() {
            loadTasks();
        });
    });

    $('#taskList').on('click', '.delete', function() {
        const id = $(this).closest('li').data('id');
        $.post('functions.php', { action: 'delete', id: id }, function() {
            loadTasks();
        });
    });

    function toggleImg(status){
        //console.log(status);
        if(status == 1){
            return "imgs/complete.png";
        }
        else{
            return "imgs/edit.png";
        }
    }

    loadTasks();
});