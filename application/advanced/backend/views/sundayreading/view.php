<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SundayReading */

$this->title = $model->id;
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
            'sundayr_cycle_type',
            'sunday_reading',
            'sunday_week_num',
            'sunday_audio_link',
            'yearly_reading_set_id',
        ],
    ]) ?>

</div>
