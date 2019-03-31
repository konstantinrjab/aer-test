<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "flight".
 *
 * @property int $id
 * @property string $flight_number
 * @property int $departure_airport_id
 * @property int $arrival_airport_id
 * @property string $departure_date_time
 * @property string $arrival_date_time
 * @property int $duration
 * @property string $transporter_id
 *
 * @property Airport $departureAirport
 * @property Airport $arrivalAirport
 * @property Transporter $transporter
 */
class Flight extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'flight';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['departure_airport_id', 'arrival_airport_id', 'departure_date_time', 'arrival_date_time', 'flight_number', 'duration', 'transporter_id'], 'required'],
            [['departure_airport_id', 'arrival_airport_id', 'duration', 'transporter_id'], 'integer'],
            [['departure_date_time', 'arrival_date_time'], 'safe'],
            [['flight_number'], 'string', 'max' => 50],
            ['departure_airport_id', 'compare', 'compareAttribute' => 'arrival_airport_id', 'operator' => '!=', 'message' => 'Airports cannot be the same'],
            [['departure_airport_id'], 'exist', 'skipOnError' => true, 'targetClass' => Airport::className(), 'targetAttribute' => ['departure_airport_id' => 'id']],
            [['departure_airport_id'], 'exist', 'skipOnError' => true, 'targetClass' => Airport::className(), 'targetAttribute' => ['departure_airport_id' => 'id']],
            [['transporter_id'], 'exist', 'skipOnError' => true, 'targetClass' => Airport::className(), 'targetAttribute' => ['departure_airport_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'                   => 'ID',
            'flight_number'        => 'Flight Number',
            'departure_airport_id' => 'Departure Airport ID',
            'arrival_airport_id'   => 'Arrival Airport ID',
            'departure_date_time'  => 'Departure Date Time',
            'arrival_date_time'    => 'Arrival Date Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartureAirport()
    {
        return $this->hasOne(Airport::className(), ['id' => 'departure_airport_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArrivalAirport()
    {
        return $this->hasOne(Airport::className(), ['id' => 'arrival_airport_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransporter()
    {
        return $this->hasOne(Transporter::className(), ['id' => 'transporter_id']);
    }

    public function fields()
    {
        $this->transporter;

        return [
            'transporter'      => function () {
                return $this->transporter;
            },
            'flightNumber'     => 'flight_number',
            'departureAirport' => function () {
                return $this->departureAirport->name;
            },
            'arrivalAirport'   => function () {
                return $this->arrivalAirport->name;
            },
            'arrivalDateTime'  => 'arrival_date_time',
            'duration'
        ];
    }
}
