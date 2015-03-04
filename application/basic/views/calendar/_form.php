<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Calendar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calendar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Calendar_Year')->textInput(['maxlength' => 4]) ?>

    <?= $form->field($model, 'Calendar_Month')->textInput() ?>

    <?= $form->field($model, 'Calendar_Date')->textInput() ?>

    <?= $form->field($model, 'YEARLY_READING_SET_Reading_ID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
