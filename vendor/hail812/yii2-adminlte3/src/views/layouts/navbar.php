<?php

use yii\helpers\Html;

?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        
    </ul>

    <!-- Right navbar links -->
    <?php if (!Yii::$app->user->isGuest) {
    echo '<ul class="navbar-nav ml-auto">';
        echo '<div class="user-panel d-flex">';
            echo '<div class="image">';
            echo '</div>';
            echo '<div class="info">';
                echo '<img src="'.$assetDir.'/img/logoavatar.png" alt="">';
                echo '<a href="#"><span>'.Yii::$app->user->identity->nombre.'</span></a>';
            echo '</div>';
        echo '</div>';
    echo '</ul>';
    }
    ?>

</nav>
<!-- /.navbar -->