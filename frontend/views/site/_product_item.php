<?php
/** @var \common\models\Product $model */

// Set your exchange rate
$exchangeRate = 82; // 1 USD to INR
?>

<style>
    .submit-button {
        background-color: #9F2B68;
        color: white;
    }
    .submit-button:hover {
        background-color: #ffbeff;
    }
</style>
<div class="card h-100 mt-5 p-5 rounded bg-light">
    <a href="#" class="img-wrapper">
        <img class="card-img-top" src="<?php echo $model->getImageUrl() ?>" alt="">
    </a>
    <div class="card-body">
        <h5 class="card-title">
            <a href="#" class="text-dark"><?php echo \yii\helpers\StringHelper::truncateWords($model->name, 20) ?></a>
        </h5>
        <h5>
            <?php
            echo '₹' . $model->price;
            ?></h5>
        <div class="card-text">
            <?php echo $model->getShortDescription() ?>
        </div>
    </div>
    <div class="card-footer text-right">
        <form action="<?php echo \yii\helpers\Url::to(['/cart/add']) ?>" method="post" style="display: inline; background-color: grey;">
            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>"> <!-- CSRF token -->
            <input type="hidden" name="id" value="<?php echo $model->id; ?>"> <!-- Send product ID -->
            <button type="submit" class="btn btn-primary btn-add-to-cart submit-button">
                Add to Cart
            </button>
        </form>
    </div>
</div>
