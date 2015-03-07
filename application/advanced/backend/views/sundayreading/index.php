<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SundayReadingSearch */
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
            'sundayr_cycle_type',
            'sunday_reading',
            'sunday_week_num',
            'sunday_audio_link',
            // 'yearly_reading_set_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
