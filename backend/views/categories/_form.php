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
 * @var backend\models\Categories $model
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
    <?= $form->field($model, 'default_title')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'parent_id')->textInput() ?>
 <?php  
   $catt = \backend\models\Categories::find()->where('status > "0"')->all(); 
   echo vendor\brantyii\ztree\ZTreeRadio::widget([ 
   'items'=> $catt, 
   'id_column'=>'categories_id', 
   'pId_column'=>'parent_id',    
   'name_column'=>'default_title', 
    'settings'=>[ 
        'check'=>[ 
       'enable'=> true, 
       'chkStyle'=> "radio", 
       'radioType'=> "level", 
        ], 
        'data'=>[ 
            'simpleData'=>[ 
                'enable'=>true 
            ], 
         'expandFlag'=>false,   
        ], 
    ], 
   'model'=>$model, 
   'attribute'=>'parent_id' 
]);   
   ?> 
    <?= $form->field($model, 'image')->textInput(['maxlength' => 64]) ?>
    <?= $form->field($model, 'status')->textInput() ?>    
<!--
    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>
-->

    <?php ActiveForm::end(); ?>

</div>
