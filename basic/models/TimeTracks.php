<?php

namespace app\models;

use yii\db\ActiveRecord;


class TimeTracks extends ActiveRecord
{

    public static function tableName()
    {
        return 'time_tracks';
    }

    public function rules()
    {
        return [
            [['task_id', 'total_time', 'start_time'], 'safe'],
        ];
    }
}