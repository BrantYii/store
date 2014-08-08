<?php

namespace backend\controllers;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\VerbFilter;

use \yii\filters\AccessControl;

class BackendBaseController extends Controller{
    
    public function behaviors() {        
        parent::behaviors();
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['post'],
				],
			],
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'actions' => ['index'],
						'allow' => true,
                                                'matchCallback' => function() {
                                                return \Yii::$app->user->identity->checkPermission('index',  \Yii::$app->controller->id);                    
                                                }
					],
					[
						'actions' => ['view'],
						'allow' => true,
                                                'matchCallback' => function() {
                                                return \Yii::$app->user->identity->checkPermission('view',  \Yii::$app->controller->id);                    
                                                }
					],
					[
						'actions' => ['update',],
						'allow' => true,
                                                'matchCallback' => function() {
                                                return \Yii::$app->user->identity->checkPermission('update',  \Yii::$app->controller->id);                    
                                                }
					],
					[
						'actions' => ['create'],
						'allow' => true,
                                                'matchCallback' => function() {
                                                return \Yii::$app->user->identity->checkPermission('create',  \Yii::$app->controller->id);                    
                                                }
					],                                                
					[
						'actions' => ['delete'],
						'allow' => true,
                                                'matchCallback' => function() {
                                                return \Yii::$app->user->identity->checkPermission('delete',  \Yii::$app->controller->id);                    
                                                }
					],                                                                                                
					[
						'actions' => ['export'],
						'allow' => true,
                                                'matchCallback' => function() {
                                                return \Yii::$app->user->identity->checkPermission('export',  \Yii::$app->controller->id);                    
                                                }
					],                                                                                                                                                
				],
			],                    
		];        
    }
    
}

?>
