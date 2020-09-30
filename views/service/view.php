<?php

use app\helpers\Access;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Service */

$this->title = 'جزییات سرویس  ----> '.$model->phone;
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<br><br>

<div class="location-view ">
    <h5 style="float:right " class="text-muted"><?= Html::encode($this->title) ?></h5>

    <div class="row  ">


        <div class="offset-lg-3"></div>

        <div class="col-sm-12 col-lg-6  ">

    <?= DetailView::widget([
        'model' => $model,
        'options' => ['class' => 'text-right table table-striped table-bordered detail-vie'],
        'attributes' => [
            'code_phone_id',
            'phone',
            'location_id',
            'type_service_id',
            'created_at',
            'updated_at',
        ]
    ]) ?>

</div>
        <div class="offset-lg-3 "></div>
    </div>
</div>
<div class="d-flex justify-content-center">

    <?php  if(Access::accessAdmin($userId=\Yii::$app->user->id)) {
        echo Html::a('ویرایش', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
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

