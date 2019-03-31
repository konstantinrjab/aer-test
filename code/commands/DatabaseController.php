<?php

namespace app\commands;

use app\models\Airport;
use app\models\Flight;
use app\models\Transporter;
use yii\console\Controller;
use yii\console\ExitCode;

class DatabaseController extends Controller
{
    public function actionIndex()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 8; $i++) {
            $record       = new Airport();
            $record->name = $faker->regexify('[A-Z]{3}');
            $record->save();
        }

        for ($i = 0; $i < 15; $i++) {
            $record       = new Transporter();
            $record->code = $faker->regexify('[A-Z]{3,5}');
            $record->name = $faker->company;
            $record->save();
        }

        $airportsIDs     = Airport::find()->select(['id'])->column();
        $transportersIDs = Transporter::find()->select(['id'])->column();
        for ($i = 0; $i < 500; $i++) {
            $record                       = new Flight();
            $record->arrival_airport_id   = $faker->randomElement($airportsIDs);
            $record->departure_airport_id = $faker->randomElement($airportsIDs);
            $record->transporter_id       = $faker->randomElement($transportersIDs);

            $departureDate               = $faker->dateTimeBetween('now', '+ 3 days');
            $record->departure_date_time = $departureDate->format('Y-m-d H:i:s');

            $randHours                 = $faker->numberBetween(1, 5);
            $randMinutes               = $faker->numberBetween(0, 60);
            $arrivalDate               = $departureDate->modify("+ $randHours hours + $randMinutes minutes");
            $record->arrival_date_time = $arrivalDate->format('Y-m-d H:i:s');
            $record->flight_number     = $faker->ean8;

            $record->duration = $randHours * 60 + $randMinutes;

            $record->save();
        }

        return ExitCode::OK;
    }
}
