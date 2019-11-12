<?php

namespace app\models;

use yii\db\ActiveRecord;


class Client extends ActiveRecord
{
    public static function tableName()
    {
        return 'clients';
    }

    public function rules()
    {
        return [
            [['first', 'last', 'email', 'updated_at', 'created_at'], 'safe'],
        ];
    }
}