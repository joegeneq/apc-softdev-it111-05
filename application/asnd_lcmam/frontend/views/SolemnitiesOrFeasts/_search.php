<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolemnitiesOrFeastsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solemnities-or-feasts-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'first_reading') ?>

    <?= $form->field($model, 'first_reading_audio') ?>

    <?php // echo $form->field($model, 'responsorial_psalm') ?>

    <?php // echo $form->field($model, 'responsorial_psalm_audio') ?>

    <?php // echo $form->field($model, 'second_reading') ?>

    <?php // echo $form->field($model, 'second_reading_audio') ?>

    <?php // echo $form->field($model, 'gospel') ?>

    <?php // echo $form->field($model, 'gospel_audio') ?>

    <?php // echo $form->field($model, 'type') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
