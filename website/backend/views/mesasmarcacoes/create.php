<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Mesasmarcacoes $model */

$this->title = 'Criar Marcação';
$this->params['breadcrumbs'][] = ['label' => 'Mesasmarcacoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mesasmarcacoes-create">

<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
