<?php

namespace app\models;

use yii\db\ActiveRecord;


class Task extends ActiveRecord
{
    public static function tableName()
    {
        return 'tasks';
    }

    public function rules()
    {
        return [
            [['title',  'description', 'manager_id', 'status_id', 'type_id', 'level_id', 'client_id', 'updated_at', 'created_at'],
                'safe'],
        ];
    }

    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }

    public function getLevel()
    {
        return $this->hasOne(Level::class, ['id' => 'level_id']);
    }

    public function getType()
    {
        return $this->hasOne(Type::class, ['id' => 'type_id']);
    }

    public function getClient()
    {
        return $this->hasOne(Client::class, ['id' => 'client_id']);
    }

    public function getTimeTracks()
    {
        return $this->hasOne(TimeTracks::class, ['task_id' => 'id']);
    }

    public function getComments()
    {
        return $this->hasMany(Comment::class, ['task_id' => 'id']);
    }
}