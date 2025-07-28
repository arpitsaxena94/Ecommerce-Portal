<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = 'Order #' . $model->id . ' details';
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$orderAddress = $model->orderAddress;
?>
<style>
    .custom-danger{
        background-color: #b361c8;
        color:white;
    }
</style>
<div class="order-view">

    <h4><?= Html::encode($this->title) ?></h4>

    <p>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn custom-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'total_price',
                'format' => ['currency', 'INR'], // Format as currency in Indian Rupees
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    $statusLabel = \common\models\Order::getStatusLabels()[$model->status] ?? 'Unknown';
                    $color = '';
                    switch ($statusLabel) {
                        case 'Paid':
                            $color = '#b361c8';
                            break;
                        case 'Unpaid':
                            $color = 'grey';
                            break;
                        default:
                            $color = 'grey';
                    }
                    return "<span style='color: {$color};'>" . Html::encode($statusLabel) . "</span>";
                },
            ],
            'firstname',
            'lastname',
            'email:email',
            'transaction_id',
            'paypal_order_id',
            'created_at:datetime',
        ],
    ]) ?>


    <h4>Address</h4>
    <?= DetailView::widget([
        'model' => $orderAddress,
        'attributes' => [
            'address',
            'city',
            'state',
            'country',
            'zipcode',
        ],
    ]) ?>

    <h4>Order Items</h4>
    <table class="table table-sm">
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total Price</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($model->orderItems as $item): ?>
            <tr>
                <td>
                    <?php
                    $imageUrl = $item->product ? $item->product->getImageUrl() : \common\models\Product::formatImageUrl(null);
                    if (!preg_match('/^https?:\/\//', $imageUrl)) {
                        $imageUrl = 'http://' . $imageUrl; // or 'https://' based on your needs
                    }
                    ?>
                    <img src="<?php echo $imageUrl; ?>" style="width: 50px;">

                </td>
                <td><?php echo $item->product_name ?></td>
                <td><?php echo $item->quantity ?></td>
                <td><?php echo Yii::$app->formatter->asCurrency($item->unit_price, 'INR'); ?></td>
                <td><?php echo Yii::$app->formatter->asCurrency($item->quantity * $item->unit_price) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>
