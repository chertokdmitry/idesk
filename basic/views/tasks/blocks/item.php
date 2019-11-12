<tr>
    <td>
        <?= $model['id'] ?>
    </td>
    <td>
        <a href="/tasks/create?id=<?= $model['id'] ?>">
            <?= $model['title'] ?>
        </a>
    </td>
    <td>
        <?= $model['description'] ?>
    </td>
    <td>
        <?= $model['type']['name'] ?>
    </td>
    <td>
        <?= $model['level']['name'] ?>
    </td>
    <td>
        <span id="status-<?= $model['id'] ?>"><?= $model['status']['name'] ?>
        <?php
        if ($model['status']['id'] == 1) {
            echo '<p><button 
            type="button" 
            data-manager="' . Yii::$app->user->identity->id . '" 
            data-id="' . $model['id'] . '" 
            class="btn btn-outline-info btn-sm manager-add">
                обработать
            </button></p></span>';
        }
        ?>
    </td>
    <td>
        <?php
        if (!empty($model['manager_id'])) {
            echo '<span id="manager-' . $model['id'] . '">';
            $user = app\models\User::findIdentity($model['manager_id']);
            echo $user->username;
            echo '<p><button 
            type="button" 
            data-manager="' . $model['manager_id']  . '" 
            data-id="' . $model['id'] . '" 
            class="btn btn-outline-warning btn-sm manager-remove">
                отказаться
            </button></p></span>';
        }
            ?>
    </td>
    <td>
<?php

$time = $model['timeTracks']['total_time']  > 0 ? $model['timeTracks']['total_time']  : 0;

if ($model['status_id'] == 5 && Yii::$app->user->identity->id == $model['manager_id']) {
    echo '<p>время <span id="time-' . $model['id'] . '">' . $time . '</span> с</p>';
    echo '<p><span id="working-' . $model['id'] . '" class="badge badge-info">остановлено</span><p>';
    echo '<div class="btn-group" role="group">
  <button type="button" data-id="' . $model['id'] . '" class="btn btn-sm btn-outline-success start">старт</button>
  <button type="button" data-id="' . $model['id'] . '" class="btn btn-sm btn-outline-danger stop">стоп</button>
   </div>';
}
?>
    </td>
</tr>