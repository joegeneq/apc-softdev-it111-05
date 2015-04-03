<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\WeekdayReading */

$this->title = $model->weekday_name;
$this->params['breadcrumbs'][] = ['label' => 'Weekday Readings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="weekday-reading-view">

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
            'weekday_daynum',
            'weekday_name',
            'weekday_day',
            'weekday_first_reading',
            'weekday_first_audio',
            'weekday_first_optional',
            'weekday_alleluia_verse',
            'weekday_alleluia_audio',
            'weekday_alleluia_optional',
            'weekday_responsorial_psalm',
            'weekday_responsorial_audio',
            'weekday_responsorial_optional',
            'weekday_gospel',
            'weekday_gospel_audio',
            'weekday_gospel_optional',
            'weekday_cycle_num',
            'weekday_weeknum',
            'weekday_reading_type',
            
                        
            
        ],
    ]) ?>

</div>
