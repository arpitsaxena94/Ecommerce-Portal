<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
?>
<style>
    .submit-button{
        border-radius: 50px;
        background-color: #f59eff;
        width: 100%;

    }
    .submit-button:hover{
        background-color: #ffbeff;

    }
    .custom-width{
        width:300px;
    }

</style>
<div class="">
    <div class="d-flex flex-column align-items-center mt-5 w-100" > <!-- Flexbox to center items -->
        <div class="text-center">
            <img src="<?= \Yii::getAlias('@web') ?>/img/duicon.png" alt="Icon" width="100px;">
            <h1 class="h4 text-gray-900 mb-4"> Samarth Admin</h1>
        </div>

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'user']
        ]); ?>

        <div class="form-group"> <!-- Add a wrapper for form fields -->
            <?= $form->field($model, 'username', [
                'inputOptions' => [
                    'class' => 'form-control form-control-user rounded-input custom-width', // Add your custom class here
                    'placeholder' => 'Username'
                ]
            ])->textInput(['autofocus' => true]) ?>
        </div>

        <div class="form-group">
            <?= $form->field($model, 'password', [
                'inputOptions' => [
                    'class' => 'form-control form-control-user rounded-input', // Add your custom class here
                    'placeholder' => 'Password'
                ]
            ])->passwordInput() ?>
        </div>

        <div class="form-group">
            <?= $form->field($model, 'rememberMe')->checkbox() ?>
        </div>

        <?= Html::submitButton('Login', ['class' => 'btn submit-button btn-user btn-block', 'name' => 'login-button']) ?>

        <hr>
        <?php ActiveForm::end() ?>
        <hr>

        <div class="text-center">
            <a class="small" href="<?php echo \yii\helpers\Url::to(['/site/forgot-password']) ?>">Forgot Password?</a>
        </div>
    </div>
</div>
