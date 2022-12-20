<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Mesasmarcacoes $model */

$this->title = 'Update Mesasmarcacoes: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mesasmarcacoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mesasmarcacoes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
