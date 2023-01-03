<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Estadias $model */

$this->title = 'Nova Reserva';
//$this->params['breadcrumbs'][] = ['label' => 'Estadias', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estadias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
