<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\QuartosSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="quartos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'lotacao') ?>

    <?= $form->field($model, 'nrCamas') ?>

    <?= $form->field($model, 'nrCasasBanho') ?>

    <?= $form->field($model, 'acessoDef') ?>

    <?php // echo $form->field($model, 'valorNoite') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
