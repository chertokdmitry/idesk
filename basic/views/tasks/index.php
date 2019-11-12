<?php

use yii\data\ActiveDataProvider;
use \app\components\Pager;
use yii\widgets\ListView;
use yii\data\Sort;

$this->title = 'Заявки';

$headers = [[
        'title' => 'ID'
    ], [
        'title' => 'Название'
    ], [
        'title' => 'Описание'
    ], [
        'title' => 'Тип'
    ], [
        'title' => 'Приоритет'
    ], [
        'title' => 'Статус'
    ]
];


$dataProvider = new ActiveDataProvider([
    'query' => $items,
    'pagination' => [
        'pageSize' => 5
    ],
    'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]]

]);

$dataProvider->sort->attributes['type_id'] = [
    'asc' => ['type_id' => SORT_ASC],
    'desc' => ['type_id' => SORT_DESC],
];

$dataProvider->sort->attributes['status_id'] = [
    'asc' => ['status_id' => SORT_ASC],
    'desc' => ['status_id' => SORT_DESC],
];

$dataProvider->sort->attributes['id'] = [
    'asc' => ['id' => SORT_ASC],
    'desc' => ['id' => SORT_DESC],
    'default' => ['id' => SORT_DESC]
];

$sort = new Sort([
    'attributes' => [
        'type_id' => [
            'asc' => ['type_id' => SORT_ASC],
            'desc' => ['type_id' => SORT_DESC],
            'label' => 'Тип',
        ],
        'status_id' => [
            'asc' => ['id' => SORT_ASC],
            'desc' => ['id' => SORT_DESC],
            'label' => 'Статус',
        ],
        'id' => [
            'asc' => ['id' => SORT_ASC],
            'desc' => ['id' => SORT_DESC],
            'default' => SORT_DESC,
            'label' => 'ID',
        ],
    ],
]);

echo '<h4>' . $this->title . '</h4>';
echo '<table class="table" style="margin-top: 20px;">';
echo $this->render('blocks/header', ['title' => $this->title, 'headers' => $headers, 'sort' => $sort]);


echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => 'blocks/item',
    'layout' => "{items}\n{pager}\n",
    'pager' => Pager::pager(),
    'summary' => '<strong>Заявки с {begin} по {end} ({totalCount}), cтраница {page} ({pageCount})</strong>'
]);

echo '</table>';


