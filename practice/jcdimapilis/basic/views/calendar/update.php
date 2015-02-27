<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Calendar */

$this->title = 'Update Calendar: ' . ' ' . $model->Calendar_ID;
$this->params['breadcrumbs'][] = ['label' => 'Calendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Calendar_ID, 'url' => ['view', 'Calendar_ID' => $model->Calendar_ID, 'YEARLY_READING_SET_Reading_ID' => $model->YEARLY_READING_SET_Reading_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="calendar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
