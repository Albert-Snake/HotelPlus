<?php

use common\models\Cardapio;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\CardapioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Cardapios';
$this->params['breadcrumbs'][] = $this->title;
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type = "text/javascript">
    $.ajax(
        {
            type: "get", //get, post, put, delete
            url: "127.0.0.1:1883\n",
            //data: {"userId":2,"title":"Envio de JSON","body":"Envio de JSON Body"}, //JSON.stringify(data)
            async: false,
            success: function(resp)
            {
                const obj = JSON.stringify(resp);
                alert("Conexão com o servidor bem sucedida");



            },
            error: function(e)
            {
                alert("Erro: " + e);
            }
        });
</script>
<div class="cardapio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cardapio', ['create'], ['class' => 'btn btn-success']) ?>
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
