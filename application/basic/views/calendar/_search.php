<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CalendarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calendar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Calendar_ID') ?>

    <?= $form->field($model, 'Calendar_Year') ?>

    <?= $form->field($model, 'Calendar_Month') ?>

    <?= $form->field($model, 'Calendar_Date') ?>

    <?= $form->field($model, 'YEARLY_READING_SET_Reading_ID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
