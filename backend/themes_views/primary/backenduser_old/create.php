<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\BackendUser $model
 */

$this->title = Yii::t('app', '{modelClass}', [
  'modelClass' => 'Backend User',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Backend Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Add New';
?>
<div class="backend-user-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
