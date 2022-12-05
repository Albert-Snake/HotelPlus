<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Mesas $model */

$this->title = 'Create Mesas';
$this->params['breadcrumbs'][] = ['label' => 'Mesas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mesas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
