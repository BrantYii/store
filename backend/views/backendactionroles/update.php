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
 * @var backend\models\BackendActionRoles $model
 */

$this->title = Yii::t('app', ' {modelClass}: ', [
  'modelClass' => 'Backend Action Roles',
]) . ' ' . $model->backend_action_roles_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Backend Action Roles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->backend_action_roles_id, 'url' => ['view', 'id' => $model->backend_action_roles_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="backend-action-roles-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
