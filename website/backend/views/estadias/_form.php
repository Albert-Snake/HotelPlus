<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Estadias $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="estadias-form">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idCliente')->textInput() ?>

    <?= $form->field($model, 'idQuarto')->textInput() ?>

    <?= $form->field($model, 'dataInicio')->Input('date') ?>

    <?= $form->field($model, 'dataTermo')->Input('date') ?>

    <?= $form->field($model, 'lotacao')->Input('number') ?>

<!--    <br>-->
<!---->
<!--    <div class="text-center" style="border-color: black; border: solid; margin:auto">-->
<!--        <H2>Total de Noites</H2>-->
<!--        <p id="tempo"></p>-->
<!--    </div>-->
<!---->
<!--    <br>-->
<!---->
<!--    <div class="text-center" style="border-color: black; border: solid; margin:auto">-->
<!--        <H2>Valor Total</H2>-->
<!--        <p id="demo"></p>-->
<!--    </div>-->

    <div class="form-group">
        <?= Html::submitButton('Guardar Dados', ['class' => 'btn btn-success']) ?>
    </div>


</div>
