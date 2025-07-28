<?php
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;

/** @var \yii\web\View $this */
/** @var \common\models\UserAddress $userAddress */

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
    .update1-button{
        border-radius: 50px;
        background-color: #f59eff;
        width: 100%;

    }
    .update1-button:hover{
        background-color: #ffbeff;

    }
    .card2 {
        border: none; /* Remove the default border */
    }
</style>
<?php if (isset($success) && $success): ?>
    <div class="alert alert-success">
        Your address was successfully updated
    </div>
<?php endif ?>

<?php Pjax::begin(['id' => 'address-form-pjax']); // Begin Pjax block here ?>

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card2">
            <div class="card-body">
                <?php $addressForm = ActiveForm::begin([
                    'id' => 'form-address-update',
                    'action' => ['/profile/update-address'],
                    'options' => ['data-pjax' => true]
                ]); ?>

                <?= $addressForm->field($userAddress, 'address', [
                    'labelOptions' => ['class' => 'label-text'],
                    'inputOptions' => ['class' => 'form-control rounded-input', 'placeholder' => 'Enter your address']
                ])->textInput(['autofocus' => true]) ?>

                <?= $addressForm->field($userAddress, 'city', [
                    'labelOptions' => ['class' => 'label-text'],
                    'inputOptions' => ['class' => 'form-control rounded-input', 'placeholder' => 'Enter your city']
                ])->textInput() ?>

                <?= $addressForm->field($userAddress, 'state', [
                    'labelOptions' => ['class' => 'label-text'],
                    'inputOptions' => ['class' => 'form-control rounded-input', 'placeholder' => 'Enter your state']
                ])->textInput() ?>

                <?= $addressForm->field($userAddress, 'country', [
                    'labelOptions' => ['class' => 'label-text'],
                    'inputOptions' => ['class' => 'form-control rounded-input', 'placeholder' => 'Enter your country']
                ])->textInput() ?>

                <?= $addressForm->field($userAddress, 'zipcode', [
                    'labelOptions' => ['class' => 'label-text'],
                    'inputOptions' => ['class' => 'form-control rounded-input', 'placeholder' => 'Enter your zip code']
                ])->textInput() ?>

                <div class="form-group text-center">
                    <?= Html::submitButton('Update', ['class' => 'btn update1-button']) ?>
                </div>

                <?php ActiveForm::end(); // End ActiveForm here ?>
            </div>
        </div>
    </div>
</div>

<?php Pjax::end(); // End Pjax here ?>
