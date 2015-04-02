<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Event */

$this->title = $model->event_name;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id],  ['class' => 'btn btn-primary']) ?>
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
            'event_name',
            'event_type',
            'date',
            'event_first_reading',
            'event_first_audio',
            'event_first_optional',
            'event_second_reading',
            'event_second_audio',
            'event_second_optional',
            'event_alleluia_verse',
            'event_alleluia_audio',
            'event_responsorial_psalm',
            'event_responsorial_audio',
            'event_responsorial_optional',
            'event_gospel',
            'event_gospel_audio',
            'event_gospel_optional',
        ],
    ]) ?>

</div>
