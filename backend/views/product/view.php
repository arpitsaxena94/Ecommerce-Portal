<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<style>
    .custom-update{
        background-color: #b361c8;
        color:white;
    }
    .custom-update:hover{
        background-color: #d47fe8;
            }
    .custom-delete{
        background-color: #f59eff;
        color:white;
    }
    .custom-delete:hover{
        background-color: #ffbeff;
    }
    .custom-badge{
        background-color: #ffbeff;
    }

    </style>
<div class="product-view">

    <h4><?= Html::encode($this->title) ?></h4>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn custom-update']) ?>

        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn custom-delete',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
         <?= DetailView::widget([
        'model' => $model,
        'attributes' => ['id',
            [
                'attribute' => 'image',
                'format' => ['html'],
                'value' => function ($model) {
                            $imageUrl = $model->getImageUrl();
                            if (!preg_match('#^http(s)?://#', $imageUrl)) {
                               $imageUrl = 'http://' . $imageUrl;
                                 }
                    return Html::img($imageUrl, ['style' => 'width: 100px']);
                }
                ],

            [
                'attribute' => 'name',
                'options' => [
                    'style' => 'white-space: normal'
                ]
            ],
            'description:html',
            [
                'attribute' => 'price',
                'format' => ['currency', 'INR'],
            ],
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => fn() => Html::tag('span', $model->status ? 'Active' : 'Draft', [
                    'class' => $model->status ? 'badge custom-badge' : 'badge '
                ]),
            ],
            'created_at:datetime',
            'updated_at:datetime',
            'createdBy.username',
            'updatedBy.username',
        ],
    ]) ?>


</div>
