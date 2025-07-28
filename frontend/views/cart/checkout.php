<?php
/**
 * User: TheCodeholic
 * Date: 12/12/2020
 * Time: 8:12 PM
 */
/** @var \common\models\Order $order */
/** @var \common\models\OrderAddress $orderAddress */
/** @var array $cartItems */
/** @var int $productQuantity */

/** @var float $totalPrice */

use yii\bootstrap4\ActiveForm;

?>

<?php $form = ActiveForm::begin([
    'id' => 'checkout-form',
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
    .checkout {
        border-radius: 50px;
        background-color: #f59eff;
        width: 100%;
    }
    .checkout:hover {
        background-color: #ffbeff;
    }
</style>
<div class="row">
    <div class="col">
        <div class="card mb-3">
            <div class="card-header">
                <h5>Account information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($order, 'firstname', [
                            'inputOptions' => ['class' => 'form-control rounded-input', 'autofocus' => true]
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($order, 'lastname', [
                            'inputOptions' => ['class' => 'form-control rounded-input', 'autofocus' => true]
                        ]) ?>
                    </div>
                </div>

                <?= $form->field($order, 'email', [
                    'inputOptions' => ['class' => 'form-control rounded-input', 'autofocus' => true]
                ]) ?>

            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5>Address information</h5>
            </div>
            <div class="card-body">
                <?= $form->field($orderAddress, 'address', [
                    'inputOptions' => ['class' => 'form-control rounded-input'],
                ]) ?>

                <?= $form->field($orderAddress, 'city', [
                    'inputOptions' => ['class' => 'form-control rounded-input'],
                ]) ?>

                <?= $form->field($orderAddress, 'state', [
                    'inputOptions' => ['class' => 'form-control rounded-input'],
                ]) ?>

                <?= $form->field($orderAddress, 'country', [
                    'inputOptions' => ['class' => 'form-control rounded-input'],
                ]) ?>

                <?= $form->field($orderAddress, 'zipcode', [
                    'inputOptions' => ['class' => 'form-control rounded-input'],
                ]) ?>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5>Order Summary</h5>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($cartItems as $item): ?>
                        <tr>
                            <td>
                                <img src="<?php echo \common\models\Product::formatImageUrl($item['image']) ?>"
                                     style="width: 50px;"
                                     alt="<?php echo $item['name'] ?>">
                            </td>
                            <td><?php echo $item['name'] ?></td>
                            <td><?php echo $item['quantity'] ?></td>
                            <td><?php echo Yii::$app->formatter->asCurrency($item['total_price'], 'INR') ?></td> <!-- Updated to INR -->
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <hr>
                <table class="table">
                    <tr>
                        <td>Total Items</td>
                        <td class="text-right"><?php echo $productQuantity ?></td>
                    </tr>
                    <tr>
                        <td>Total Price</td>
                        <td class="text-right">
                            <?php echo Yii::$app->formatter->asCurrency($totalPrice, 'INR') ?> <!-- Confirmed INR usage -->
                        </td>
                    </tr>
                </table>

                <p class="text-right mt-3">
                    <button class="btn btn-secondary checkout">Checkout</button>
                </p>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
