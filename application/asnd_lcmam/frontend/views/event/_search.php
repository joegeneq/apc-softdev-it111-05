<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\EventSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'event_name') ?>

    <?= $form->field($model, 'event_type') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'event_first_reading') ?>

    <?php // echo $form->field($model, 'event_first_audio') ?>

    <?php // echo $form->field($model, 'event_second_reading') ?>

    <?php // echo $form->field($model, 'event_second_audio') ?>

    <?php // echo $form->field($model, 'event_alleluia_verse') ?>

    <?php // echo $form->field($model, 'event_alleluia_audio') ?>

    <?php // echo $form->field($model, 'event_responsorial_psalm') ?>

    <?php // echo $form->field($model, 'event_responsorial_audio') ?>

    <?php // echo $form->field($model, 'event_gospel') ?>

    <?php // echo $form->field($model, 'event_gospel_audio') ?>

    <?php // echo $form->field($model, 'event_first_optional') ?>

    <?php // echo $form->field($model, 'event_second_optional') ?>

    <?php // echo $form->field($model, 'event_responsorial_optional') ?>

    <?php // echo $form->field($model, 'event_alleluia_optional') ?>

    <?php // echo $form->field($model, 'event_gospel_optional') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
