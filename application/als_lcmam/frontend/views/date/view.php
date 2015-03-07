<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Date */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="date-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'year_year_year' => $model->year_year_year], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'year_year_year' => $model->year_year_year], [
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
            'date_month',
            'date_week',
            'date_day',
            'year_year_year',
            'event_id',
            'weekday_reading_id',
            'sunday_reading_id',
        ],
    ]) ?>

</div>
