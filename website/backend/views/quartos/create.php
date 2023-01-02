<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Quartos $model */

$this->title = 'Create Quartos';
$this->params['breadcrumbs'][] = ['label' => 'Quartos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quartos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
