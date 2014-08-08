<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var \common\models\LoginForm $model
 */
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-banner text-center">
                    <h1><i class="fa fa-gears"></i> Flex Admin</h1>
                </div>
                <div class="portlet portlet-green">
                    <div class="portlet-heading login-heading">
                        <div class="portlet-title">
                            <h4><strong><?= Html::encode($this->title) ?></strong>
                            </h4>
                        </div>
                        <div class="portlet-widgets">
                            <button class="btn btn-white btn-xs"><i class="fa fa-plus-circle"></i> New User</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="portlet-body">
                <div class="form-group">
                    
                </div>

            <?php $form = ActiveForm::begin(['id' => 'login-form',]); ?>                        
                        <form accept-charset="UTF-8" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <!--<input class="form-control" placeholder="E-mail" name="email" type="text">-->
                                    <?= $form->field($model, 'username') ?>                                    
                                </div>
                                <div class="form-group">
                                    <?= $form->field($model, 'password')->passwordInput() ?>                                    
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <?= $form->field($model, 'rememberMe')->checkbox() ?>                                        
                                    </label>
                                </div>
                                <br>
                                <!--<a href="index.html" class="btn btn-lg btn-green btn-block">Sign In</a>-->
                                <?= Html::submitButton('Login', ['class' => 'btn btn-lg btn-green btn-block', 'name' => 'login-button']) ?>                                
                            </fieldset>
            <?php ActiveForm::end(); ?>       
                    </div>
                </div>
            </div>
        </div>
    </div>