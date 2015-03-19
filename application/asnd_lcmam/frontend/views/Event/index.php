<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'event_name',
            'event_type',
            'event_first_reading',
            'event_first_audio',
            // 'event_second_reading',
            // 'event_second_audio',
            // 'event_alleluia_verse',
            // 'event_alleluia_audio',
            // 'event_responsorial_psalm',
            // 'event_responsorial_audio',
            // 'event_gospel',
            // 'event_gospel_audio',
            // 'date',
            // 'year_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
