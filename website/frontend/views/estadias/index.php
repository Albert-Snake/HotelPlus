<?php

use common\models\Estadias;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\EstadiasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Estadias';
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="../../web/css/site.css">
<div class="estadias-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<!--        --><?php //= Html::a('Reservar', ['create', 'quarto'=>''], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Reservar', ['/quartos/index'], ['class' => 'btn btn-success']) ?>
    </p

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    --><?php //= GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'id',
//            'dataPedido',
//            'idCliente',
//            'idQuarto',
//            'dataInicio',
//            //'dataTermo',
//            //'duracao',
//            //'lotacao',
//            //'valorTotal',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, Estadias $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'id' => $model->id]);
//                 }
//            ],
//        ],
//    ]); ?>

    <br>
<!--    --><?php //foreach($historicoEstadias as $historicoEstadia){ ?>
<!--        <div id="index-quartos" class="container-fluid border border-primary rounded-4 border-3" style="--bs-border-opacity: .3">-->
<!--            <p><img src="../../web/imgs/arrow-right-circle-fill.svg" width="10" height="10"><b> Data da Reserva: </b>--><?php //= $historicoEstadia->dataPedido ?><!--</p>-->
<!--            <p><img src="../../web/imgs/arrow-right-circle-fill.svg" width="10" height="10"><b> Quarto: </b>--><?php //= $historicoEstadia->idQuarto ?><!--</p>-->
<!--            <p><img src="../../web/imgs/arrow-right-circle-fill.svg" width="10" height="10"><b> Data Entrada: </b>--><?php //= $historicoEstadia->dataInicio ?><!--</p>-->
<!--            <p><img src="../../web/imgs/arrow-right-circle-fill.svg" width="10" height="10"><b> Data Saída: </b>--><?php //= $historicoEstadia->dataTermo ?><!--</p>-->
<!--            <p><img src="../../web/imgs/arrow-right-circle-fill.svg" width="10" height="10"><b> Duração: </b>--><?php //= $historicoEstadia->duracao ?><!-- noites</p>-->
<!--            <p><img src="../../web/imgs/arrow-right-circle-fill.svg" width="10" height="10"><b> Lotação: </b>--><?php //= $historicoEstadia->lotacao ?><!--</p>-->
<!--            <p><img src="../../web/imgs/arrow-right-circle-fill.svg" width="10" height="10"><b> Preço: </b>--><?php //= $historicoEstadia->valorTotal ?><!--€</p>-->
<!--        </div>-->
<!--        <br>-->
<!--    --><?php //} ?>


    <style>
        #historico{
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        #historico td, #historico th {
            border: 1px solid #ddd;
            padding: 8px;
            vertical-align: baseline;
        }
        #historico #topo{
            text-transform: uppercase;

        }
        #historico th{
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #2667e0;
            color: white;
            font-size: 85%;
        }

        #historico tr:nth-child(even){background-color: #f2f2f2;}
        #historico tr:hover {background-color: #ddd;}

        .table.sticky th{
            position: sticky;
            top: 10%;
        }
    </style>

    <div class="body-content container" id="table-div">
        <table id="historico" class="table sticky">
            <tr align="center" id="topo">
                <th>Data Reserva</th>
                <th>Quarto</th>
                <th>Data de Entrada</th>
                <th>Data de Saída</th>
                <th>Nº de Noites</th>
                <th>Nº de Pessoas</th>
                <th>Valor</th>
            </tr>


            <?php foreach ($historicoEstadias as $historicoEstadia){?>
                <tr>
                    <td align="center"><?= DateTime::createFromFormat('Y-m-d', $historicoEstadia->dataPedido)->format('d-m-Y') ?></td>
                    <td align="center"><?= $historicoEstadia->idQuarto ?></td>
                    <td align="center"><?= DateTime::createFromFormat('Y-m-d', $historicoEstadia->dataInicio)->format('d-m-Y') ?></td>
                    <td align="center"><?= DateTime::createFromFormat('Y-m-d', $historicoEstadia->dataTermo)->format('d-m-Y') ?></td>
                    <td align="center"><?= $historicoEstadia->duracao ?></td>
                    <td align="center"><?= $historicoEstadia->lotacao ?></td>
                    <td align="center"><?= $historicoEstadia->valorTotal . "€"?></td>
                </tr>
            <?php } ?>
        </table><br><br>
    </div>


</div>
