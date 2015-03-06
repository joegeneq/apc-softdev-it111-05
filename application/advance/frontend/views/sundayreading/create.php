<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\SundayReading */

$this->title = 'Create Sunday Reading';
$this->params['breadcrumbs'][] = ['label' => 'Sunday Readings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sunday-reading-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
