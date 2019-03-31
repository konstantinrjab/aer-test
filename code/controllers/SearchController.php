<?php

namespace app\controllers;

use app\models\Flight;
use app\models\requests\SearchRequest;
use Yii;
use yii\web\BadRequestHttpException;

class SearchController extends \yii\rest\Controller
{

    /**
     * @return string
     * @throws BadRequestHttpException
     */
    public function actionIndex()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if (!Yii::$app->request->post('searchQuery')) {
            throw new BadRequestHttpException();
        }

        $searchRequest = new SearchRequest(Yii::$app->request->post('searchQuery'));

        $searchRequest->validate();
        if ($searchRequest->hasErrors()) {
            return $searchRequest->errors;
        }

        $query = Flight::find()
                       ->joinWith('arrivalAirport aa')
                       ->joinWith('departureAirport da')
                       ->where("departure_date_time 
                       BETWEEN '$searchRequest->departureDate  00:00:00' 
                       AND '$searchRequest->departureDate  23:59:59'")
                       ->andWhere(['aa.name' => $searchRequest->arrivalAirport])
                       ->andWhere(['da.name' => $searchRequest->departureAirport]);

        return $query->all();
    }
}
