<?php
use yii\helpers\Html;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel 
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>-->

        <!-- search form 
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'View',  
                     'icon' => 'share',
                     'url' => '#', 
                     'visible'=>!Yii::$app->user->isGuest,
                     'items' => [
                        ['label' => 'Tenant', 'icon' => ' fa-user', 'url' => ['/tenant'],],
                        ],
                    ],
                    ['label' => 'Admin',  
                     'icon' => 'share',
                     'url' => '#', 
                     'visible'=> (!Yii::$app->user->isGuest && Yii::$app->user->getIdentity()->roleID==1) ? true : false,
                     'items' => [
                            ['label' => 'User', 'icon' => ' fa-user', 'url' => ['/user'],],
                            ['label' => 'Role', 'icon' => ' fa-user', 'url' => ['/role'],],
                        ],
                    ],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    ['label' => 'About', 'url' => ['/site/about']],
                    Yii::$app->user->isGuest ? (
                        ['label' => 'Login', 'icon' => 'fa fa-unlock-alt', 'url' => ['/site/login']]
                    ) : (
                        ['label' => 'Logout(' . Yii::$app->user->identity->username . ')',
                            'template' => '<a href="{url}" data-method="post"><i class="fa fa-lock"></i>  <span>{label}</span></a>',
                            'url' => ['/site/logout']]
                    )
                ],
            ]
        ) ?>

    </section>

</aside>
