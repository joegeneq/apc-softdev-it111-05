<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Calendar */

$this->title = $model->Calendar_ID;
$this->params['breadcrumbs'][] = ['label' => 'Calendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Calendar_ID' => $model->Calendar_ID, 'YEARLY_READING_SET_Reading_ID' => $model->YEARLY_READING_SET_Reading_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Calendar_ID' => $model->Calendar_ID, 'YEARLY_READING_SET_Reading_ID' => $model->YEARLY_READING_SET_Reading_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Calendar_ID',
            'Calendar_Year',
            'Calendar_Month',
            'Calendar_Date',
            'YEARLY_READING_SET_Reading_ID',
        ],
    ]) ?>

</div>
