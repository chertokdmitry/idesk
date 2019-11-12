<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%time_tracks}}`.
 */
class m191110_085743_create_time_tracks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%time_tracks}}', [
            'id' => $this->primaryKey(),
            'task_id' => $this->integer(11),
            'total_time' => $this->integer(),
            'start_time' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_at' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%time_tracks}}');
    }
}
