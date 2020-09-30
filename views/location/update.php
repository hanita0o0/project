<?php

use app\models\Location;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Location */
/* @var $type*/

$this->title = ' ویرایش '.($type == Location::POPSITE ? Location::TYPE_POPSITE :Location::TYPE_POINT) ;
$this->params['breadcrumbs'][] = ['label' => 'Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="location-update ">
    <br>
    <h4  style=" float:right " class="text-muted"><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
