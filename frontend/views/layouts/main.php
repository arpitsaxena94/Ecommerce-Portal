<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use frontend\assets\AppAsset;
use common\widgets\Alert;

$cartItemCount = \Yii::$app->params['cartItemCount'] ?? 0; // Get the cart item count from params


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title>Samarth Online Courses</title>
    <?php $this->head() ?>


    <style>
     .custom-navbar{
         background-color: #9343A8;

     }

    </style>
</head>
<body>

<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/img/duicon.png', ['alt' => 'Logo', 'style' => 'height:70px; width:auto; margin-right:10px;']) . 'SAMARTH ONLINE COURSES',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg navbar-dark fixed-top custom-navbar' ,'justify-content-end',
        ],
    ]);

    $menuItems = [
        [
            'label' => 'Cart <span id="cart-quantity"></span>',
            'url' => ['/cart/index'],
            'encode' => false,
        ],
    ];

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => Yii::$app->user->identity->getDisplayName(),
            'items' => [
                [
                    'label' => 'Profile',
                    'url' => ['/profile/index'],
                ],
                [
                    'label' => 'Logout',
                    'url' => ['/site/logout'],
                    'linkOptions' => [
                        'data-method' => 'post',
                    ],
                ],
            ],
        ];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'], 
                'items' => $menuItems,
    ]);

    NavBar::end();

    ?>


</div>
<section style="margin-top:150px;margin-bottom:100px;">
<div class="container">
    <?= Alert::widget() ?>
    <?= $content ?>
</div>
</section>
<footer class="footer">
    <div class="container" style="position: relative;z-index: 1;margin-top:50px;margin-bottom:20px;">
        <div class="row">
            <div class="col">
                <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
            </div>

            <div class="col text-right">
                <p class="pull-right">Created by <a href="" target="_blank">arpitsaxena</a></p>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
