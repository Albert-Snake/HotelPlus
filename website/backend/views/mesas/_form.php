<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Mesas $model */
/** @var yii\widgets\ActiveForm $form */
?>
<div class="mesas-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="row text-center" style="margin: auto">
    <div class="col-md-4" style="margin: auto">
        <?= $form->field($model, 'lotacao')->textInput() ?>
    </div>

    <div class="col-md-4" style="margin: auto">
        <?= $form->field($model, 'forma')->dropDownList(['redonda' => 'Redonda', 'quadrada' => 'Quadrada', 'retângular' => 'Retângular']); ?>
    </div>
</div>

    <div class="form-group text-center">
        <?= Html::submitButton('Guardar Dados', ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
