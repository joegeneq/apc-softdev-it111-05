<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolemnitiesOrFeasts */

$this->title = 'Update Solemnities Or Feasts: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Solemnities Or Feasts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="solemnities-or-feasts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
