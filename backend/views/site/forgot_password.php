<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model \backend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
?>
<style>
    .submit-button{
        background-color:#f59eff;
        width:auto;
    }
    .submit-button:hover{
        background-color:#ffbeff;
    }

</style>
<div class="row">
    <div class="col">
        <div class="">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Forgot  password??</h1>
            </div>
            <?php $form = ActiveForm::begin([
                'id' => 'forgot-password-form',
                'options' => ['class' => 'user']
            ]); ?>

            <?= $form->field($model, 'email', [
                'inputOptions' => [
                    'class' => 'form-control form-control-user',
                    'placeholder' => 'Enter your email'
                ]
            ])->textInput(['autofocus' => true]) ?>

            <div class="d-flex justify-content-center">
            <?= Html::submitButton('Submit', ['class' => 'btn  btn-user btn-block submit-button ', 'name' => 'login-button']) ?>
            </div>
                <?php ActiveForm::end() ?>
            <hr>
            <div class="text-center">
                <a class="small" href="<?php echo \yii\helpers\Url::to(['/site/login']) ?>">Login</a>
            </div>
        </div>
    </div>
</div>