<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \app\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'ایجاد حساب کاربری';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h5 class="text-muted" style="float:right"><?= Html::encode($this->title) ?></h5>
<!---->
<!--    <p>لطفا موارد  زیر را وارد نمایید:</p>-->

    <div class="row">
        <div class="offset-lg-4"></div>
        <div class="col-lg-3">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('نام کاربری:') ?>

                <?= $form->field($model, 'email')->label('ایمیل :') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('رمز عبور :') ?>

                <div class="form-group">
                    <?= Html::submitButton('ایجاد', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
