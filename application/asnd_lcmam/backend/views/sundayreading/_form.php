<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SundayReading */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sunday-reading-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sundayr_cycle_type')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'sunday_reading')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'sunday_week_num')->textInput() ?>

    <?= $form->field($model, 'sunday_audio_link')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'yearly_reading_set_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
