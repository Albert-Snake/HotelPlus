<?php

use common\models\Mesasmarcacoes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\MesasmarcacoesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Marcações';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mesasmarcacoes-index">

<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->

    <p>
        <?= Html::a('Criar Marcação', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary'=>'',
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            //'idCliente',
            'user.nome',
            'user.apelido',
            'idMesa',
            'nrPessoas',
            'data',
            'estado',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Mesasmarcacoes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
