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

    <?php ActiveForm::end(); ?>

    <script>
        const lotacao = document.getElementById('estadias-lotacao');
        const dataInicio = document.getElementById('estadias-datainicio');
        const dataTermo = document.getElementById('estadias-datatermo');
        const valortotal = document.getElementById('demo');
        const duracao = document.getElementById('tempo');
        var inicio;

        lotacao.addEventListener('input', updateValue);
        dataInicio.addEventListener('input', dataUm);
        dataTermo.addEventListener('input', duracaoValue);


        function updateValue(e) {
            valortotal.textContent = e.target.value * 150 +'€';
        }

        function duracaoValue(a){

            duracao.textContent = (a.getTime()- inicio) / (1000*3600*24);
        }

        function dataUm(b) {
            inicio = b.getTime();
            console.log(inicio);
        }

    </script>

</div>
