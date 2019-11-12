<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%foreign_keys_tasks}}`.
 */
class m191112_053954_create_foreign_keys_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-tasks-client_id',
            'tasks',
            'client_id',
            'clients',
            'id'
        );

        $this->addForeignKey(
            'fk-tasks-type_id',
            'tasks',
            'type_id',
            'types',
            'id'
        );

        $this->addForeignKey(
            'fk-tasks-level_id',
            'tasks',
            'level_id',
            'levels',
            'id'
        );

        $this->addForeignKey(
            'fk-tasks-status_id',
            'tasks',
            'status_id',
            'statuses',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%foreign_keys_tasks}}');
    }
}
