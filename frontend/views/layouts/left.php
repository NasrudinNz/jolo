<aside class="main-sidebar">

    <section class="sidebar">


        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Data Customer', 'icon' => 'user', 'url' => ['/customer']],
                    ['label' => 'Data Sales', 'icon' => 'user', 'url' => ['/sales']],
                    ['label' => 'Data Supervisor', 'icon' => 'user', 'url' => ['/supervisor']],
                    ['label' => 'Laporan Checkin', 'icon' => 'map-marker', 'url' => ['/absensi']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
