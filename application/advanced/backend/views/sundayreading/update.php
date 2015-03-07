<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SundayReading */

$this->title = 'Update Sunday Reading: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sunday Readings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sunday-reading-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
