<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Estadias $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="estadias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dataPedido')->Input('date') ?>

    <?= $form->field($model, 'idCliente')->textInput() ?>

    <?= $form->field($model, 'idQuarto')->textInput() ?>

    <?= $form->field($model, 'dataInicio')->Input('date') ?>

    <?= $form->field($model, 'dataTermo')->Input('date') ?>

    <?= $form->field($model, 'duracao')->textInput() ?>

    <?= $form->field($model, 'lotacao')->textInput() ?>

    <?= $form->field($model, 'valorTotal')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
