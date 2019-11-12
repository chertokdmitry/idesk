<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%levels}}`.
 */
class m191111_042503_create_levels_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%levels}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%levels}}');
    }
}
