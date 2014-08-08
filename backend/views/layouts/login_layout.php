<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use backend\assets\AppAsset;
use yii\helpers\Html;
\backend\assets\AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="login">
    <?php $this->beginBody() ?>
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-banner text-center">
                    <h1><i class="fa fa-gears"></i> Flex Admin</h1>
                </div>
                <div class="portlet portlet-green">
                    <div class="portlet-heading login-heading">
                        <div class="portlet-title">
                            <h4><strong>Login to Flex Admin OLD!</strong>
                            </h4>
                        </div>
                        <div class="portlet-widgets">
                            <button class="btn btn-white btn-xs"><i class="fa fa-plus-circle"></i> New User</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="portlet-body">
                        <form accept-charset="UTF-8" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <br>
                                <a href="index.html" class="btn btn-lg btn-green btn-block">Sign In</a>
                            </fieldset>
                            <br>
                            <p class="small">
                                <a href="#">Forgot your password?</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <?= $content?>
    <?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>