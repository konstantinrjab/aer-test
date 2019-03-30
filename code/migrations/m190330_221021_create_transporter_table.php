<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%transporter}}`.
 */
class m190330_221021_create_transporter_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%transporter}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'code' => $this->string(20)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%transporter}}');
    }
}
