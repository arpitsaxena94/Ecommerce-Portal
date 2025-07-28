<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Html;

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
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<style>
    html,body{
        background-color:#9343A8;
    }

    </style>
</style>
<body class="">
<?php $this->beginBody() ?>

<div class="container">

    <div class="row justify-content-center">

        <div class="" style="width: 500px;height: auto;">

            <div class="card o-hidden border-0 shadow-lg my-5" >
                <div class="card-body " >

                    <?= Alert::widget() ?>
                    <!-- Nested Row within Card Body -->
                    <?php echo $content ?>
                </div>
            </div>

        </div>

    </div>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
