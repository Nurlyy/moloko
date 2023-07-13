<?php

use app\helpers\Html;
use youdate\widgets\ActiveForm;
use youdate\widgets\Connect;

/** @var \app\base\View $this */
/** @var \app\forms\LoginForm $model */

$this->title = Yii::t('youdate', 'Sign in');
$this->context->layout = 'page-main';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'validateOnBlur' => false,
    'validateOnType' => false,
    'validateOnChange' => false,
    'options' => ['class' => ''],
]) ?>


<!-- 
Ниже форма авторизации. Она полностью работает. Нужно добавить
1) Если кликнуть на кнопку "Войти" с пустыми полями - Появляется 2 ошибки.
Под полем Мой E-Mail не корректен текст ошибки, сейчас "Укажите "Войти"" А надо - "Укажите "E-Mail"" 
-->
<div class="wrapper-contenaer-registration">
    <h1 class="h1">
        Выполнить вход
    </h1>
    <p class="pd-h1">
        Укажите E-Mail и пароль.
    </p>
    <div class="contenaer-registration">
        <div class="conteaner-forms">
            <div class="conteaner-one label-none">
                <?= $form->field($model, 'login', [
                    'inputOptions' => [
                        'autofocus' => 'autofocus',
                        'class' => '',
                        'tabindex' => '1',
                        'placeholder' => Yii::t('youdate', 'Мой E-Mail'),
                    ]
                ]) ?>
            </div>
            <div class="conteaner-one label-none">
                <?= $form->field($model, 'password', [
                    'inputOptions' => [
                        'class' => '',
                        'tabindex' => '2',
                        'placeholder' => Yii::t('youdate', 'Password'),
                    ]])
                    ->passwordInput()
                ?>
            </div>
            <div class="conteaner-one">
                <?php if ($model->isCaptchaRequired()): ?>
                    <?= $form->field($model, 'captcha')->widget(\yii\captcha\Captcha::class) ?>
                <?php endif; ?>

                <?= $form->field($model, 'rememberMe')->checkbox(['tabindex' => '3']) ?>

                <?= Connect::widget([
                    'baseAuthUrl' => ['/security/auth'],
                ]) ?>
                <a href="/recovery/request" class="request-link">Забыли пароль?</a>
            </div>
            <div class="conteaner-one">
                <?= Html::submitButton(Yii::t('youdate', 'Sign in'),
                    ['class' => 'btn-ii', 'tabindex' => '4']
                ) ?>
            </div>
            <div class="consent">
                Нажимая "Продолжить", Вы принимаете <a href="#">пользовательское соглашение</a>, <a href="#">политику конфиденциальности</a>, а также подтверждаете, что вам есть 18 лет
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>