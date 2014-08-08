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
 * @var backend\models\BackendControllers $model
 */

$this->title = Yii::t('app', ' {modelClass}', [
  'modelClass' => 'Backend Controllers',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Backend Controllers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="backend-controllers-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
