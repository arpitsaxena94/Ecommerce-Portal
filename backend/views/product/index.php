<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .custom-create{
        background-color: #b361c8;
        color: #fff;
    }
    .custom-create:hover{
        background-color: #d47fe8;
    }
    .custom-badge{
        background-color: #ffbeff;
    }
    .grid-view th {
        background-color: white;
        color:grey !important;
    }

</style>
<div class="product-index">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Create Course', ['create'], ['class' => 'btn custom-create']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'attribute' => 'id',
                    'headerOptions' => ['style' => 'color: grey;'],
                    'contentOptions' => [
                        'style' => 'width: 60px',
                    ],
                ],
                [
                    'label' => 'Image',
                    'headerOptions' => ['style' => 'color: grey;'],
                    'attribute' => 'image',
                    'content' => function ($model) {
                        $imageUrl = $model->getImageUrl();
                        if (!preg_match('#^http(s)?://#', $imageUrl)) {
                            $imageUrl = 'http://' . $imageUrl;
                        }
                        return Html::img($imageUrl, ['style' => 'width: 100px']);
                    },
                ],
                [
                    'attribute' => 'name',
                    'headerOptions' => ['style' => 'color: grey;'],
                    'content' => function ($model) {
                        return \yii\helpers\StringHelper::truncateWords($model->name, 7);
                    },
                ],
                [
                    'attribute' => 'price',
                    'format' => ['currency', 'INR'], // Specify INR for Rupee formatting
                    'headerOptions' => ['style' => 'color: grey;'],
                ],
                [
                    'attribute' => 'status',
                    'headerOptions' => ['style' => 'color: grey;'],
                    'content' => function ($model) {
                        return Html::tag('span', $model->status ? 'Active' : 'Draft', [
                            'class' => $model->status ? 'badge custom-badge' : 'badge badge-danger',
                        ]);
                    },
                ],
                [
                    'attribute' => 'created_at',
                    'format' => ['datetime'],
                    'headerOptions' => ['style' => 'color: grey;'],
                    'contentOptions' => ['style' => 'white-space: nowrap'],
                ],
                [
                    'attribute' => 'updated_at',
                    'format' => ['datetime'],
                    'headerOptions' => ['style' => 'color: grey;'],
                    'contentOptions' => ['style' => 'white-space: nowrap'],
                ],
                [
                    'class' => 'common\grid\ActionColumn',
                    'contentOptions' => [
                        'class' => 'td-actions',
                    ],
                    'template' => '{view} {update} {delete}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<i class="fas fa-eye"></i>', $url, [
                                'title' => 'View',
                                'aria-label' => 'View',
                                'data-pjax' => '0',
                                'class' => 'action-icon view-icon',
                            ]);
                        },
                        'update' => function ($url, $model) {
                            return Html::a('<i class="fas fa-pencil-alt"></i>', $url, [
                                'title' => 'Update',
                                'aria-label' => 'Update',
                                'data-pjax' => '0',
                                'class' => 'action-icon update-icon',
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
    </div>

    <style>

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
    <?php
    $this->registerCss("
    .grid-view.table th {
        color: grey !important; 
    }
    .grid-view.table th a {
        color: grey !important; 
        text-decoration: none;
    }
    .grid-view.table th a:hover {
        color: darkgrey; 
    }
");
    ?>
