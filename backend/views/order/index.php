<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h2><?= Html::encode($this->title) ?></h2>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'id' => 'ordersTable',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
            'class' => \yii\bootstrap4\LinkPager::class
        ],
        'columns' => [

            [
                'attribute' => 'id',
                'contentOptions' => ['style' => 'width: 80px;']
            ],
            [
                'attribute' => 'fullname',
                'content' => function ($model) {
                    return $model->firstname . ' ' . $model->lastname;
                },
            ],
            [
                'attribute' => 'total_price',
                'format' => ['currency', 'INR'], // Format as currency in Indian Rupees
                'headerOptions' => ['style' => 'color: grey;'],
            ],

            //'email:email',
            //'transaction_id',
            //'paypal_order_id',
            [
                'attribute' => 'status',
                'filter' => Html::activeDropDownList($searchModel, 'status', \common\models\Order::getStatusLabels(), [
                    'class' => 'form-control',
                    'prompt' => 'All'
                ]),
                'format' => 'raw', // Use 'raw' format to render HTML
                'value' => function ($model) {
                    // Get the status label
                    $statusLabel = \common\models\Order::getStatusLabels()[$model->status] ?? 'Unknown';

                    // Determine the color based on the status
                    $color = match ($statusLabel) {
                        'Paid' => '#b361c8',
                        'inactive' => 'red',
                        'pending' => 'orange',
                        default => 'grey',
                    };

                    // Return a styled span element
                    return Html::tag('span', $statusLabel, ['class' => 'badge','style' => "background-color: $color;color: white; font-weight: bold;"]);
                }
            ],

            'created_at:datetime',
            //'created_by',

            [
                'class' => 'common\grid\ActionColumn',
                'contentOptions' => [
                    'class' => 'td-actions',
                ],
                'template' => '{view} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<i class="fas fa-eye"></i>', $url, [
                            'title' => 'View',
                            'aria-label' => 'View',
                            'data-pjax' => '0',
                            'class' => 'action-icon view-icon',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<i class="fas fa-trash-alt"></i>', $url, [
                            'title' => 'Delete',
                            'aria-label' => 'Delete',
                            'data-pjax' => '0',
                            'class' => 'action-icon delete-icon',
                            'data-method' => 'post',
                            'data-confirm' => 'Are you sure you want to delete this item?',
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>


</div> <style>

    .action-icon {
        color: #9343a8; /* Default color */
        transition: color 0.3s; /* Smooth transition */
    }

    .action-icon:hover {
        color: ; /* Change color on hover */
    }

    .view-icon {
        color: #9343a8; /* Color for view icon */
    }

    .update-icon {
        color: #4e4351; /* Color for update icon */
    }

    .delete-icon {
        color: #b4a7b7; /* Color for delete icon */
    }

</style>
