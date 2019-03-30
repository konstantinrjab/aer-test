<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Airport;
use yii\console\Controller;
use yii\console\ExitCode;

class DatabaseController extends Controller
{
    public function actionIndex()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $airport = new Airport();
            $airport->name = $faker->regexify('[A-Z]{3}');
            $airport->save();
        }

        return ExitCode::OK;
    }
}
