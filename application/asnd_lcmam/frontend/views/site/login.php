<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
?>
<div class="site-login" align="center">


   
  <!--  <p>Please fill out the following fields to login:</p> !-->
  <br>
  <br>
  
    <div class="row-login" position="relative">
    
        <div class="col-lg-5-login" position="absolute" align="center">
        
            <img src="images/ALC_Logo.png" width="200" height="200" align="center">
            <br>
            
            <br>

        
        
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>
    
</div>
