<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

use yii\widgets\ActiveForm;

$airports = \yii\helpers\ArrayHelper::map(\app\models\Airport::find()->asArray()->all(), 'name', 'name');
?>
    <div class="site-index">

        <?php $form = ActiveForm::begin();

        echo $form->field($model, 'departureAirport')
                  ->dropDownList($airports, ['id' => 'departureAirport']);

        echo $form->field($model, 'arrivalAirport')
                  ->dropDownList($airports, ['id' => 'arrivalAirport']);

        echo $form->field($model, 'departureDate')->input('date', ['id' => 'departureDate']);
        ?>
        <button class="btn btn-primary">Search</button>

        <?php ActiveForm::end(); ?>

        <div id="result" style="padding-top: 50px;">

        </div>

    </div>

<?php
$script = <<<JS
$('button').on('click', function (e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        dataType: "json",
        url: "/api/v1/search",
        data: {
            "searchQuery": {
                "departureAirport": $('#departureAirport').val(),
                "arrivalAirport": $('#arrivalAirport').val(),
                "departureDate": $('#departureDate').val(),
            },
        },
        success: function (data, textStatus, jqXHR) {
            $('#result').html(JSON.stringify(data));
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $('#result').html(errorThrown);
        }
    });
});
JS;

$this->registerJs($script);