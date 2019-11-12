<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card" style="margin-top: 90px;">
    <div class="card-header">
        Вход для менеджеров
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n<div>{input}</div>\n<div>{error}</div>",
                    'labelOptions' => ['class' => ''],
                ],
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div>{input} {label}</div>\n<div >{error}</div>",
            ]) ?>

            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </li>
        <li class="list-group-item">Можете войти как один из менеджеров <strong>manager_andrey/admin</strong> or <strong>manager_sergey/demo</strong>.<br></li>
    </ul>
</div>


