<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%airports}}`.
 */
class m190330_213151_create_airport_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%airport}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%airport}}');
    }
}
