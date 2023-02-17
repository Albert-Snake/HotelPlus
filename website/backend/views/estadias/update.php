<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Estadias $model */

$this->title = 'Atualizar Estadia: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Estadias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estadias-update">

<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
