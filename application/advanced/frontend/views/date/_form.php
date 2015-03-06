<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Date */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="date-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'date_month')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'date_week')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'date_day')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'year_year_year')->textInput(['maxlength' => 4]) ?>

    <?= $form->field($model, 'event_id')->textInput() ?>

    <?= $form->field($model, 'weekday_reading_id')->textInput() ?>

    <?= $form->field($model, 'sunday_reading_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
