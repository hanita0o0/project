<?php

use app\models\Location;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Location */
/* @var $type*/

$this->title = 'افزودن '.($type == Location::POPSITE ? Location::TYPE_POPSITE :Location::TYPE_POINT);
$this->params['breadcrumbs'][] = ['label' => 'Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-create">
   <br>
    <h5 style=" float:right " class="text-muted"><?= Html::encode($this->title) ?></h5>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
