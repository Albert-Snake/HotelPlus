<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Mesas $model */

$this->title = 'Mesas';
//$this->params['breadcrumbs'][] = ['label' => 'Mesas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mesas-update text-center">

    <h1><?= Html::encode('Atualizar Mesa Nº: ' . $model->id) ?></h1>
    <?= $this->render('_form', ['model' => $model,]) ?>

</div>
