<?php

/* @var $this \yii\web\View */
/* @var $content string */



//AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
   
    <?= $content ?>
  
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
