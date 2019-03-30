<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

use yii\widgets\ActiveForm;

$airports = \yii\helpers\ArrayHelper::map(\app\models\Airport::find()->asArray()->all(), 'id', 'name');
?>
<div class="site-index">

    <?php $form = ActiveForm::begin();

    echo $form->field($model, 'departureAirport')
        ->dropDownList($airports);

    echo $form->field($model, 'arrivalAirport')
        ->dropDownList($airports);

    echo $form->field($model, 'departureDate')->input('date');
    ?>
    <div class="form-group">
        <?= \yii\helpers\Html::submitButton('Search', ['class' => 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
