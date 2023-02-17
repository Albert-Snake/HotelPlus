<?php

use common\models\Cardapio;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\CardapioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Itens do Cardápio';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cardapio-index">

<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->

    <p>
        <?= Html::a('Criar Item do Cardápio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'categoria',
            'nome',
            'descricao',
            'valor',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Cardapio $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
