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
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var backend\models\search\CategoriesLanguageSearch $searchModel
 */

//$this->title = Yii::t('app', 'Categories Languages');
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="caption-heading">
    <div style="float: left">           
     <?= Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp'.Yii::t('app', 'New {modelClass}', [
  'modelClass' => 'Categories Language',
]), ['create'], ['class' => 'btn btn-success']) ?>    
    </div>
    <div style="float: right">
     <?= Html::beginForm('', 'get'); ?>
     <?= 'Records Per Page&nbsp'.Html::dropDownList('per-page', (isset($_GET['per-page'])?$_GET['per-page']:NULL), [10=>10,20=>20,50=>50,100=>100],['onchange'=>'this.form.submit()']);?>
     <?= Html::endForm();?>
    </div>
        
</div>

<div class="categories-language-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
         'tableOptions' => ['class' => 'table table-striped table-bordered table-hover table-green dataTable'],
         'layout' => "{summary}{items}\n{pager}",        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'categories_language_id',
            'categories_id',
            'language_id',
            'language_title',
            'status',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
