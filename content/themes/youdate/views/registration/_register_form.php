<?php

use app\helpers\Html;
use app\models\Profile;
use app\models\Sex;
use youdate\helpers\HtmlHelper;

/** @var \yii\web\View $this **/
/** @var \app\forms\RegistrationForm $model **/
/** @var \app\models\Account $account */
/** @var array $sexOptions **/
/** @var array $countries **/
?>

<div class="wrapper-contenaer-registration">
    <h1 class="h1">
        Создание анкеты
    </h1>
    <p class="pd-h1">
        Просто заполните форму ниже. Займёт не больше 30 секунд.
    </p>
    <div class="contenaer-registration">
        <div class="conteaner-forms">


            <div class="conteaner-two gender">
            <?php foreach ((new Profile())->getSexModels() as $key => $sexModel): ?>
                <div class="form_radio">
                	<input id="<?='radio-'.$key ?>" type="radio" <?php //if($key == 1) echo 'required' ?> name="<?= Html::getInputName($model, 'sex') ?>" onblur="checkParams()" value="<?= $sexModel->sex ?? \app\models\Profile::SEX_NOT_SET ?>">
                	<label for="<?='radio-'.$key ?>"><?= Html::encode($sexModel instanceof Sex ? $sexModel->getTitle() : $sexModel) ?></label>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="conteaner-one">
            <?= $form->field($model, 'name')->textInput(['placeholder' => 'Моё имя или псевдоним', 'onblur' => 'checkParams()'])->label(false) ?>
            </div>
            <div class="conteaner-dmy">
                <select id="register_form_dobday" class="arrow" name="<?= Html::getInputName($model, 'dobDay') ?>" onblur="checkParams()" >
                    <option value>День рож.</option>
                    <?php foreach ($model->getDobDayOptions() as $key => $value): ?>
                        <option value="<?= $value ?>"><?= $value ?></option>
                    <?php endforeach; ?>
                </select>
                <select id="register_form_dobMonth" class="arrow" name="<?= Html::getInputName($model, 'dobMonth') ?>" onblur="checkParams()" >
                    <option value>Месяц</option>
                    <?php foreach ($model->getDobMonthOptions() as $key => $value): ?>
                        <option value="<?= $key ?>"><?= $value ?></option>
                    <?php endforeach; ?>
                </select>
                <select id="register_form_dobYear" class="arrow" name="<?= Html::getInputName($model, 'dobYear') ?>" onblur="checkParams()" >
                    <option value>Год</option>
                    <?php foreach ($model->getDobYearOptions() as $key => $value): ?>
                        <option value="<?= $value ?>"><?= $value ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="conteaner-one">
                <select class="arrow" name="<?= Html::getInputName($model, 'city') ?>]" id="register_form_city" onblur="checkParams()" >
                    <option value>Из города</option>
                    <optgroup label="Три столицы:">
                        <option value="524901">Москва</option>
                        <option value="2">Санкт-Петербург</option>
                        <option value="3">Казань</option>
                    </optgroup>
                    <optgroup label="Города россии:">
                        <option value="4">Уфа</option>
                        <option value="5">Владивосток</option>
                        <option value="6">Пермь</option>
                        <option value="7">Екатеринбург</option>
                        <option value="8">Калиниград</option>
                    </optgroup>
                </select>
            </div>
            <div class="conteaner-two email">
                <?= $form->field($model, 'email')->textInput(['placeholder' => 'Мой E-mail', 'onfocus'=>'this.removeAttribute("readonly")', 'readonly' => 'readonly', 'onblur' => 'checkParams()'])->label(false) ?>
                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль','onblur' => 'checkParams()','onfocus'=>'this.removeAttribute("readonly")', 'readonly' => 'readonly'])->label(false) ?>
            </div>        
            <div class="conteaner-one">
                <?= Html::submitButton('Продолжить', ['id' => 'register-form-submit','class' => 'btn-ii btn-disabled', 'disabled' => 'disabled']) ?> 
            </div>
            <div class="consent">
                Нажимая "Продолжить", Вы принимаете <a href="#">пользовательское соглашение</a>, <a href="#">политику конфиденциальности</a>, а также подтверждаете, что вам есть 18 лет
            </div>
        </div>
    </div>
</div>