<?php

/* @var $this yii\web\View */
/** @var \yii\data\ActiveDataProvider $dataProvider */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content m-5">

        <?php echo \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'layout' => '<div class="row">{items}</div><div class="summary m-5 text-end">{summary}</div>{pager}', // Added text-end class
            'itemView' => '_product_item',
            'itemOptions' => [
                'class' => 'col-lg-4 col-md-6 mb-4 product-item'
            ],
            'summary' => 'Showing <b>{count}</b> out of <b>{totalCount}</b> items',
            'pager' => [
                'class' => \yii\bootstrap4\LinkPager::class
            ]
        ]) ?>



    </div>
</div>
