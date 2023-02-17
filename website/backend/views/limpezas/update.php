<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Limpezas $model */

$this->title = 'Atualizar Limpeza: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Limpezas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="limpezas-update">

<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
