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
            'transporter_id'       => $this->integer()->notNull(),
            'flight_number'        => $this->string(50)->notNull(),
            'departure_airport_id' => $this->integer()->notNull(),
            'arrival_airport_id'   => $this->integer()->notNull(),
            'departure_date_time'  => $this->dateTime()->notNull(),
            'arrival_date_time'    => $this->dateTime()->notNull(),
            'duration'             => $this->integer()->unsigned()->notNull(),
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
            'arrival_airport_id',
            'airport',
            'id'
        );
        $this->addForeignKey(
            'fk-trans_id-transporter',
            'flight',
            'transporter_id',
            'transporter',
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
        $this->dropForeignKey(
            'fk-trans_id-transporter',
            'flight'
        );

        $this->dropTable('{{%flight}}');
    }
}
