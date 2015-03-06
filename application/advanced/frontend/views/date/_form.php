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

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
