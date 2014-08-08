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
 * @var backend\models\search\LanguagesSearch $searchModel
 */

$this->title = Yii::t('app', 'Languages');
$this->params['breadcrumbs'][] = $this->title;
//$url = Yii::$app->urlManager->createUrl(['update',id])
?>

<div class="caption-heading">
     <?= Html::a('<i class="glyphicon glyphicon-plus"></i>'.Yii::t('app', 'New {modelClass}', [
  'modelClass' => 'Languages',
]), ['create'], ['class' => 'btn btn-success']) ?>    
</div>

<div class="languages-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
         'tableOptions' => ['class' => 'table table-striped table-bordered table-hover table-green dataTable'],
         'layout' => "{summary}{items}\n{pager}",       
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'language_id',
            'name',
            'code',
            'image',
            'status',
            // 'sort_order',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
