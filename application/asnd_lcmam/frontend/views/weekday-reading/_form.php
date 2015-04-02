<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\WeekdayReading */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="weekday-reading-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'weekday_daynum')->textInput(['disabled' => 'disabled']) ?>

    <?= $form->field($model, 'weekday_name')->textInput(['maxlength' => 45, 'disabled' => 'disabled']) ?>

    <?= $form->field($model, 'weekday_day')->textInput(['maxlength' => 10, 'disabled' => 'disabled']) ?>

    <?= $form->field($model, 'weekday_first_reading')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'weekday_first_audio')->textInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'weekday_first_optional')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'weekday_alleluia_verse')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'weekday_alleluia_audio')->textInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'weekday_alleluia_optional')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'weekday_responsorial_psalm')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'weekday_responsorial_audio')->textInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'weekday_responsorial_optional')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'weekday_gospel')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'weekday_gospel_audio')->textInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'weekday_gospel_optional')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'weekday_cycle_num')->textInput(['disabled' => 'disabled']) ?>

    <?= $form->field($model, 'weekday_weeknum')->textInput(['disabled' => 'disabled']) ?>

    <?= $form->field($model, 'weekday_reading_type')->textInput(['maxlength' => 45, 'disabled' => 'disabled']) ?>

    

    

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
