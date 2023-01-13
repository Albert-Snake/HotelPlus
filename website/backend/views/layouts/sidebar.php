<?php

use yii\helpers\Html;

?>
<style>
    .labelNome{
        color: white;
        font-size: larger;
    }

    .svglogonav{
        filter: invert(1);
        width: 100%;
        height: 100%;
        margin: auto;
    }
</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!--    <link rel="stylesheet" href="/css/site.css">-->
    <link rel="stylesheet" href="../../web/css/site.css">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
<!--        <img src= "/img/HPLogo48x48.svg" alt="HotelPlus" class="svglogonav">-->
        <?= Html::img('@web/img/HPLogo48x48.svg', ['alt'=>'Hotel Plus', 'class'=>'svglogonav']); ?>
<!--        <span class="brand-text font-weight-light">HotelPlus</span>-->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php
                if(Yii::$app->user->can('crudAll')){
//                    echo "<img src='../../web/img/crown48.png' class='img-circle elevation-2' alt='Administrador'>";
                    echo Html::img('@web/img/crown48.png', ['alt' => 'Administrador', 'class' => 'img-circle elevation-2']);
                }
                elseif (Yii::$app->user->can('crudCozinha')){
//                    echo "<img src='/img/fork48.png' class='img-circle elevation-2' alt='Cozinha'>";
                    echo Html::img('@web/img/fork48.png', ['alt' => 'Cozinha', 'class' => 'img-circle elevation-2']);
                }
                elseif (Yii::$app->user->can('crudLimpeza')){
//                    echo "<img src='/img/cleaning.png' class='img-circle elevation-2' alt='Limpeza'>";
                    echo Html::img('@web/img/cleaning.png', ['alt' => 'Limpeza', 'class' => 'img-circle elevation-2']);
                }
                ?>
            </div>
            <div class="info">
                <?php
                $nome = Yii::$app->user->identity->username;
                    echo "<p class='labelNome'>$nome</p>";
                ?>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Área do Programador', 'header' => true, 'visible' => Yii::$app->user->can('crudAll')],
                    ['label' => 'PHPMyAdmin', 'icon' => 'database', 'url' => 'http://localhost/phpmyadmin/index.php?route=/database/structure&db=hp', 'target' => '_blank','visible' => Yii::$app->user->can('crudAll')],
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank', 'visible' => Yii::$app->user->can('crudAll')],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank', 'visible' => Yii::$app->user->can('crudAll')],
                    ['label' => 'Páginas', 'header' => true, 'visible' => Yii::$app->user->can('crudAll')],
                    //drawer Utilizadores
                    ['label' => 'Utilizadores',  'icon' => 'users', 'visible' => Yii::$app->user->can('crudAll'),
                        'items' => [
                            ['label' => 'Ver Utilizadores',  'icon' => 'eye', 'url' => ['/user/index']],
                            ['label' => 'Adicionar Utilizador',  'icon' => 'plus', 'url' => ['/user/create'], 'target' => '_blank'],
                        ]
                    ],
                    //drawer Restauração com sub-drawers
                    ['label' => 'Restauração',  'icon' => 'utensils', 'visible' => Yii::$app->user->can('crudCozinha'),
                        'items' => [
                            //drawer Mesas
                            ['label' => 'Mesas',  'icon' => 'table', 'url' => [''], 'target' => '_blank',
                                'items' => [
                                ['label' => 'Ver Mesas',  'icon' => 'eye', 'url' => ['/mesas/index']],
                                ['label' => 'Adicionar Mesa',  'icon' => 'plus', 'url' => ['/mesas/create']],
                                ]
                            ],
                            //drawer Cardápio
                            ['label' => 'Cardápio',  'icon' => 'book-open', 'url' => [''], 'target' => '_blank',
                                'items' => [
                                    ['label' => 'Ver Comidas/Bebidas',  'icon' => 'eye', 'url' => ['/cardapio/index']],
                                    ['label' => 'Adicionar Comidas/Bebidas',  'icon' => 'plus', 'url' => ['/cardapio/create']],

                                ]
                            ],
                            //drawer Marcações de Mesas
                            ['label' => 'Marcações',  'icon' => 'calendar', 'url' => [''], 'target' => '_blank',
                                'items' => [
                                    ['label' => 'Ver Marcações',  'icon' => 'eye', 'url' => ['/mesasmarcacoes/index']],
                                    ['label' => 'Criar Marcação',  'icon' => 'plus', 'url' => ['/mesasmarcacoes/create']],

                                ]
                            ],
                        ]
                    ],
                    //drawer Limpezas
                    ['label' => 'Limpezas',  'icon' => 'broom', 'visible' => Yii::$app->user->can('crudLimpeza'),
                         'items' => [
                                 ['label' => 'Ver Limpezas',  'icon' => 'eye', 'url' => ['limpezas/index']],
                             ['label' => 'Criar Limpeza',  'icon' => 'plus', 'url' => ['limpezas/create']],
                         ]
                    ],
                    //drawer Quartos
                    ['label' => 'Quartos',  'icon' => 'door-open', 'visible' => Yii::$app->user->can('crudAll'),
                        'items' => [
                            ['label' => 'Ver Quartos',  'icon' => 'eye', 'url' => ['quartos/index']],
                            ['label' => 'Adicionar Quarto',  'icon' => 'plus', 'url' => ['quartos/create']],
                        ]
                    ],
                    //drawer Marcações de estadias
                    ['label' => 'Estadias',  'icon' => 'calendar', 'visible' => Yii::$app->user->can('crudAll'),
                        'items' => [
                            ['label' => 'Ver Marcações',  'icon' => 'eye', 'url' => ['estadias/index']],
                            ['label' => 'Criar Marcação',  'icon' => 'plus', 'url' => ['estadias/create']],
                        ]
                    ],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>