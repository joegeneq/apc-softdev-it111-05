<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\WeekdayReadingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="weekday-reading-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'weekday_cycle_num') ?>

    <?= $form->field($model, 'weekday_reading') ?>

    <?= $form->field($model, 'weekday_week_num') ?>

    <?= $form->field($model, 'weekday_day') ?>

    <?php // echo $form->field($model, 'weekday_audio_link') ?>

    <?php // echo $form->field($model, 'yearly_reading_set_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
