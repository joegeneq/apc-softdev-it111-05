<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SundayReadingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sunday-reading-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sunday_weeknum') ?>

    <?= $form->field($model, 'sunday_name') ?>

    <?= $form->field($model, 'sunday_first_reading') ?>

    <?= $form->field($model, 'sunday_cycle_type') ?>

    <?php // echo $form->field($model, 'sunday_second_reading') ?>

    <?php // echo $form->field($model, 'sunday_second_audio') ?>

    <?php // echo $form->field($model, 'sunday_alleluia_verse') ?>

    <?php // echo $form->field($model, 'sunday_alleluia_audio') ?>

    <?php // echo $form->field($model, 'sunday_responsorial_psalm') ?>

    <?php // echo $form->field($model, 'sunday_responsorial_audio') ?>

    <?php // echo $form->field($model, 'sunday_gospel') ?>

    <?php // echo $form->field($model, 'sunday_gospel_audio') ?>

    <?php // echo $form->field($model, 'sunday_before_gospel') ?>

    <?php // echo $form->field($model, 'sunday_before_gospel_audio') ?>

    <?php // echo $form->field($model, 'sunday_cycle_type') ?>

    <?php // echo $form->field($model, 'sunday_reading_type') ?>

    <?php // echo $form->field($model, 'sunday_description') ?>

    <?php // echo $form->field($model, 'sunday_first_optional') ?>

    <?php // echo $form->field($model, 'sunday_second_optional') ?>

    <?php // echo $form->field($model, 'sunday_responsorial_optional') ?>

    <?php // echo $form->field($model, 'sunday_alleluia_optional') ?>

    <?php // echo $form->field($model, 'sunday_gospel_optional') ?>

    <?php // echo $form->field($model, 'sunday_before_gospel_optional') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
