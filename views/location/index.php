<?php

use app\helpers\Access;
use app\models\Location;
use app\models\User;
use app\models\UserRole;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $type*/

$this->title = 'لیست '.($type == Location::POPSITE ? Location::TYPE_POPSITE :Location::TYPE_POINT);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-index">
    <div class="row ">
        <div class="offset-lg-2"></div>

        <div class="col-sm-12 col-lg-8 ">
            <br>
            <h4  style=" float:right " class="text-muted"><?= Html::encode($this->title) ?></h4>
            <br>
            <p>
                <?= Html::a('افزودن '.($type == Location::POPSITE ? Location::TYPE_POPSITE :Location::TYPE_POINT),
                    ['create'], ['class' => 'btn btn-primary']) ?>
            </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'pager' => [
            'class' => \yii\bootstrap4\LinkPager::class,
        ],
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'latitude',
            'longitude',
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'عملیات',
                'template'=>'{view}{delete}{update}',
                'headerOptions' => ['style' => 'color:#355ab0'],
                'buttons' => [

                    //view button
                    'view' => function ($url, $model) {
                        return Html::a('نمایش', $url, [

                            'title' => Yii::t('app', 'View'),
                            'class'=>'btn btn-outline-primary',
                        ]);
                    },
                    // update button
                    'update' => function ($url, $model,$type) {
                        $route='';
                        //check authorization
                       if(Access::accessAdmin($userId=\Yii::$app->user->id)) {

                           $route = Html::a('ویرایش', Url::to(['/location/update', 'type' => $type, 'id' => $model->id]), [
                               'title' => Yii::t('app', 'Update'),
                               'class' => 'btn btn-outline-success',
                           ]);
                       }
                        return $route;

                    },
                    //delete button
                    'delete' => function ($url, $model,$type) {
                         $route='';
                        //check authorization
                        if(Access::accessAdmin($userId=\Yii::$app->user->id)) {
                            $route=Html::a('حذف', $url, [
                                'data-method' => 'post',
                                'data-confirm' => 'آیا اطمینان از حذف دارید؟',
                                'title' => Yii::t('app', 'Delete'),
                                'class'=>'btn btn-outline-danger  ',
                            ]);
                        }
                        return $route;
                    }


                ],



            ],

        ]
    ]); ?>

            <div class="offset-lg-2 "></div>
        </div>
    </div>


