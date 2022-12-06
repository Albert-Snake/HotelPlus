<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Utilizadores';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--cards para mostrar a quantidade de cada tipo de Utilizadores --!>

<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12 text-center">
        <?= \hail812\adminlte\widgets\SmallBox::widget([
            'title' => User::find()->where(['cargo' => 'admin'])->count(),
            'text' => 'Administradores',
            'icon' => 'fas fa-crown',
            'theme' => 'gradient',
        ]) ?>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12 text-center">
        <?=
        \hail812\adminlte\widgets\SmallBox::widget([
            'title' => User::find()->where(['cargo' => 'limpezas'])->count(),
            'text' => 'Limpezas',
            'icon' => 'fas fa-broom',
            'theme' => 'gradient',
            //'loadingStyle' => true
        ]) ?>
        <?= \hail812\adminlte\widgets\SmallBox::widget([
            'title' => User::find()->where(['cargo' => 'cliente'])->count(),
            'text' => 'Clientes',
            'icon' => 'fas fa-user',
            'theme' => 'gradient',
            //'loadingStyle' => true
        ]) ?>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12 text-center">
        <?= \hail812\adminlte\widgets\SmallBox::widget([
            'title' => User::find()->where(['cargo' => 'restauração'])->count(),
            'text' => 'Restauração',
            'icon' => 'fas fa-utensils',
            'theme' => 'gradient',
            //'loadingStyle' => true
        ]) ?>
    </div>
</div>

<div class="user-index">

    <p>
        <?= Html::a('Criar Utilizador', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary'=>'',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            //'email:email',
            //'status',
            //'created_at',
            //'updated_at',
            //'verification_token',
            'nome',
            'apelido',
            'cargo',
            'nif',
            'telefone',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
