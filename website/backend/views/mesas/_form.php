<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Mesas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="mesas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'lotacao')->textInput() ?>

    <?= $form->field($model, 'forma')->dropDownList([ 'redonda' => 'Redonda', 'quadrada' => 'Quadrada', 'retângular' => 'Retângular', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
