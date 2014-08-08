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
use \yii\helpers\ArrayHelper;
/**
 * @var yii\web\View $this
 * @var backend\models\BackendActionRoles $model
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
    <?= $form->field($model, 'backend_role')->dropDownList(ArrayHelper::map(\backend\models\BackendRoles::find('status=1')->all(), 'backend_roles_id', 'backend_roles')) ?>

    <?= $form->field($model, 'backend_action')->dropDownList(ArrayHelper::map(\backend\models\BackendAction::find('status=1')->all(), 'backend_action_id', 'backend_action')) ?>

    <?= $form->field($model, 'controller')->dropDownList(ArrayHelper::map(\backend\models\BackendControllers::find('status=1')->all(), 'backend_controller_id', 'backend_controller_display')) ?>

    <?= $form->field($model, 'status')->dropDownList([1=>'Active',0=>'InActive']) ?>   

    <?php ActiveForm::end(); ?>

</div>
