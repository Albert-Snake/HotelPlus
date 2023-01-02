<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\LimpezasSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="limpezas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idColaborador') ?>

    <?= $form->field($model, 'idCliente') ?>

    <?= $form->field($model, 'idQuarto') ?>

    <?= $form->field($model, 'data') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'perturbar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
