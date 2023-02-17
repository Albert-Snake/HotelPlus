<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Cardapio $model */

$this->title = 'Criar Item do Cardápio';
$this->params['breadcrumbs'][] = ['label' => 'Cardapios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cardapio-create">

<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
