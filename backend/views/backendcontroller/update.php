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

$this->title = Yii::t('app', ' {modelClass}: ', [
  'modelClass' => 'Backend Controllers',
]) . ' ' . $model->backend_controller_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Backend Controllers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->backend_controller_id, 'url' => ['view', 'id' => $model->backend_controller_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="backend-controllers-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
