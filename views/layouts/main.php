<?php

/* @var $this \yii\web\View */
/* @var $content string */


use app\widgets\Alert;

$this->beginContent('@app/views/layouts/base.php')
?>

<main class="d-flex">
    <?php echo $this->render('_sidebar') ?>
    <div class = "content-wrapper ">
    <?= Alert::widget() ?>
    <?= $content ?>
    </div>

</main>

<?php $this->endContent() ?>


