
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?=$assetDir?>/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 mt-1" style="opacity: .8">
        <h2><span class="brand-text">Menú</span></h2>
        <!--font-weight-light-->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->


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
        <nav class="mt-3">
            <?php
            if (Yii::$app->user->isGuest) {
                echo \hail812\adminlte\widgets\Menu::widget([
                    'items' => [
                        ['label' => 'Iniciar sesión', 'url' => ['/site/login'], 'icon' => 'sign-in-alt'],    
                    ],
                ]);
            } else {
                echo \hail812\adminlte\widgets\Menu::widget([
                    'items' => [
                        ['label' => 'Usuario', 'url' => ['/usuario'], 'icon' => 'user'],
                        ['label' => 'Finca', 'url' => ['/finca'], 'icon' => 'home'],
                        ['label' => 'Parcela', 'url' => ['/parcela'], 'icon' => 'sign-in-alt'],
                        ['label' => 'Sector', 'url' => ['/sector'], 'icon' => 'sign-in-alt'],
                        ['label' => 'Variedad de uva', 'url' => ['/variedaduva'], 'icon' => 'sign-in-alt'],
                        ['label' => 'Orden de corte', 'url' => ['/ordendecorte'], 'icon' => 'sign-in-alt'],
                        ['label' => 'Caja', 'url' => ['/caja'], 'icon' => 'sign-in-alt'],
                        ['label' => 'Tipo de caja', 'url' => ['/tipocaja'], 'icon' => 'sign-in-alt'],

                    ],
                ]);
                ?>
                </nav>
                </div>
                <div class="sidebar">
                    <nav class="mt-3 ml-2">
                        <?php
                            echo \hail812\adminlte\widgets\Menu::widget([
                            'items' => [
                                ['label' => 'Cerrar sesión', 'icon' => 'sign-in-alt', 'url' => ['/site/logout'], 'template'=>'<a href="{url}" data-method="post">{label}</a>'],
                            ],
                            ]);
            ?>
        </nav>
    </div>
        <?php
            }
        ?>
</aside>