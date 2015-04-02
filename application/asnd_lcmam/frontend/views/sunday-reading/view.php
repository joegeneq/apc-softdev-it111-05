<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\SundayReading */

$this->title = $model->sunday_name;
$this->params['breadcrumbs'][] = ['label' => 'Sunday Readings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sunday-reading-view">

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
            'sunday_weeknum',
            'sunday_name',
            'sunday_first_reading',
            'sunday_first_audio',
            'sunday_first_optional',
            'sunday_second_reading',
            'sunday_second_audio',
            'sunday_second_optional',
            'sunday_alleluia_verse',
            'sunday_alleluia_audio',
            'sunday_alleluia_optional',
            'sunday_responsorial_psalm',
            'sunday_responsorial_audio',
            'sunday_responsorial_optional',
            'sunday_before_gospel',
            'sunday_before_gospel_audio',
            'sunday_before_gospel_optional',
            'sunday_gospel',
            'sunday_gospel_audio',
            'sunday_gospel_optional',
            'sunday_cycle_type',
            'sunday_reading_type',
            'sunday_description',
            
            
            
            
            
            
        ],
    ]) ?>

</div>
