<aside class="main-sidebar">

    <section class="sidebar">


        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Laporan Checkin', 'icon' => 'map-marker', 'url' => ['/absensi']],
                    ['label' => 'Data Pelanggan', 'icon' => 'user', 'url' => ['/pelanggan']],
                    ['label' => 'Data Sales', 'icon' => 'user', 'url' => ['/sales']],
                    ['label' => 'Data Supervisor', 'icon' => 'user', 'url' => ['/supervisor']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
