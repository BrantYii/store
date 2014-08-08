<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/**
 * @var yii\web\View $this
 * @var yii\gii\generators\crud\Generator $generator
 */

/** @var \yii\db\ActiveRecord $model */
$model = new $generator->modelClass;
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>
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
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var <?= ltrim($generator->modelClass, '\\') ?> $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="half-div">

    <?= "<?php " ?>$form = ActiveForm::begin(); ?>
    <div class="caption-heading">
        <?= "<?= " ?>Html::submitButton($model->isNewRecord ? <?= $generator->generateString('Create') ?> : <?= $generator->generateString('Update') ?>, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>        
        <?= "<?= " ?>Html::a('<i class="glyphicon glyphicon-circle-arrow-left"></i>&nbsp'.<?=$generator->generateString('Back') ?>, ['index'], ['class' => 'btn btn-warning']) ?>                
        <?= "<?= " ?>$this->title ?>
    </div>
<?php foreach ($safeAttributes as $attribute) {
    echo "    <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
} ?>

    <?= "<?php " ?>ActiveForm::end(); ?>

</div>
