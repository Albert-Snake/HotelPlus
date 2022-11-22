<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Mesas $model */

$this->title = 'Update Mesas: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mesas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mesas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
