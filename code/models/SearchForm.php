<?php

namespace app\models;

use yii\base\Model;

class SearchForm extends Model
{
    public $departureAirport;
    public $arrivalAirport;
    public $departureDate;

    public function __construct($config = [])
    {
        $this->departureDate = date('Y-m-d');
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['departureAirport', 'arrivalAirport', 'departureDate'], 'required'],
            [['departureAirport', 'arrivalAirport', 'departureDate'], 'string']
        ];
    }
}
