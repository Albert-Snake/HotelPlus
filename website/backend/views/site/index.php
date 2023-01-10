<?php

use common\models\Cardapio;
use common\models\Estadias;
use common\models\Limpezas;
use common\models\Mesas;
use common\models\Mesasmarcacoes;
use common\models\Quartos;
use common\models\User;
use common\models\UserSearch;

$this->title = 'Bem-Vindo ' . Yii::$app->user->identity->username;

?>
<div class="container-fluid">
    <h2>Restauração</h2>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 text-center">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => Cardapio::find()->count(),
                'text' => 'Items no Cardapio',
                'icon' => 'fas fa-utensils',
                'linkUrl'=>'cardapio/index',
            ]) ?>
        </div>


        <div class="col-lg-4 col-md-6 col-sm-6 col-12 text-center">
            <?php
            //card das estadias
            if (Mesasmarcacoes::find()->count() <= 5){
                $smallBox = \hail812\adminlte\widgets\SmallBox::begin([
                    'title' =>Mesasmarcacoes::find()->count(),
                    'text' => 'Mesas Reservadas',
                    'icon' => 'fas fa-utensils',
                    'theme' => 'warning',
                    'linkUrl'=>'mesasmarcacoes/index'
                ]);
            }
            elseif (Mesasmarcacoes::find()->count() > 5){
                $smallBox = \hail812\adminlte\widgets\SmallBox::begin([
                    'title' => Mesasmarcacoes::find()->count(),
                    'text' => 'Mesas Reservadas',
                    'icon' => 'fas fa-utensils',
                    'theme' => 'gradient-success',
                    'linkUrl'=>'mesasmarcacoes/index'
                ]);
            } ?>
            <?php \hail812\adminlte\widgets\SmallBox::end() ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 text-center">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => Mesas::find()->count(),
                'text' => 'Nº de Mesas',
                'icon' => 'fas fa-utensils',
                'theme' => 'gradient-success',
                'linkUrl'=>'mesas/index'
            ]) ?>
        </div>
    </div>
    <br>
    <h2>Limpezas</h2>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 text-center">

            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => Limpezas::find()->count(),
                'text' => 'Todas as Limpezas',
                'icon' => 'fas fa-broom',
                'linkUrl'=>'limpezas/index'
            ]) ?>
        </div>


        <div class="col-lg-4 col-md-6 col-sm-6 col-12 text-center">
            <?php
            //card das estadias
            if (Limpezas::find()->where('estado' == 'limpo')->count() <= 5){
                $smallBox = \hail812\adminlte\widgets\SmallBox::begin([
                    'title' =>Limpezas::find()->where(['estado' => 'limpo'])->count(),
                    'text' => 'Limpezas Feitas',
                    'icon' => 'fas fa-broom',
                    'theme' => 'warning',
                    'linkUrl'=>'limpezas/index'
                ]);
            }
            elseif (Limpezas::find()->where('estado' == 'limpo') > 5){
                $smallBox = \hail812\adminlte\widgets\SmallBox::begin([
                'title' =>Limpezas::find()->where(['estado' => 'limpo'])->count(),
                    'text' => 'Limpezas Feitas',
                    'icon' => 'fas fa-broom',
                    'theme' => 'gradient-success',
                    'linkUrl'=>'limpezas/index'
                ]);
            } ?>
            <!--\hail812\adminlte\widgets\Ribbon::widget([
                'id' => $smallBox->id.'-ribbon',
                'text' => 'Ribbon',
                'theme' => 'warning',
                'size' => 'lg',
                'textSize' => 'lg'
            ]) --!>
            <?php \hail812\adminlte\widgets\SmallBox::end() ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 text-center">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => Limpezas::find()->where(['estado' => 'por limpar'])->count(),
                'text' => 'Limpezas por Fazer',
                'icon' => 'fas fa-broom',
                'theme' => 'warning',
                'linkUrl'=>'limpezas/index'
            ]) ?>
        </div>
    </div>
    <br>
    <h2>Quartos</h2>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 text-center">

            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => Quartos::find()->count(),
                'text' => 'Nº de Quartos Total',
                'icon' => 'fas fa-door-open',
                'linkUrl'=>'quartos/index'
            ]) ?>
        </div>


        <div class="col-lg-4 col-md-6 col-sm-6 col-12 text-center">
            <?php
            //card das estadiaS
                $smallBox = \hail812\adminlte\widgets\SmallBox::begin([
                    'title' => Quartos::find()->WHERE(['acessoDef' => 'sim'])->count(),
                    'text' => 'Com Acesso a Deficientes',
                    'icon' => 'fas fa-door-open',
                    'theme' => 'gradient-success',
                    'linkUrl'=>'quartos/index'
                ]);
            ?>
            <!--\hail812\adminlte\widgets\Ribbon::widget([
                'id' => $smallBox->id.'-ribbon',
                'text' => 'Ribbon',
                'theme' => 'warning',
                'size' => 'lg',
                'textSize' => 'lg'
            ]) --!>
            <?php \hail812\adminlte\widgets\SmallBox::end() ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 text-center">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => Quartos::find()->WHERE(['acessoDef'=> 'não'])->count(),
                'text' => 'Sem Acesso a Deficientes',
                'icon' => 'fas fa-door-open',
                'theme' => 'gradient-success',
                'linkUrl'=>'quartos/index'
            ]) ?>
        </div>
    </div>
    <br>
    <h2>Estadias</h2>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 text-center">

            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => Estadias::find()->count(),
                'text' => 'Total de Estadias',
                'icon' => 'fas fa-utensils',
                'linkUrl'=>'estadias/index'
            ]) ?>
        </div>


        <div class="col-lg-4 col-md-6 col-sm-6 col-12 text-center">
            <?php
            //card das estadias
           /* if (Mesasmarcacoes::find()->count() <= 5){
                $smallBox = \hail812\adminlte\widgets\SmallBox::begin([
                    'title' =>Mesasmarcacoes::find()->count(),
                    'text' => 'Mesas Reservadas',
                    'icon' => 'fas fa-utensils',
                    'theme' => 'warning',
                    'linkUrl'=>'mesasmarcacoes/index'
                ]);
            }
            elseif (Mesasmarcacoes::find()->count() > 5){
                $smallBox = \hail812\adminlte\widgets\SmallBox::begin([
                    'title' => Estadias::find()->count(),
                    'text' => 'Mesas Reservadas',
                    'icon' => 'fas fa-utensils',
                    'theme' => 'gradient-success',
                    'linkUrl'=>'estadias/index'
                ]);
            } */?>
            <!--\hail812\adminlte\widgets\Ribbon::widget([
                'id' => $smallBox->id.'-ribbon',
                'text' => 'Ribbon',
                'theme' => 'warning',
                'size' => 'lg',
                'textSize' => 'lg'
            ]) --!>
            <?php //\hail812\adminlte\widgets\SmallBox::end() ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 text-center">
            <?php /*\hail812\adminlte\widgets\SmallBox::widget([
                'title' => Mesas::find()->count(),
                'text' => 'Nº de Mesas',
                'icon' => 'fas fa-utensils',
                'theme' => 'gradient-success',
                'linkUrl'=>'mesas/index'
            ]) */
            ?>
        </div>
    </div>
    <br>
    <h2>Utilizadores</h2>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 text-center">

            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => User::find()->count(),
                'text' => 'Utilizadores Registados',
                'icon' => 'fas fa-user-plus',
                'linkUrl'=>'user/index',
            ]) ?>
        </div>


        <div class="col-lg-4 col-md-6 col-sm-6 col-12 text-center">
            <?php
            if (User::find()->where(['cargo' => 'cliente'])->count() <= 5){
                $smallBox = \hail812\adminlte\widgets\SmallBox::begin([
                    'title' => User::find()->where(['cargo' => 'cliente'])->count(),
                    'text' => 'Clientes Registados',
                    'icon' => 'fas fa-user-plus',
                    'theme' => 'warning',
                    'linkUrl'=>'user/index'
                ]);
            }
            elseif (User::find()->where(['cargo' => 'cliente'])->count() >= 5){
                $smallBox = \hail812\adminlte\widgets\SmallBox::begin([
                    'title' => User::find()->where(['cargo' => 'cliente'])->count(),
                    'text' => 'Clientes Registados',
                    'icon' => 'fas fa-user-plus',
                    'theme' => 'gradient-success',
                    'linkUrl'=>'user/index'
                ]);
            } ?>
            <!--\hail812\adminlte\widgets\Ribbon::widget([
                'id' => $smallBox->id.'-ribbon',
                'text' => 'Ribbon',
                'theme' => 'warning',
                'size' => 'lg',
                'textSize' => 'lg'
            ]) --!>
            <?php \hail812\adminlte\widgets\SmallBox::end() ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 text-center">
            <?=\hail812\adminlte\widgets\SmallBox::widget([
                'title' =>User::find()->where(['cargo' => 'admin'])->count() + User::find()->where(['cargo' => 'limpezas'])->count() + User::find()->where(['cargo' => 'restauração'])->count(),
                'text' => 'Colaboradores Registados',
                'icon' => 'fas fa-user-plus',
                'theme' => 'gradient-success',
                'linkUrl'=>'user/index',
                //'loadingStyle' => true
            ]) ?>
        </div>
    </div>
</div>