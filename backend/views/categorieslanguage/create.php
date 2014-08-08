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
 * @var backend\models\CategoriesLanguage $model
 */

$this->title = Yii::t('app', ' {modelClass}', [
  'modelClass' => 'Categories Language',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories Languages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-language-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
