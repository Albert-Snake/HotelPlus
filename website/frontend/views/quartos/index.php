<?php

use common\models\Quartos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;


/** @var yii\web\View $this */
/** @var common\models\QuartosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Quartos';
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="../../web/css/site.css">
<div class="quartos-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <?php foreach($quartos as $quarto){ ?>
        <div id="index-quartos" class="container-fluid border border-primary rounded-4 border-3" style="--bs-border-opacity: .3">
            <p><img src="../../web/imgs/arrow-right-circle-fill.svg" width="10" height="10"><b> Lotação: </b><?= $quarto->lotacao ?></p>
            <p><img src="../../web/imgs/arrow-right-circle-fill.svg" width="10" height="10"><b> Camas: </b><?= $quarto->nrCamas ?></p>
            <p><img src="../../web/imgs/arrow-right-circle-fill.svg" width="10" height="10"><b> Casas de Banho: </b><?= $quarto->nrCasasBanho ?></p>
            <p><img src="../../web/imgs/arrow-right-circle-fill.svg" width="10" height="10"><b> Acesso a deficientes: </b><?= $quarto->acessoDef ?></p>
            <p><img src="../../web/imgs/arrow-right-circle-fill.svg" width="10" height="10"><b> Preço: </b><?= $quarto->valorNoite ?>€</p>
        </div>
        <br>
    <?php } ?>

</div>
