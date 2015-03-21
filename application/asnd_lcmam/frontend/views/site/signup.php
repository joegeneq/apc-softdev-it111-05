<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Signup';
/*$this->params['breadcrumbs'][] = $this->title;*/

?>
<div class="site-signup">
    <h1 style="color:#52663D;"><?= Html::encode($this->title) ?></h1>

    <p><i>Please fill out the following fields to signup:</i></p>
    <div class="row-signup" position="relative">
        <div class="col-lg-5-signup">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'firstname')
                        ->label(false)
                        ->textInput(['placeholder'=> 'First Name'])



                 ?>
                <br>
                <?= $form->field($model, 'lastname')
                        ->label(false)
                        ->textInput(['placeholder'=> 'Last Name'])

                 ?>
                <br>
                <?= $form->field($model, 'username') 
                        ->label(false)
                        ->textInput(['placeholder'=> ' UserName'])

                ?>
                <br>
                <?= $form->field($model, 'email') 
                        ->label(false)
                        ->textInput(['placeholder'=> 'Email'])

                ?>
                <br>
                <?= $form->field($model, 'password')->passwordInput()
                        ->label(false)
                        ->passwordInput(['placeholder'=> 'Password'])

                 ?>
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>


    <div id="side">
    

    </div>
</div>
