<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Cardapio $model */

$this->title = 'Atualizar Item do Cardápio: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cardapios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cardapio-update">

<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
