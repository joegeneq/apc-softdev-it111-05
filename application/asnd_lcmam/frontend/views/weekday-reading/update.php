<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\WeekdayReading */

$this->title = 'Update Weekday Reading: ' . ' ' . $model->weekday_name;
$this->params['breadcrumbs'][] = ['label' => 'Weekday Readings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->weekday_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="weekday-reading-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
