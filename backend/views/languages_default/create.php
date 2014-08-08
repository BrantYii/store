<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\Languages $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
  'modelClass' => 'Languages',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Languages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="languages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
