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
                    $cargo = 'Limpezas';
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
                    [
                        'label' => 'Starter Pages',
                        'icon' => 'tachometer-alt',
                        'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            ['label' => 'Active Page', 'url' => ['site/index'], 'iconStyle' => 'far'],
                            ['label' => 'Inactive Page', 'iconStyle' => 'far'],
                        ]
                    ],
                    ['label' => 'Simple Link', 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],
                    ['label' => 'Área do Programador', 'header' => true, 'visible' => Yii::$app->user->can('crudAll')],
                    ['label' => 'PHPMyAdmin', 'url' => 'http://localhost/phpmyadmin/index.php?route=/database/structure&db=hp', 'visible' => Yii::$app->user->can('crudAll')],
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank', 'visible' => Yii::$app->user->can('crudAll')],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank', 'visible' => Yii::$app->user->can('crudAll')],
                    ['label' => 'MULTI LEVEL EXAMPLE', 'header' => true],
                    ['label' => 'Level1'],
                    [
                        'label' => 'Level1',
                        'items' => [
                            ['label' => 'Level2', 'iconStyle' => 'far'],
                            [
                                'label' => 'Level2',
                                'iconStyle' => 'far',
                                'items' => [
                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle']
                                ]
                            ],
                            ['label' => 'Level2', 'iconStyle' => 'far']
                        ]
                    ],
                    ['label' => 'Level1'],
                    ['label' => 'LABELS', 'header' => true],
                    ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
                    ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
                    ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                    ['label' => 'Terminar Sessão', 'header' => true],
                ],
            ]);
            echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'label']
                )
                . Html::endForm();
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>