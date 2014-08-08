<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\BackendUser $model
 */

$this->title = Yii::t('app', '{modelClass}: ', [
  'modelClass' => 'Backend User',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Backend Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="backend-user-update">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
