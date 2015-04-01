<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\EventDeterminantSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-determinant-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'year') ?>

    <?= $form->field($model, 'sunday_cycle') ?>

    <?= $form->field($model, 'weekday_cycle') ?>

    <?= $form->field($model, 'week_ot_before_lent') ?>

    <?php // echo $form->field($model, 'ash_wednesday') ?>

    <?php // echo $form->field($model, 'easter_sunday') ?>

    <?php // echo $form->field($model, 'pentecost_sunday') ?>

    <?php // echo $form->field($model, 'week_ot_after_pentecost') ?>

    <?php // echo $form->field($model, 'first_sunday_of_advent') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
