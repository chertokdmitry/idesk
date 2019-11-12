<?php

namespace app\models;

use yii\db\ActiveRecord;


class Comment extends ActiveRecord
{
    public static function tableName()
    {
        return 'comments';
    }

    public function rules()
    {
        return [
            [['body', 'task_id'], 'safe'],
        ];
    }
}