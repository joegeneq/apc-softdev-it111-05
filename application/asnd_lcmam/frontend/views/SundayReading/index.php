<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SundayReadingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sunday Readings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sunday-reading-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sunday Reading', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'sunday_weeknum',
            'sunday_first_reading',
            'sunday_first_audio',
            'sunday_second_reading',
            // 'sunday_second_audio',
            // 'sunday_alleluia_verse',
            // 'sunday_alleluia_audio',
            // 'sunday_responsorial_psalm',
            // 'sunday_responsorial_audio',
            // 'sunday_gospel',
            // 'sunday_gospel_audio',
            // 'sunday_before_gospel',
            // 'sunday_before_gospel_audio',
            // 'sunday_cycle_type',
            // 'sunday_reading_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
