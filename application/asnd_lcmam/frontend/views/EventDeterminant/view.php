<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\EventDeterminant */

$this->title = $model->year;
$this->params['breadcrumbs'][] = ['label' => 'Event Determinants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-determinant-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'year',
            'sunday_cycle',
            'weekday_cycle',
            'week_ot_before_lent',
            'ash_wednesday',
            'easter_sunday',
            'pentecost_sunday',
            'week_ot_after_pentecost',
            'first_sunday_of_advent',
        ],
    ]) ?>

</div>
