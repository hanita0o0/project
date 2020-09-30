<?php

use app\helpers\Access;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Location */
/* @var $type*/

$this->title = 'جزییات  ----> '.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<br><br>
<div class="location-view  ">
    <h5 style="float:right " class="text-muted"><?= Html::encode($this->title) ?></h5>
<div class="row ">
    <div class="offset-lg-3"></div>

   <div class="col-sm-12 col-lg-6  ">
    <?= DetailView::widget([
        'model' => $model,
         'options' => ['class' => 'text-right table table-striped table-bordered detail-vie'],
        'attributes' => [
            'type_location_id',
            'name',
            'latitude',
            'longitude',
            'province_id',
            'city_id',
            'region_id',
            'address',
            'created_at:datetime',
            'updated_at:datetime',

        ]
    ]) ?>
   </div>
    <div class="offset-lg-3 "></div>
</div>
</div>
<div class="d-flex justify-content-center">
    <?php  if(Access::accessAdmin($userId=\Yii::$app->user->id)) {
        echo Html::a('ویرایش', ['update', 'id' => $model->id, 'type' => $type], ['class' => 'btn btn-primary']);
        echo Html::a('حذف', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'آیا از حذف اطمینان دارید؟',
                'method' => 'post',
            ],
        ]);
     }
    else{
        echo "<div></div>";
    }
    ?>
</div>

