<?php

namespace app\controllers;

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
//        var_dump($searchRequest);
        var_dump($searchRequest->errors);

        return '123';
    }
}
