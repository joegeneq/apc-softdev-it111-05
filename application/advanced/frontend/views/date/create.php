<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Date */

$this->title = 'Create Date';
$this->params['breadcrumbs'][] = ['label' => 'Dates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="date-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
