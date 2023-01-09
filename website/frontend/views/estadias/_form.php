<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Estadias $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="estadias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dataPedido')->textInput() ?>

    <?= $form->field($model, 'idCliente')->textInput() ?>

    <?= $form->field($model, 'idQuarto')->textInput() ?>

    <?= $form->field($model, 'dataInicio')->textInput() ?>

    <?= $form->field($model, 'dataTermo')->textInput() ?>

    <?= $form->field($model, 'duracao',['onchange'=>'myFunction()'])->input('number') ?>

    <?= $form->field($model, 'lotacao')->textInput() ?>

    <?= $form->field($model, 'valorTotal')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <p id="demo"></p>

    <script>
        function myFunction() {
            var x = document.getElementById("estadias-datapedido").value;
            document.getElementById("demo").innerHTML = "You selected: " + x;
        }
    </script>

</div>
