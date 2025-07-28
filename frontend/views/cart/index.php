<?php

/** @var array $items */
use yii\helpers\Html;
use yii\helpers\Url;
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
    .checkout{
        border-radius: 50px;
        background-color: #f59eff;
        width: auto;

    }
    .checkout:hover{
        background-color: #ffbeff;

    }
</style>
<div class="card">
    <div class="card-header">
        <h3>Cart Items</h3>
    </div>
    <div class="card-body p-0">

        <?php if (!empty($items)): ?>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($items as $item): ?>
                    <tr data-id="<?= Html::encode($item['id']) ?>" data-url="<?= Url::to(['/cart/change-quantity']) ?>">
                        <td><?= Html::encode($item['name']) ?></td>
                        <td>
                            <img src="<?= Html::encode(\common\models\Product::formatImageUrl($item['image'])) ?>"
                                 style="width: 50px;"
                                 alt="<?= Html::encode($item['name']) ?>">
                        </td>
                        <td><?= Yii::$app->formatter->asCurrency($item['price'], 'INR') ?></td>
                        
                        <td>
                            <input type="number" min="1" class="form-control item-quantity" style="width: 60px" value="<?= Html::encode($item['quantity']) ?>">
                        </td>
                        <td><?= Yii::$app->formatter->asCurrency($item['total_price'],'INR') ?></td>
                        <td>
                            <?= Html::a('Delete', ['/cart/delete', 'id' => $item['id']], [
                                'class' => 'btn btn-outline-danger btn-sm',
                                'data-method' => 'post',
                                'data-confirm' => 'Are you sure you want to remove this product from the cart?'
                            ]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <div class="text-right mb-3">
                <a href="<?= Url::to(['/cart/checkout']) ?>" class="btn checkout">Checkout</a>
            </div>
        <?php else: ?>
            <p class="text-muted text-center p-5">There are no items in the cart.</p>
        <?php endif; ?>

    </div>
</div>
