<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\SundayReading */

$this->title = 'Update Sunday Reading: ' . ' ' . $model->sunday_name;
$this->params['breadcrumbs'][] = ['label' => 'Sunday Readings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sunday_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sunday-reading-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
