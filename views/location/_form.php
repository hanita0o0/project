<?php

use app\helpers\Access;
use app\models\City;
use app\models\Province;
use app\models\Region;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Location */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="location-form">
  <div class="row">
        <div class="col offset-sm-2"></div>

              <div class="col-sm-4 " >
                  <?php $form = ActiveForm::begin(['options' => ['class' => 'text-right ']]); ?>

                  <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'latitude')->textInput() ?>

                  <?= $form->field($model, 'longitude')->textInput() ?>

                  <?php

                  $provinces=ArrayHelper::map(Province::find()->asArray()->all(), 'id', 'name');
                  echo $form->field($model, 'province_id')->dropDownList($provinces,
                     ['prompt'=>['text' => 'انتخاب کنید',
                             'options'=> ['disabled' => true, 'selected' => true]],
                         'onchange'=>'
			    	$.post( "'.Yii::$app->urlManager->createUrl('location/city_lists?id=').'"+$(this).val(), function( data ) {
				     $( "select#city_id" ).html( data ).removeAttr("disabled");});']);


                  if($model->city_id){
                      $cit= ArrayHelper::map(City::find()->where(['id'=>$model->city_id])->asArray()->all(), 'id', 'name');
                  }
                  else{
                      $cit = [];
                  }

                  echo $form->field($model, 'city_id')->dropDownList($cit, ['id'=>'city_id','disabled' => 'disabled',
                      'onchange'=>'
			    	$.post( "'.Yii::$app->urlManager->createUrl('location/region_lists?id=').'"+$(this).val(), function( data ) {
				     $( "select#region_id" ).html( data ).removeAttr("disabled");});']);


                  if($model->region_id){
                      $reg= ArrayHelper::map(Region::find()->where(['id'=>$model->region->id])->asArray()->all(),'id', 'name');
                  }
                  else{
                      $reg = [];
                  }
                  echo $form->field($model, 'region_id')->dropDownList($reg, ['id'=>'region_id','disabled' => 'disabled']);
                  ?>
                  <?= $form->field($model, 'address')->textarea(['maxlength' => true]) ?>

                  <div class="form-group ">

                      <?php  if(Access::accessAdmin($userId=\Yii::$app->user->id)){
                      echo Html::submitButton('ذخیره', ['class' => 'btn btn-success ']);}
                      else{
                          echo "<div></div>";
                      }

                      ?>
                  </div>

                      <?php ActiveForm::end(); ?>
              </div>
      <div class="col offset-sm-2"></div>

  </div>


</div>
