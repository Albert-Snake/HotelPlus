<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\EstadiasSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="estadias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'dataPedido') ?>

    <?= $form->field($model, 'idCliente') ?>

    <?= $form->field($model, 'idQuarto') ?>

    <?= $form->field($model, 'dataInicio') ?>

    <?php // echo $form->field($model, 'dataTermo') ?>

    <?php // echo $form->field($model, 'duracao') ?>

    <?php // echo $form->field($model, 'lotacao') ?>

    <?php // echo $form->field($model, 'valorTotal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
