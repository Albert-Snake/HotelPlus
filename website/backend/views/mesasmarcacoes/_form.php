<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Mesasmarcacoes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="mesasmarcacoes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idCliente')->textInput() ?>

    <?= $form->field($model, 'idMesa')->textInput() ?>

    <?= $form->field($model, 'nrPessoas')->textInput() ?>

    <?= $form->field($model, 'data')->input('date') ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'entregue' => 'Entregue', 'não entregue' => 'Não entregue', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
