<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'ورود به حساب کاربری';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <h5 style=" float:right " class="text-muted"><?= Html::encode($this->title) ?></h5>

<!--     <p style=" float:right " class="text-muted">لطفا موارد  زیر را وارد نمایید:</p>-->
<br><br>
    <div class="row">
        <div class="offset-lg-4"></div>
        <div class="col-lg-3">
            <?php $form = ActiveForm::begin(['id' => 'login-form','class'=>'text-right']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('نام کاربری :') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('رمز عبور :') ?>

                <?= $form->field($model, 'rememberMe')->checkbox()->label(' مرا به خاطر بسپار :') ?>

<!--                <div style="color:#999;margin:1em 0">-->
<!--                    رمز خود را فراموش کرده اید؟ --><?//= Html::a('بازیابی', ['site/request-password-reset']) ?><!--.-->
<!--                    <br>-->
<!--                    آیا به ارسال دوباره ایمیل تایید نیاز دارید؟ --><?//= Html::a('ارسال مجدد', ['site/resend-verification-email']) ?>
<!--                </div>-->

                <div class="form-group">
                    <?= Html::submitButton('ورود', ['class' => 'btn btn-primary','name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
