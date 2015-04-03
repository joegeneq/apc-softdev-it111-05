<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SundayReading */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sunday-reading-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sunday_weeknum')->textInput(['disabled' => 'disabled']) ?>

    <?= $form->field($model, 'sunday_name')->textInput(['maxlength' => 100, 'disabled' => 'disabled']) ?>

    <?= $form->field($model, 'sunday_first_reading')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'sunday_first_audio')->textInput(['maxlength' => 1000]) ?>


    <?= $form->field($model, 'sunday_first_optional')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'sunday_second_reading')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'sunday_second_audio')->textInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'sunday_second_optional')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'sunday_alleluia_verse')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'sunday_alleluia_audio')->textInput(['maxlength' => 1000]) ?>


    <?= $form->field($model, 'sunday_alleluia_optional')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'sunday_responsorial_psalm')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'sunday_responsorial_audio')->textInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'sunday_responsorial_optional')->textInput(['maxlength' => 100]) ?>


    <?= $form->field($model, 'sunday_gospel')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'sunday_gospel_audio')->textInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'sunday_gospel_optional')->textInput(['maxlength' => 100]) ?>
    
    <?= $form->field($model, 'sunday_cycle_type')->textInput(['maxlength' => 1, 'disabled' => 'disabled']) ?>

    <?= $form->field($model, 'sunday_reading_type')->textInput(['maxlength' => 45, 'disabled' => 'disabled']) ?>

    <?= $form->field($model, 'sunday_description')->textInput(['maxlength' => 100, 'disabled' => 'disabled']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
