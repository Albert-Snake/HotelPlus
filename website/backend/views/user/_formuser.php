<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->Input(\yii\validators\EmailValidator::className()) ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apelido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cargo')->dropDownList([ 'cliente' => 'Cliente', 'limpezas' => 'Limpezas', 'restauração' => 'Restauração', 'admin' => 'Admin', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'nif')->Input(number_format(0)) ?>

    <?= $form->field($model, 'telefone')->Input(number_format(0)) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar Dados', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
