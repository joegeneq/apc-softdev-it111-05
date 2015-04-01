<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\EventDeterminant */

$this->title = 'Create Event Determinant';
$this->params['breadcrumbs'][] = ['label' => 'Event Determinants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-determinant-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
