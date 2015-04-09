<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_name')->textInput(['maxlength' => 45, 'disabled'=>'disabled']) ?>

    <?= $form->field($model, 'event_type')->textInput(['maxlength' => 45, 'disabled'=>'disabled']) ?>

    <?= $form->field($model, 'date')->textInput(['maxlength' => 45, 'disabled' => 'disabled']) ?>

    <?= $form->field($model, 'event_first_reading')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'event_first_audio')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'event_first_optional')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'event_second_reading')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'event_second_audio')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'event_second_optional')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'event_alleluia_verse')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'event_alleluia_audio')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'event_alleluia_optional')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'event_responsorial_psalm')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'event_responsorial_audio')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'event_responsorial_optional')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'event_gospel')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'event_gospel_audio')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'event_gospel_optional')->textInput(['maxlength' => 100]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
