<?php

namespace app\models\requests;

use app\models\Airport;
use yii\base\Model;

class SearchRequest extends Model
{
    public $departureAirport;
    public $arrivalAirport;
    public $departureDate;

    public function rules(): array
    {
        return [
            [['departureAirport', 'arrivalAirport', 'departureDate'], 'required'],
            [['departureAirport', 'arrivalAirport', 'departureDate'], 'string'],
            ['departureDate', 'date', 'format' => 'php:Y-m-d'],
            ['departureAirport', 'compare', 'compareAttribute' => 'arrivalAirport', 'operator' => '!=', 'message' => 'Airports cannot be the same'],
            [['departureAirport'], 'exist', 'skipOnError' => true, 'targetClass' => Airport::class, 'targetAttribute' => ['departureAirport' => 'name']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'departureDate'    => 'departureDate',
            'arrivalAirport'   => 'arrivalAirport',
            'departureAirport' => 'departureAirport'
        ];
    }
}
