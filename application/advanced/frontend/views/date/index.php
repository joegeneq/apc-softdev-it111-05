<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="date-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Date', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date_month',
            'date_week',
            'date_day',
            'year_year_year',
            // 'event_id',
            // 'weekday_reading_id',
            // 'sunday_reading_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
