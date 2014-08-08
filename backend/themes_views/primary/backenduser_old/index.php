<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\db\Expression;
/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var backend\models\search\BeackendUserSearch $searchModel
 */
$this->title = Yii::t('app', 'Backend Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- begin PAGE TITLE ROW -->
    <!--<div class="col-lg-12">
        <div class="page-title">
            <h1><?= Html::encode($this->title) ?>
                <small>Content Overview</small>
            </h1>
        </div>
    </div>
<!-- end PAGE TITLE ROW -->
    <div class="caption-heading">
        <div style="float: left">           
        <?=
        Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp'.Yii::t('app', 'New {modelClass}', [
                    'modelClass' => 'Backend User',
                ]), ['create'], ['class' => 'btn btn-success']);        
        ?>   
        </div>
        <div style="float: right">        
        <?= Html::beginForm('', 'get');?>
        <?= 'Records Per Page&nbsp'.Html::dropDownList('per-page', (isset($_GET['per-page'])?$_GET['per-page']:NULL), [10=>10,20=>20,50=>50,100=>100],['onchange'=>'this.form.submit()']); ?>
        <?= Html::endForm();?>
        </div>
        
    </div>
 <div class="backend-user-index">
    <?=
    GridView::widget([    
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
         'tableOptions' => ['class' => 'table table-striped table-bordered table-hover table-green dataTable'],
         'layout' => "{items}\n{summary}{pager}",
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            // 'role',
            // 'status',
            // 'created_at',
            // 'update_at',
            // 'created_by',
            // 'updated_by',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>    
</div>

