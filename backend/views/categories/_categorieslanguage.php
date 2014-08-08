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
    ]), ['categorieslanguage/create','category_id'=>$category_id], ['class' => 'btn btn-success']) ?>       
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

            ['class' => 'yii\grid\ActionColumn',
              'buttons' => [
                'update'=> 
                   function ($url, $model) {     
                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                        'title' => Yii::t('yii', 'Update'),
                                ]);                                
            
                              },
                'delete'=> 
                   function ($url, $model) {     
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                        'title' => Yii::t('yii', 'Delete'),
                                        'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                        'data-method' => 'post',
                                ]);                                
            
                              }                                      
                
              ],
                        'urlCreator' => function ($action, $model, $key, $index) {
                        $url = '';
                    switch ($action) {
                        case 'update':
                            $url = Yii::$app->urlManager->createUrl(['categorieslanguage/update','id'=>$key]);
                            break;
                        case 'delete':
                            $url = Yii::$app->urlManager->createUrl(['categorieslanguage/delete','id'=>$key]);                            
                            break;
                        default:
                            break;
                    }
                    return $url;
        /*if ($action === 'update') {
            $url = Yii::$app->urlManager->createUrl(['categorieslanguage/update','id'=>$key]);
            return $url;
        }*/
    }

                ],
        ],
    ]); ?>
  
</div>
