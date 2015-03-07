<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="date-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date_month') ?>

    <?= $form->field($model, 'date_week') ?>

    <?= $form->field($model, 'date_day') ?>

    <?= $form->field($model, 'year_year_year') ?>

    <?php // echo $form->field($model, 'event_id') ?>

    <?php // echo $form->field($model, 'weekday_reading_id') ?>

    <?php // echo $form->field($model, 'sunday_reading_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
