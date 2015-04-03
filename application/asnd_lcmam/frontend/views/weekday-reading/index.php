<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\WeekdayReadingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Weekday Readings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="weekday-reading-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
      <!--  <?= Html::a('Create Weekday Reading', ['create'], ['class' => 'btn btn-success']) ?> !-->
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'weekday_daynum',
            'weekday_name',
            'weekday_day',
            'weekday_first_reading',
            // 'weekday_first_audio',
            // 'weekday_alleluia_verse',
            // 'weekday_alleluia_audio',
            // 'weekday_responsorial_psalm',
            // 'weekday_responsorial_audio',
            // 'weekday_gospel',
            // 'weekday_gospel_audio',
            'weekday_cycle_num',
            // 'weekday_weeknum',
            // 'weekday_reading_type',
            // 'weekday_first_optional',
            // 'weekday_responsorial_optional',
            // 'weekday_alleluia_optional',
            // 'weekday_gospel_optional',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view}{update}',
                            'buttons'=>[
                              'create' => function ($url, $model) {     
                                return Html::a('<span class="glyphicon glyphicon-plus"></span>', $url, [
                                        'title' => Yii::t('yii', 'Create'),
                                ]);                                
            
                              }
                          ] 





            ],
        ],
    ]); ?>

</div>
