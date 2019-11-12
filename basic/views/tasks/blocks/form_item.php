<?php

if ($available) {
  $readonly = false;
  $dropdown = [];
} else {
    $readonly = true;
    $dropdown = ['disabled' => 'disabled'];
}

echo '<div class="form-row my-1"><div class="form-group col-md-12">';
echo $form->field($model, 'title')
    ->textInput(['placeholder' => 'Название', 'class' => 'form-control', 'id' => 'title', 'readonly'=> $readonly])
    ->label('Название');
echo '</div></div>';

echo '<div class="form-row my-1"><div class="form-group col-md-12">';
echo $form->field($model,  'description')
    ->textInput(['placeholder' => 'Описание', 'class' => 'form-control', 'id' => 'description', 'readonly'=> $readonly])
    ->label('Описание');
echo '</div></div>';

echo '<div class="form-row my-1"><div class="form-group col-md-12">';
echo $form->field($model, 'status_id')->dropdownList($statuses, $dropdown)->label('Статус');
echo '</div></div>';

echo '<div class="form-row my-1"><div class="form-group col-md-12">';
echo $form->field($model, 'type_id')->dropdownList($types, $dropdown)->label('Тип');
echo '</div></div>';

echo '<div class="form-row my-1"><div class="form-group col-md-12">';
echo $form->field($model, 'level_id')->dropdownList($levels, $dropdown)->label('Приоритет');
echo '</div></div>';
echo $form->field($model, 'id')->hiddenInput(['value'=> $model->id])->label(false);

if ($available) {
    echo '<div class="form-row my-1">
                <div class="form-group col-md-12">
                    <input type="submit" class="btn btn-lg btn-primary mt-2" value="Сохранить">
                </div>
            </div>';
}
