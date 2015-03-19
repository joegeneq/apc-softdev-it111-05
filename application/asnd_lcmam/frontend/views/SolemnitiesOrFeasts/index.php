<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SolemnitiesOrFeastsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solemnities Or Feasts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solemnities-or-feasts-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Solemnities Or Feasts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date',
            'title',
            'first_reading',
            'first_reading_audio',
            // 'responsorial_psalm',
            // 'responsorial_psalm_audio',
            // 'second_reading',
            // 'second_reading_audio',
            // 'gospel',
            // 'gospel_audio',
            // 'type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
