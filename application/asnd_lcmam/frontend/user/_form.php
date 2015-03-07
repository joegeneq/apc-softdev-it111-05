<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'middlename')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'contact_num')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'user_type')->textInput(['maxlength' => 45]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
