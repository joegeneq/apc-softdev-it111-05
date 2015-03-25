<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolemnitiesOrFeasts */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Solemnities Or Feasts', 'url' => ['index']];
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
        ],
    ]) ?>

</div>
