<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolemnitiesOrFeasts */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Solemnities, Feasts and Memorials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solemnities-or-feasts-view">

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
            'date',
            'title',
            'type',
            'first_reading',
            'first_reading_audio',
            'responsorial_psalm',
            'responsorial_psalm_audio',
            'second_reading',
            'second_reading_audio',
            'alleluia_verse',
            'alleluia_verse_audio',
            'gospel',
            'gospel_audio',
            'rule',
            'cycle_type',
        ],
    ]) ?>

</div>
