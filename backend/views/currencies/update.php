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
 * @var backend\models\Currencies $model
 */

$this->title = Yii::t('app', ' {modelClass}: ', [
  'modelClass' => 'Currencies',
]) . ' ' . $model->currencies_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Currencies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->currencies_id, 'url' => ['view', 'id' => $model->currencies_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="currencies-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
