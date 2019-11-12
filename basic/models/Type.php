<?php

namespace app\models;

use yii\db\ActiveRecord;


class Type extends ActiveRecord
{
    use ListTrait;

    public static function tableName()
    {
        return 'types';
    }

    public function rules()
    {
        return [
            [['name'], 'safe'],
        ];
    }
}