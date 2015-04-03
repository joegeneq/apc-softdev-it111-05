<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\WeekdayReadingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="weekday-reading-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'weekday_daynum') ?>

    <?= $form->field($model, 'weekday_name') ?>

    <?= $form->field($model, 'weekday_day') ?>

    <?= $form->field($model, 'weekday_first_reading') ?>

    <?= $form->field($model, 'weekday_cycle_num') ?>

    <?php // echo $form->field($model, 'weekday_first_audio') ?>

    <?php // echo $form->field($model, 'weekday_alleluia_verse') ?>

    <?php // echo $form->field($model, 'weekday_alleluia_audio') ?>

    <?php // echo $form->field($model, 'weekday_responsorial_psalm') ?>

    <?php // echo $form->field($model, 'weekday_responsorial_audio') ?>

    <?php // echo $form->field($model, 'weekday_gospel') ?>

    <?php // echo $form->field($model, 'weekday_gospel_audio') ?>

    <?php // echo $form->field($model, 'weekday_cycle_num') ?>

    <?php // echo $form->field($model, 'weekday_weeknum') ?>

    <?php // echo $form->field($model, 'weekday_reading_type') ?>

    <?php // echo $form->field($model, 'weekday_first_optional') ?>

    <?php // echo $form->field($model, 'weekday_responsorial_optional') ?>

    <?php // echo $form->field($model, 'weekday_alleluia_optional') ?>

    <?php // echo $form->field($model, 'weekday_gospel_optional') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
