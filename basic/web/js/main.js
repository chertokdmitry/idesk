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

    // $('#okpd-menu').ready(function() {
    //
    //     let me = $('#first'),
    //         code = me.attr('data-code'),
    //         id = me.attr('data-id'),
    //         level = me.attr('data-level'),
    //         search = me.attr('data-search');
    //
    //     $.ajax({
    //         type: 'POST',
    //         url: '/admin/okpd/ajax-products',
    //         data: {
    //             code: code,
    //             id: id,
    //             level: level,
    //             search: search,
    //         },
    //         success: function (data) {
    //             $(id).replaceWith(data);
    //         }
    //     });
    // });
    //
    // $('body')
    //     .on('click', '.okpd-add', function (e) {
    //         let me = $(this),
    //             code = me.attr('data-code'),
    //             okpd_key = $('#okpd_key').val()
    //         $.ajax({
    //             type: 'POST',
    //             url: '/admin/okpd/add-okpd-project',
    //             data: {
    //                 code: code
    //             },
    //             success: function (data) {
    //                 $('#message').replaceWith(data);
    //             }
    //         })
    //
    //         localStorage.setItem(okpd_key, code)
    //     })
    //     .on('click', '.okpd-menu', function (e) {
    //
    //         $('.okpd-menu').removeClass('bg-warning');
    //         $(this).addClass('bg-warning');
    //     })
    //     .on('click', '.okpd-nav', function (e) {
    //         let me = $(this),
    //             code = me.attr('data-code'),
    //             id = me.attr('data-id'),
    //             level = me.attr('data-level'),
    //             search = me.attr('data-search');
    //
    //         $.ajax({
    //             type: 'POST',
    //             url: '/admin/okpd/ajax-products',
    //             data: {
    //                 code: code,
    //                 id: id,
    //                 level: level,
    //                 search: search,
    //             },
    //             success: function (data) {
    //                 $(id).replaceWith(data);
    //             }
    //         });
    //     })
    //     .on('click', '.okpd-nav2', function (e) {
    //         let me = $(this),
    //             code = me.attr('data-code'),
    //             id = me.attr('data-id'),
    //             level = me.attr('data-level'),
    //             search = me.attr('data-search');
    //         $.ajax({
    //             type: 'POST',
    //             url: '/admin/okpd/ajax-products-main',
    //             data: {
    //                 code: code,
    //                 id: id,
    //                 level: level,
    //                 search: search,
    //             },
    //             success: function (data) {
    //                 $(id).replaceWith(data);
    //             }
    //         });
    //     });
});
