<?php

echo '<div class="form-row my-1"><div class="form-group col-md-12">';
echo $commentForm->field($comment, 'body')
    ->textInput(['placeholder' => 'Комментарий', 'class' => 'form-control required', 'id' => 'body'])
    ->textarea()
    ->label('');
echo $commentForm->field($comment, 'manager_name')->hiddenInput(['value'=> \Yii::$app->user->identity->username])->label(false);
echo $commentForm->field($comment, 'task_id')->hiddenInput(['value'=> $model->id])->label(false);
?>
<input type="submit" class="btn btn-outline-primary mt-2" value="Сохранить">
</div></div>