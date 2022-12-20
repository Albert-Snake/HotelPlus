<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Cardapio $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cardapio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'categoria')->dropDownList([ 'Carne' => 'Carne', 'Peixe' => 'Peixe', 'Bebidas Lisas' => 'Bebidas Lisas', 'Bebidas Gasosas' => 'Bebidas Gasosas', 'Bebidas Alcólicas' => 'Bebidas Alcólicas', 'Sobremesas' => 'Sobremesas', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valor')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
