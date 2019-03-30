<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%flight}}`.
 */
class m190330_221116_create_flight_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%flight}}', [
            'id'                   => $this->primaryKey(),
            'flight_number'        => $this->string(50)->notNull(),
            'departure_airport_id' => $this->integer()->notNull(),
            'arrival_airport_id'   => $this->integer()->notNull(),
            'departure_date_time'  => $this->dateTime()->notNull(),
            'arrival_date_time'    => $this->dateTime()->notNull(),
        ]);
        $this->addForeignKey(
            'fk-dep_airport-airport',
            'flight',
            'departure_airport_id',
            'airport',
            'id'
        );
        $this->addForeignKey(
            'fk-arr_airport-airport',
            'flight',
            'departure_airport_id',
            'airport',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-dep_airport-airport',
            'flight'
        );
        $this->dropForeignKey(
            'fk-arr_airport-airport',
            'flight'
        );

        $this->dropTable('{{%flight}}');
    }
}
