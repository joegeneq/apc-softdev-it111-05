<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\WeekdayReading */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="weekday-reading-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'weekday_cycle_num')->textInput() ?>

    <?= $form->field($model, 'weekday_reading')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'weekday_week_num')->textInput() ?>

    <?= $form->field($model, 'weekday_day')->textInput() ?>

    <?= $form->field($model, 'weekday_audio_link')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'yearly_reading_set_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
