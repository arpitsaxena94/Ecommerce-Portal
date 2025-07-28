<?php
/**
 * User: TheCodeholic
 * Date: 12/12/2020
 * Time: 1:54 PM
 */
/** @var \common\models\User $user */

/** @var \yii\web\View $this */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
?>

<?php if (isset($success) && $success): ?>
    <div class="alert alert-success">
        Your account was successfully updated
    </div>
<?php endif ?>
<?php $form = ActiveForm::begin([
    'action' => ['/profile/update-account'],
    'options' => [
        'data-pjax' => 1
    ]
]); ?>
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
    .update2-button{
        border-radius: 50px;
        background-color: #f59eff;
        width: 100%;

    }
    .update2-button:hover{
        background-color: #ffbeff;

    }
</style>
<div class="row justify-content-center">
    <div class="col-lg-12"> <!-- Set to 100% width of the parent container -->
        <div class="card2">
            <div class="card-body">
                <?php $form = ActiveForm::begin(['id' => 'form-update']); ?>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($user, 'firstname', [
                            'labelOptions' => ['class' => 'label-text'],
                            'inputOptions' => ['class' => 'form-control rounded-input', 'placeholder' => 'Enter your first name']
                        ])->textInput(['autofocus' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($user, 'lastname', [
                            'labelOptions' => ['class' => 'label-text'],
                            'inputOptions' => ['class' => 'form-control rounded-input', 'placeholder' => 'Enter your last name']
                        ])->textInput() ?>
                    </div>
                </div>

                <?= $form->field($user, 'username', [
                    'labelOptions' => ['class' => 'label-text'],
                    'inputOptions' => ['class' => 'form-control rounded-input', 'placeholder' => 'Enter your username']
                ])->textInput() ?>

                <?= $form->field($user, 'email', [
                    'labelOptions' => ['class' => 'label-text'],
                    'inputOptions' => ['class' => 'form-control rounded-input', 'placeholder' => 'Enter your email']
                ])->textInput() ?>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($user, 'password', [
                            'labelOptions' => ['class' => 'label-text'],
                            'inputOptions' => ['class' => 'form-control rounded-input', 'placeholder' => 'Enter new password']
                        ])->passwordInput() ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($user, 'password_repeat', [
                            'labelOptions' => ['class' => 'label-text'],
                            'inputOptions' => ['class' => 'form-control rounded-input', 'placeholder' => 'Repeat new password']
                        ])->passwordInput() ?>
                    </div>
                </div>

                <div class="form-group text-center">
                    <?= Html::submitButton('Update', ['class' => 'btn update2-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>


<?php ActiveForm::end(); ?>

