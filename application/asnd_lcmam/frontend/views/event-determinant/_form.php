<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\EventDeterminant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-determinant-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'year')->textInput(['maxlength' => 4]) ?>

    <?= $form->field($model, 'sunday_cycle')->dropDownlist(['A'=> 'A', 'B'=> 'B', 'C'=>'C']) ?>

    <?= $form->field($model, 'weekday_cycle')->dropDownlist(['1' => '1', '2'=>'2']) ?>

    <?= $form->field($model, 'week_ot_before_lent')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'ash_wednesday')->textInput() ?>

    <?= $form->field($model, 'easter_sunday')->textInput() ?>

    <?= $form->field($model, 'pentecost_sunday')->textInput() ?>

    <?= $form->field($model, 'week_ot_after_pentecost')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'first_sunday_of_advent')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
