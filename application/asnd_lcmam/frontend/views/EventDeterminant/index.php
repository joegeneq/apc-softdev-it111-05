<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EventDeterminantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Event Determinants';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-determinant-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Event Determinant', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'year',
            'sunday_cycle',
            'weekday_cycle',
            'week_ot_before_lent',
            // 'ash_wednesday',
            // 'easter_sunday',
            // 'pentecost_sunday',
            // 'week_ot_after_pentecost',
            // 'first_sunday_of_advent',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
