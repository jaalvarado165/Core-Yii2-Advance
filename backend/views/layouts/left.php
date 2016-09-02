<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => Yii::t('app', 'Menú Principal'), 'options' => ['class' => 'header']],
                     [
                        'label' => Yii::t("app", "Usuarios"),
                        'icon' => 'fa fa-users',
                        'options'=>['class'=>Yii::$app->controller->module->id == 'user-management' ? 'site-menu-item has-sub active open' : 'site-menu-item has-sub'],
                        'url' => 'javascript:void(0)',
                        'items'=> [
                            [
                                'label' => Yii::t('app', 'Usuarios CEM'),
                                'icon' => 'fa fa-user',
                                'options'=>['class'=>Yii::$app->controller->id == 'user' ? 'site-menu-item active' : 'site-menu-item'],
                                'url' => ['/user-management/user/index']
                            ],
                            [
                                'label' => Yii::t('app', 'Roles'), 
                                'icon' => 'fa fa-gear',
                                'options'=>['class'=>Yii::$app->controller->id == 'role' ? 'site-menu-item active' : 'site-menu-item'],
                                'url' => ['/user-management/role/index']
                            ],
                            [
                                'label' => Yii::t('app', 'Permisos'), 
                                'icon' => 'fa fa-angle-double-right',
                                'options'=>['class'=>Yii::$app->controller->id == 'permission' ? 'site-menu-item active' : 'site-menu-item'],
                                'url' => ['/user-management/permission/index']],
                            [
                                'label' => Yii::t('app', 'Grupos de Permisos'), 
                                'icon' => 'fa fa-angle-double-right',
                                'options'=>['class'=>Yii::$app->controller->id == 'auth-item-group' ? 'site-menu-item active' : 'site-menu-item'],
                                'url' => ['/user-management/auth-item-group/index']
                            ],
                            [
                                'label' => Yii::t('app', 'Registro de Ingresos'), 
                                'icon' => 'fa fa-angle-double-right',
                                'options'=>['class'=>Yii::$app->controller->id == 'user-visit-log' ? 'site-menu-item active' : 'site-menu-item'],
                                'url' => ['/user-management/user-visit-log/index']
                            ],
                            
                        ]
                    ],
                    [
                        'label' => 'Same tools',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'fa fa-circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
