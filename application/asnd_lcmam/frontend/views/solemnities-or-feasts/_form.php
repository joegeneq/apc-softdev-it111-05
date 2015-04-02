<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolemnitiesOrFeasts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solemnities-or-feasts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->textInput(['maxlength' => 10, 'disabled' => 'disabled']) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 100, 'disabled' => 'disabled']) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => 20, 'disabled' => 'disabled']) ?>

    <?= $form->field($model, 'first_reading')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'first_reading_audio')->textInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'responsorial_psalm')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'responsorial_psalm_audio')->textInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'second_reading')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'second_reading_audio')->textInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'alleluia_verse')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'alleluia_verse_audio')->textInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'gospel')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'gospel_audio')->textInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'rule')->textInput(['maxlength' => 45, 'disabled' => 'disabled']) ?>

    <?= $form->field($model, 'cycle_type')->textInput(['maxlength' => 45, 'disabled' => 'disabled']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
