<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

use yii\widgets\ActiveForm;

?>
<div class="site-index">

    <?php $form = ActiveForm::begin();

    echo $form->field($model, 'departureAirport');

    echo $form->field($model, 'arrivalAirport');

    echo $form->field($model, 'departureDate');
    ?>
    <div class="form-group">
        <?= \yii\helpers\Html::submitButton('Login', ['class' => 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
