<aside class="shadow">
<?php
    use app\models\Location;
use app\models\Service;
use yii\helpers\Url;

 echo \yii\bootstrap4\Nav::widget([
     'encodeLabels' => false,
    'options'=>[
      'class'=>'d-flex flex-column nav-pills '
    ],
     'items' => [

        [

            'label' => '<i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;پاپ سایت',
            'items' => [

                 ['label' => 'افزودن', 'url' => Url::to(['/location/create','type'=>Location::POPSITE]), 'options' => ['class' => 'nav-item']],

                 ['label' => 'لیست', 'url' => Url::to(['/location/index','type'=>Location::POPSITE]), 'options' => ['class' => 'nav-item']],
            ],
        ],
         [
             'label' => '<i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;نقطه ',
             'items' => [
                 ['label' => 'افزودن', 'url' => Url::to(['/location/create','type'=>Location::POINT]), 'options' => ['class' => 'nav-item']],

                 ['label' => 'لیست', 'url' => Url::to(['/location/index','type'=>Location::POINT]), 'options' => ['class' => 'nav-item']],
             ],
         ],
         [
             'label' => '<i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;سرویس ',
             'items' => [
                 ['label' => 'افزودن', 'url' => Url::to(['/service/create']), 'options' => ['class' => 'nav-item']],

                 ['label' => 'لیست', 'url' => Url::to(['/service/index']), 'options' => ['class' => 'nav-item']],
             ],
         ],
    ],
]);
?>
</aside>