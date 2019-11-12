<?php

use app\models\Task;

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'iDesk';

?>

    <div id="main_form" class="row" style="margin-top: 90px;">
        <div class="col-md-12">
            <h4 class="mb-3">Новая заявка</h4>
            <form id="new_task" class="needs-validation" method="POST" action="/ajax/add-task">

                <div class="mb-3">
                    <label for="title">Название</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="Введите название" required>
                </div>

                <div class="mb-3">
                    <label for="description">Описание</label>
                    <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="country">Тип</label>
                        <select name="type_id" class="custom-select d-block w-100" id="country">
                            <option value="">выберите</option>
                            <option value="1">Сервисное обслуживание</option>
                            <option value="2">Поддержка</option>
                            <option value="3">Запрос технической информации</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="state">Приоритет</label>
                        <select name="level_id" class="custom-select d-block w-100" id="state">
                            <option value="">выберите</option>
                            <option value="1">Низкий</option>
                            <option value="2">Средний</option>
                            <option value="3">Высокий</option>
                        </select>
                    </div>
                </div>
                <hr class="mb-4">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <label for="firstName">Имя</label>
                        <input name="first" type="text" class="form-control" id="firstName" placeholder="" value="" required>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="lastName">Фамилия</label>
                        <input name="last" type="text" class="form-control" id="lastName" placeholder="" value="">
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="email">Email</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="you@example.com" required>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block add-task" type="submit">Отправить</button>
            </form>
        </div>
    </div>
