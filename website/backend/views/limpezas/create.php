<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Limpezas $model */

$this->title = 'Criar Limpeza';
$this->params['breadcrumbs'][] = ['label' => 'Limpezas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="limpezas-create">

<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
