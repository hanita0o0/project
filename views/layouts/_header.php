<?php
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;


    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options'=>['class'=>"  navbar navbar-expand-lg navbar-light bg-light shadow "]
    ]);

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'ثبت نام', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'ورود', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'خروج (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    ?>

<?php
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto d-inline-flex p-2 bd-highlight' ],
        'items' => $menuItems,
    ]);
    NavBar::end();
?>

