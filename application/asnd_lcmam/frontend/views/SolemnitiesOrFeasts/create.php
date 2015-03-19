<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\SolemnitiesOrFeasts */

$this->title = 'Create Solemnities Or Feasts';
$this->params['breadcrumbs'][] = ['label' => 'Solemnities Or Feasts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solemnities-or-feasts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
