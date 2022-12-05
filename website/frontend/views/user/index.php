<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Perfil';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <form class="container">
        <div class="top-margin">
            <label><b>Nome de Utilizador: </b><?php echo $user->username; ?></label>
        </div>
        <div class="top-margin">
            <label><b>Email: </b><?php echo $user->email; ?></label>
        </div>
        <div class="top-margin">
            <label><b>Nome: </b><?php echo $user->nome; ?></label>
        </div>
        <div class="top-margin">
            <label><b>Apelido: </b><?php echo $user->apelido; ?></label>
        </div>
        <div class="top-margin">
            <label><b>NIF: </b><?php echo $user->nif; ?></label>
        </div>
        <div class="top-margin">
            <label><b>Telemóvel: </b><?php echo $user->telefone; ?></label>
        </div>
        <div class="top-margin">
            <br>
            <?= Html::a('Editar', ['update', 'id'=>$user->id], ['class'=>'btn btn-info']) ?>
        </div>
    </form>

</div>
