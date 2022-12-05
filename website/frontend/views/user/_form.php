<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label('Nome de Utilizador') ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label('Email') ?>
    <?= $form->field($model, 'nome')->textInput(['maxlength' => true])->label('Nome') ?>
    <?= $form->field($model, 'apelido')->textInput(['maxlength' => true])->label('Apelido') ?>
    <?= $form->field($model, 'nif')->textInput()->label('NIF') ?>
    <?= $form->field($model, 'telefone')->textInput()->label('Telemóvel') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
