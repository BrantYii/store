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
use backend\models\Languages;

/**
 * @var yii\web\View $this
 * @var backend\models\CategoriesLanguage $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="half-div">

    <?php $form = ActiveForm::begin(); ?>
    <div class="caption-heading">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>        
        <?= Html::a('<i class="glyphicon glyphicon-circle-arrow-left"></i>&nbsp'.Yii::t('app', 'Back'), ['categories/index'], ['class' => 'btn btn-warning']) ?>                
        <?= $this->title ?>
    </div>

    <?= $form->field($model, 'language_title')->textInput(['maxlength' => 32]) ?>    

    <?= $form->field($model, 'categories_id')->textInput() ?>

    <?= $form->field($model, 'language_id')->dropDownList(yii\helpers\ArrayHelper::map(Languages::find()->where('status>"0"')->all(), 'language_id', 'name')) ?>

    <?= $form->field($model, 'status')->textInput() ?>


    <?php ActiveForm::end(); ?>

</div>
