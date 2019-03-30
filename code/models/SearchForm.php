<?php

namespace app\models;

use yii\base\Model;

class SearchForm extends Model
{
    public $departureAirport;
    public $arrivalAirport;
    public $departureDate;

    public function rules(): array
    {
        return [
            [['departureAirport', 'arrivalAirport', 'departureDate'], 'required'],
            [['departureAirport', 'arrivalAirport', 'departureDate'], 'string']
        ];
    }

    public function sendSearchRequest(): bool
    {
        return true;
    }
}
