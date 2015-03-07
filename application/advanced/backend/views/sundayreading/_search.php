<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SundayReadingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sunday-reading-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sundayr_cycle_type') ?>

    <?= $form->field($model, 'sunday_reading') ?>

    <?= $form->field($model, 'sunday_week_num') ?>

    <?= $form->field($model, 'sunday_audio_link') ?>

    <?php // echo $form->field($model, 'yearly_reading_set_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
