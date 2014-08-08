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

/**
 * @var yii\web\View $this
 * @var backend\models\Categories $model
 */

$this->title = Yii::t('app', ' {modelClass}: ', [
  'modelClass' => 'Categories',
]) . ' ' . $model->categories_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->categories_id, 'url' => ['view', 'id' => $model->categories_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="categories-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

<?php
        $searchModel = new backend\models\search\CategoriesLanguageSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
?>
        <?= $this->render('_categorieslanguage', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'category_id' => $model->categories_id,
        ]);
?>
