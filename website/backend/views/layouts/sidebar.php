<?php

use yii\helpers\Html;

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <link rel="stylesheet" href="/css/site.css">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src= "/img/HPLogo48x48.svg" alt="HotelPlus" class="svglogonav">
        <!--<span class="brand-text font-weight-light">HotelPlus</span>--!>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php
                if(Yii::$app->user->can('crudAll')){
                    echo "<img src='/img/crown48.png' class='img-circle elevation-2' alt='Administrador'>";
                }
                elseif (Yii::$app->user->can('crudCozinha')){
                    echo "<img src='/img/fork48.png' class='img-circle elevation-2' alt='Cozinha'>";
                }
                elseif (Yii::$app->user->can('crudLimpeza')){
                    echo "<img src='/img/cleaning.png' class='img-circle elevation-2' alt='Limpeza'>";
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
                    ['label' => 'Utilizadores',  'icon' => 'users', 'visible' => Yii::$app->user->can('crudAll'),
                        'items' => [
                            ['label' => 'Ver Utilizadores',  'icon' => 'users', 'url' => ['/user/index']],
                            ['label' => 'Adicionar Utilizador',  'icon' => 'user-plus', 'url' => ['/user/create'], 'target' => '_blank'],
                            ['label' => 'Ver Utilizadores',  'icon' => 'users', 'url' => [''], 'target' => '_blank'],
                        ]
                    ],
                    ['label' => 'Restauração',  'icon' => 'utensils', 'visible' => Yii::$app->user->can('crudCozinha'),
                        'items' => [
                            ['label' => 'Ver Utilizadores',  'icon' => 'users', 'url' => [''], 'target' => '_blank'],
                            ['label' => 'Adicionar Utilizador',  'icon' => 'user-plus', 'url' => [''], 'target' => '_blank'],
                            ['label' => 'Ver Utilizadores',  'icon' => 'users', 'url' => [''], 'target' => '_blank'],
                        ]
                    ],
                    ['label' => 'Limpezas',  'icon' => 'broom', 'visible' => Yii::$app->user->can('crudLimpeza'),
                        'items' => [
                            ['label' => 'Ver Utilizadores',  'icon' => 'users', 'url' => [''], 'target' => '_blank'],
                            ['label' => 'Adicionar Utilizador',  'icon' => 'user-plus', 'url' => [''], 'target' => '_blank'],
                            ['label' => 'Ver Utilizadores',  'icon' => 'users', 'url' => [''], 'target' => '_blank'],
                        ]
                    ],
                    ['label' => 'Quartos',  'icon' => 'door-open', 'visible' => Yii::$app->user->can('crudAll'),
                        'items' => [
                            ['label' => 'Ver Utilizadores',  'icon' => 'users', 'url' => [''], 'target' => '_blank'],
                            ['label' => 'Adicionar Utilizador',  'icon' => 'user-plus', 'url' => [''], 'target' => '_blank'],
                            ['label' => 'Ver Utilizadores',  'icon' => 'users', 'url' => [''], 'target' => '_blank'],
                        ]
                    ],
                    ['label' => 'Marcações',  'icon' => 'calendar', 'visible' => Yii::$app->user->can('crudAll'),
                        'items' => [
                            ['label' => 'Ver Utilizadores',  'icon' => 'users', 'url' => [''], 'target' => '_blank'],
                            ['label' => 'Adicionar Utilizador',  'icon' => 'user-plus', 'url' => [''], 'target' => '_blank'],
                            ['label' => 'Ver Utilizadores',  'icon' => 'users', 'url' => [''], 'target' => '_blank'],
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