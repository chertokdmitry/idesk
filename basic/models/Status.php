<?php

namespace app\models;

use yii\db\ActiveRecord;


class Status extends ActiveRecord
{
    use ListTrait;

    public static function tableName()
    {
        return 'statuses';
    }

    public function rules()
    {
        return [
            [['name'], 'safe'],
        ];
    }
}