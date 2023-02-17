<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Quartos $model */

$this->title = 'Atualizar Quarto: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Quartos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="quartos-update">

<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
