<?php
/**
 * Copyright (C) 2014 Dinesh Sharma - All Rights Reserved
 * You may use, distribute and modify this code under the
 * terms of the GPL license.
 *
 * You should have received a copy of the GPL license with
 * this file. If not, please visit :
 * https://gnu.org/licenses/gpl.html
*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var backend\models\BackendControllers $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="half-div">

    <?php $form = ActiveForm::begin(); ?>
    <div class="caption-heading">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>        
        <?= Html::a('<i class="glyphicon glyphicon-circle-arrow-left"></i>&nbsp'.Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-warning']) ?>                
        <?= $this->title ?>
    </div>
    <?= $form->field($model, 'backend_controller')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'backend_controller_display')->textInput(['maxlength' => 55]) ?>

    <?= $form->field($model, 'status')->dropDownList([1=>'Active',0=>'InActive']) ?>

    <?php ActiveForm::end(); ?>

</div>
