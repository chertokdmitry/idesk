$(document).ready(function() {

    // this is the id of the form
    $("#new_task").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);

        $.ajax({
            type: "POST",
            url: form.attr("action"),
            data: form.serializeArray(),// serializes the form's elements.
            success: function(data)
            {
                $('#main_form').replaceWith(data);
            }
        });
    });

    $("#main_form").ready(function(){

        window.onbeforeunload = function() {
            let element = $('#main_form');
            taskId = element.attr('data-id');
            console.log(taskId);

            $.ajax({
                type: 'POST',
                url: '/ajax/make-available',
                data: {
                    task_id: taskId
                },
                success: function (data) {
                    console.log(data)
                }
            })
        }
    });


    $('body')
        .on('click', '.manager-add', function (e) {
            let me = $(this),
                taskId = me.attr('data-id'),
                managerId = me.attr('data-manager');

            $.ajax({
                type: 'POST',
                url: '/ajax/add-manager',
                data: {
                    task_id: taskId,
                    manager_id: managerId
                },
                success: function (data) {
                $('#status-'+data).replaceWith('Назначена');
                }
            })
        })
        .on('click', '.manager-remove', function (e) {
            let me = $(this),
                taskId = me.attr('data-id'),
                managerId = me.attr('data-manager');

            $.ajax({
                type: 'POST',
                url: '/ajax/remove-manager',
                data: {
                    task_id: taskId,
                    manager_id: managerId
                },
                success: function (data) {
                    $('#status-'+data).replaceWith('Новая');
                    $('#manager-'+data).replaceWith(' ');
                }
            })
        })
        .on('click', '.start', function (e) {
            let me = $(this),
                taskId = me.attr('data-id');

            $.ajax({
                type: 'POST',
                url: '/ajax/start-task',
                data: {
                    task_id: taskId
                },
                success: function (data) {
                    $('#working-'+data).html('в работе');
                }
            })
        })
        .on('click', '.stop', function (e) {
            let me = $(this),
                taskId = me.attr('data-id');

            $.ajax({
                type: 'POST',
                url: '/ajax/stop-task',
                data: {
                    task_id: taskId
                },
                success: function (response) {
                    data = JSON.parse(response);
                    $('#working-'+data.task_id).html('пауза');
                    $('#time-'+data.task_id).html(data.total_time);
                }
            })
        })
});
