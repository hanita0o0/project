<?php

use app\helpers\Access;
use app\models\Location;
use app\models\TypeService;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Service */
/* @var $form yii\widgets\ActiveForm */
/* @var $arr*/
?>

<div class="service-form">
    <div class="row">
        <div class="col offset-sm-2"></div>

        <div class="col-sm-4" >

            <?php $form = ActiveForm::begin(['options' => ['class' => 'text-right ']]); ?>
            <?php
            $service=ArrayHelper::map(TypeService::find()->asArray()->all(), 'id', 'name');
//             var_dump($service);
            echo $form->field($model, 'type_service_id')->dropDownList($service,
                ['prompt'=>['text' => 'انتخاب کنید',
                    'options'=> ['disabled' => true, 'selected' => true]],
                    'onchange'=>'
			    	$.post( "'.Yii::$app->urlManager->createUrl('service/select?type=').'"+$(this).val(), function( data ) {
				     $( "select#location_id" ).html(data).removeAttr("disabled");});']);
            ?>
            <?php
            $codes = \yii\helpers\ArrayHelper::map(\app\models\CodePhone::find()->asArray()->all(), 'id', 'code');

            echo $form->field($model, 'code_phone_id')->dropDownList($codes,
                ['prompt'=>['text' => 'انتخاب کنید',
                    'options'=> ['disabled' => true, 'selected' => true]]]); ?>

            <?= $form->field($model, 'phone')->textInput() ?>
             <?php
             if($model->location_id){
                 $loc= ArrayHelper::map(Location::find()->where(['id'=>$model->location_id])->select(['id','name'])->asArray()->all(), 'id', 'name');
             }
             else{
                 $loc = [];
             } ?>

            <?php echo $form->field($model, 'location_id')
                ->dropDownList($loc, ['id'=>'location_id','disabled' => 'disabled']) ?>


            <div class="form-group">
                <?php  if(Access::accessAdmin($userId=\Yii::$app->user->id)){
                    echo Html::submitButton('ذخیره', ['class' => 'btn btn-success ','id'=>'submit-button']);}
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

<!--<script type="text/javascript">-->
<!--    var type_location_id = document.getElementById('type_location_id')-->
<!--    $( "#type_location_id" ).change(function() {-->
<!--        alert(typeof parseInt(type_location_id.value));-->
<!--    });-->
<!--</script>-->

