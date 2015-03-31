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
      <!-- Removed Create Button


       <?= Html::a('Create Event', ['create'], ['class' => 'btn btn-success']) ?> 

       !-->
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'event_name',
            'event_type',
            'date',
            'event_first_reading',
            // 'event_first_audio',
            // 'event_second_reading',
            // 'event_second_audio',
            // 'event_alleluia_verse',
            // 'event_alleluia_audio',
            // 'event_responsorial_psalm',
            // 'event_responsorial_audio',
            // 'event_gospel',
            // 'event_gospel_audio',
            // 'event_first_optional',
            // 'event_second_optional',
            // 'event_responsorial_optional',
            // 'event_alleluia_optional',
            // 'event_gospel_optional',

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
