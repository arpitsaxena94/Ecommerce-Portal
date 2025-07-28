<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Signup';
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
    .signup-button{
        border-radius: 50px;
        background-color: #f59eff;
        width: 100%;

    }
    .signup-button:hover{
        background-color: #ffbeff;

    }


</style>
<div class="site-signup">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header text-center">
                    <h2><?= Html::encode($this->title) ?></h2>
                </div>
                <div class="card-body">

                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'firstname', [
                                'labelOptions' => ['class' => 'label-text'],
                                'inputOptions' => ['class' => 'form-control rounded-input', 'placeholder' => 'First name']
                            ])->textInput(['autofocus' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'lastname', [
                                'labelOptions' => ['class' => 'label-text'],
                                'inputOptions' => ['class' => 'form-control rounded-input', 'placeholder' => 'Last name']
                            ])->textInput() ?>
                        </div>
                    </div>

                    <?= $form->field($model, 'username', [
                        'labelOptions' => ['class' => 'label-text'],
                        'inputOptions' => ['class' => 'form-control rounded-input', 'placeholder' => 'Username']
                    ])->textInput() ?>

                    <?= $form->field($model, 'email', [
                        'labelOptions' => ['class' => 'label-text'],
                        'inputOptions' => ['class' => 'form-control rounded-input', 'placeholder' => 'Email']
                    ])->textInput() ?>

                    <?= $form->field($model, 'password', [
                        'labelOptions' => ['class' => 'label-text'],
                        'inputOptions' => ['class' => 'form-control rounded-input', 'placeholder' => 'Password']
                    ])->passwordInput() ?>
                    <div style="margin: 1em 0;"></div>
                    <div class="form-group text-center">
                        <?= Html::submitButton('Signup', ['class' => 'btn signup-button', 'name' => 'signup-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

