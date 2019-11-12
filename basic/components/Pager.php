<?php

namespace app\components;

class Pager
{
    public static function pager() {
        return [
            'options' => [
                'tag' => 'ul',
                'class' => 'pagination m-0',
            ],
            'linkOptions' => ['class' => 'page-link'],
            'linkContainerOptions' => ['class' => 'page-item'],
            'activePageCssClass' => 'active',
            'disabledPageCssClass' => 'disabled',
            'disabledListItemSubTagOptions' => ['tag' => 'a', 'href' => '#', 'class'=> "page-link"],

            'prevPageLabel' => 'Назад',
            'nextPageLabel' => 'Вперед',
            'maxButtonCount' => 6,
        ];
    }
}
