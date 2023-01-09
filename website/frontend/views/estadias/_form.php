<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Estadias $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="estadias-form text-center" style="margin-left: 15%; margin-right: 15%">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?php //= $form->field($model, 'dataPedido')->textInput(['readonly'=>true])->label('Data da Reserva') ?>

<!--    --><?php //= $form->field($model, 'idCliente')->textInput(['readonly' => true])->label('ID Cliente') ?>

    <?= $form->field($model, 'idQuarto')->textInput(['readonly' => true])->label('Quarto') ?>

<!--    --><?php //= $form->field($model, 'dataInicio')->input(date_format('2022-01-03','Y-m-d'))?>
    <?= $form->field($model, 'dataInicio')->input('date')->label('Data de Entrada') ?>

    <?= $form->field($model, 'dataTermo')->input('date')->label('Data de Saída') ?>

    <?= $form->field($model, 'duracao')->input('number')->label('Nº de Noites') ?>

    <?= $form->field($model, 'lotacao')->input('number')->label('Nº de Pessoas') ?>

    <?= $form->field($model, 'valorTotal')->textInput(['readonly' => true, 'maxlength' => true]) ?>



    <div class="form-group">
        <br>
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Ver todos os Quartos', ['/quartos/index'], ['class'=>'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
