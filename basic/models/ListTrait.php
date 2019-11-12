<?php


namespace app\models;


trait ListTrait
{
    public static function getList()
    {
        $list = [];
        $items = self::find()->all();
        foreach($items as $item){
            $list[$item->id] = $item->name;
        }

        return $list;
    }
}