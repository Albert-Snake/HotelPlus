<?php

use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Limpezas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="limpezas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idColaborador')->textInput() ?>
<!--    dropDownList(User::find()->where(['cargo' => 'limpezas'])->asArray()->all())?>-->

    <?= $form->field($model, 'idCliente')->textInput() ?>
<!--    dropDownList(User::find()->where(['cargo' => 'cliente'])->asArray()->all())?>-->

    <?= $form->field($model, 'idQuarto')->textInput() ?>

    <?= $form->field($model, 'data')->Input('date') ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'limpo' => 'Limpo', 'por limpar' => 'Por limpar', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'perturbar')->dropDownList([ 'Não Pertubar' => 'Não Pertubar', 'Perturbar' => 'Perturbar', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar Dados', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
