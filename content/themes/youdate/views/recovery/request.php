<?php

use app\helpers\Html;
use youdate\widgets\ActiveForm;

/** @var \yii\web\View $this **/
/** @var yii\widgets\ActiveForm $form **/
/** @var \app\forms\RecoveryForm $model */

$this->title = Yii::t('youdate', 'Recover your password');
$this->context->layout = 'page-main';
?>

<div class="contenaer-registration">
    <div class="conteaner-forms">
        <h1>
            Восстановление пароля
        </h1>
        <div class="conteaner-one label-none">
            <?php $form = ActiveForm::begin([
                'id' => 'password-recovery-form',
                'enableAjaxValidation' => false,
                'enableClientValidation' => true,
            ]); ?>
            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
            <?php if ($model->isCaptchaRequired()): ?>
                <?= $form->field($model, 'captcha')->widget(\yii\captcha\Captcha::class) ?>
            <?php endif; ?>
        </div>
        <div class="conteaner-one label-none">
            <?= Html::submitButton(Yii::t('youdate', 'Continue'), ['class' => 'btn-ii']) ?>
        </div>
        <?php ActiveForm::end(); ?>