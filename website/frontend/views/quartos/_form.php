<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Quartos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="quartos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'lotacao')->textInput() ?>

    <?= $form->field($model, 'nrCamas')->textInput() ?>

    <?= $form->field($model, 'nrCasasBanho')->textInput() ?>

    <?= $form->field($model, 'acessoDef')->dropDownList([ 'sim' => 'Sim', 'não' => 'Não', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'valorNoite')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
