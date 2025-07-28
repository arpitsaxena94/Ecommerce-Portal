<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;


$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .rounded-input {
        border-radius: 50px;
        padding: 10px 20px;
        border: 1px solid #ced4da;
    }

    .label-text {
        color: #6c757d;
        margin-bottom: 5px;
        font-weight: 500;
        font-size: 0.9rem;
    }
    .login-button{
        border-radius: 50px;
        background-color: #f59eff;
        width: 100%;

    }
    .login-button:hover{
      background-color: #ffbeff;

    }


</style>
<div class="site-login">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header text-center">
                    <h2><?= Html::encode($this->title) ?></h2>
                </div>
                <div class="card-body">
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <!-- Username field with label -->
                    <?= $form->field($model, 'username', [
                        'labelOptions' => ['class' => 'label-text'], // Label with custom faded color class
                        'inputOptions' => ['class' => 'form-control rounded-input', 'placeholder' => 'Enter your username']
                    ])->textInput(['autofocus' => true]) ?>

                    <!-- Password field with label -->
                    <?= $form->field($model, 'password', [
                        'labelOptions' => ['class' => 'label-text'], // Label with custom faded color class
                        'inputOptions' => ['class' => 'form-control rounded-input', 'placeholder' => 'Enter your password']
                    ])->passwordInput() ?>

                    <?= $form->field($model, 'rememberMe')->checkbox() ?>

                    <div style="color:#999;margin:1em 0">
                        Forgot password <?= Html::a('Reset', ['site/request-password-reset']) ?>.
                        <br>
                        Verify email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
                    </div>
                    <div style="margin: 1em 0;"></div>
                    <div class="form-group text-center">
                        <?= Html::submitButton('Login', ['class' => 'btn login-button', 'name' => 'login-button']) ?>
                    </div>

                    <div style="margin: 1em 0;"></div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>







