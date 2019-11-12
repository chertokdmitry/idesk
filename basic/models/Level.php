<?php

namespace app\models;

use yii\db\ActiveRecord;


class Level extends ActiveRecord
{
    use ListTrait;

    public static function tableName()
    {
        return 'levels';
    }

    public function rules()
    {
        return [
            [['name'], 'safe'],
        ];
    }
}