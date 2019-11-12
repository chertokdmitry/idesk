<?php

use yii\widgets\ActiveForm;

$this->title = 'Редактирование заявки';

$form = ActiveForm::begin([
    'id' => 'taskform',
    'method' => 'POST',
    'action' => '/tasks/create',
]);
?>

    <div class="container" id="main_form" data-id="<?= $model->id ?>">
        <div class="mt-2 p-3">
            <h4><?= $this->title ?></h4>
            <form id="update_task" method="POST" action="/tasks/create">

            <?= $this->render('blocks/form_item', [
                'form' => $form,
                'model' => $model,
                'available' => $available,
                'statuses' => $statuses,
                'levels' => $levels,
                'types' => $types
            ]) ?>

        </div>
    </div>
    <br><br>
<?php
ActiveForm::end();

if ($model->comments) {
    echo $this->render('blocks/comments', [
        'comments' => $model->comments]);
}

$commentForm = ActiveForm::begin([
    'id' => 'commentform',
    'method' => 'POST',
    'action' => '/tasks/comment-create',
]);
?>
<div class="container">
    <div class="mt-2 p-3"
         data-fcompany_id="<?= $model->id ?>">
        <h3>Добавить комментарий</h3>
        <form id="add-comment" method="POST" action="/tasks/comment-create">

<?= $this->render('blocks/form_comment', [
    'commentForm' => $commentForm,
    'comment' => $comment,
    'model' => $model]);
?>
    </div>
</div>
<br><br>
<?php
ActiveForm::end();
?>

<?= $this->render('blocks/client_info', ['client' => $model->client]); ?>

