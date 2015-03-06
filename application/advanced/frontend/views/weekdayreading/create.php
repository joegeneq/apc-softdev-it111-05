<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\WeekdayReading */

$this->title = 'Create Weekday Reading';
$this->params['breadcrumbs'][] = ['label' => 'Weekday Readings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="weekday-reading-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
