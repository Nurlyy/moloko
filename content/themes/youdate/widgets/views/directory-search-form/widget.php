<?php

use app\helpers\Html;
use app\models\ProfileField;
use app\models\Sex;
use app\forms\UserSearchForm;
use youdate\helpers\HtmlHelper;
use youdate\helpers\Icon;
use youdate\widgets\ActiveForm;

/** @var $this \app\base\View */
/** @var $model \app\forms\UserSearchForm */
/** @var $user \app\models\User */
/** @var $countries array */
/** @var $currentCity array */
/** @var $profileFields \app\models\ProfileField[] */

/**
 * @param ProfileField[] $profileFields
 * @param ActiveForm $form
 * @param UserSearchForm $model
 * @param string $extraFieldsAttribute
 * @param bool $userHasPremium
 * @return string
 */
$renderSearchFields = function ($profileFields, $form, $model, $extraFieldsAttribute, $userHasPremium) {
    $html = '';
    foreach ($profileFields as $field) {
        $inputs = $field->getFieldInstance()->getFieldSearchInputs($form, $model, 'extraFields', $userHasPremium);
        if (!is_array($inputs)) {
            $inputs = [$inputs];
        }
        $inputsCount = count($inputs);
        $colSize = $inputsCount > 0 && $inputsCount <= 4 ? 12 / $inputsCount : 12;
        $html .= Html::beginTag('div', ['class' => 'row']);
        foreach ($inputs as $input) {
            $html .= Html::tag('div', $input, ['class' => 'col-' . $colSize]);;
        }
        $html .= Html::endTag('div');
    }

    return $html;
};

$locationAddressCss = $model->locationType == UserSearchForm::LOCATION_TYPE_NEAR ? '' : 'hidden';
$locationNearCss = $model->locationType == UserSearchForm::LOCATION_TYPE_ADDRESS ? '' : 'hidden';
$userHasPremium = $user !== null ? $user->isPremium : false;

$this->registerJs('
    $("body").on("change", "input[name=locationType]", function(event) {
        var $selected = $("input[name=locationType]:checked");
        $(".location-type").addClass("hidden");
        $(".location-type.location-" + $selected.val()).removeClass("hidden");
    });
', \app\base\View::POS_READY);
?>

<?php $form = ActiveForm::begin([
    'id' => 'search-form',
    'method' => 'get',
    'action' => ['/directory/index'],
    'options' => ['class' => 'form-horizontal'],
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'validateOnBlur' => false,
]); ?>

<div >
    <?= Html::errorSummary($model, [
        'header' => false,
        'class' => 'alert bg-red text-white w-100',
    ]) ?>
</div>

<div class="conteaner-search-form-index">
    <div class="conteaner-label-search-form">
        <span></span>
        <span>Возрастом от</span>
        <span>до, лет</span>
        <span>в городе</span>
    </div>
    <div class="contenaer-grom-to-age">
        <?= Html::activeTextInput($model, 'fromAge', [
            'class' => 'grom-to-age',
            'type' => 'number',
            'min' => 18,
            'step' => 1,
        ]) ?>
        <?= Html::activeTextInput($model, 'toAge', [
            'class' => 'grom-to-age',
            'type' => 'number',
            'min' => 18,
            'max' => 100,
            'step' => 1,
        ]) ?>
        <input type="hidden" name="locationType" value="address">

        <select name="city" class="country arrow">
            <option value="">Из города</option>
            <optgroup label="Три столицы:">
                <option value="34343" selected>Москва</option>
                <option value="8">Санкт-Петербург</option>
                <option value="524901">Казань</option>
            </optgroup>
            <optgroup label="Города россии:">
                <option value="4">Уфа</option>
                <option value="5">Владивосток</option>
                <option value="6">Пермь</option>
                <option value="7">Екатеринбург</option>
                <option value="8">Калиниград</option>
                <option value="FK">Фолклендские о-ва</option>
                <option value="FR">Франция</option>
                <option value="GF">Французская Гвиана</option>
                <option value="PF">Французская Полинезия</option>
                <option value="TF">Французские Южные Территории</option>
                <option value="HR">Хорватия</option>
                <option value="CF">ЦАР</option>
                <option value="TD">Чад</option>
                <option value="ME">Черногория</option>
                <option value="CZ">Чешская Республика</option>
                <option value="CL">Чили</option>
                <option value="CH">Швейцария</option>
                <option value="SE">Швеция</option>
                <option value="LK">Шри-Ланка</option>
                <option value="EC">Эквадор</option>
                <option value="GQ">Экваториальная Гвинея</option>
                <option value="ER">Эритрея</option>
                <option value="EE">Эстония</option>
                <option value="ET">Эфиопия</option>
                <option value="ZA">ЮАР</option>
                <option value="GS">Южная Джорджия и Южные Сандвичевы Острова</option>
                <option value="KR">Южная Корея</option>
                <option value="SS">Южный Судан</option>
                <option value="JM">Ямайка</option>
                <option value="JP">Япония</option>
            </optgroup>
        </select>
        <?= Html::submitButton(Icon::fe('search', ['class' => 'ico-s']) . Yii::t('youdate', 'Искать'), [
            'class' => 'btn-s'
        ]) ?>
        <button class="btn-s search-options" type="button" data-toggle="modal" data-target="#modal-search">
            <img src="/content/themes/youdate/static/images/sliders.svg" alt="">
        </button>
    </div>
</div>
    
<div class="modal modal-search fade" tabindex="-1" role="dialog" id="modal-search">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <?php if (!Yii::$app->user->isGuest): ?>
            <div class="modal-header">
                <h5 class="modal-title">
                    <?= Yii::t('youdate', 'Custom search') ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="<?= Yii::t('youdate', 'Close') ?>"></button>
            </div>
            <div class="modal-body">
                <?= $form->field($model, 'online')->checkbox(['uncheck' => false]) ?>
                <?= $form->field($model, 'verified')->checkbox(['uncheck' => false]) ?>
                <?= $form->field($model, 'withPhoto')->checkbox() ?>
                <!-- <?= $renderSearchFields($profileFields, $form, $model, 'extraFields', $userHasPremium) ?> -->
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button class="btn btn-secondary btn-reset" type="button">
                    <?= Yii::t('youdate', 'Reset filters') ?>
                </button>
                <button class="btn btn-primary" type="button" data-dismiss="modal">
                    <?= Yii::t('youdate', 'Close') ?>
                </button>
            </div>
            
        <?php else: ?>
            привет, этот текст для не авторизованных пользователей2
        <?php endif; ?>
        </div>
    </div>
</div>

<div class="modal modal-search fade" tabindex="-1" role="dialog" id="modal-search2" style="color:#111 !important">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            Привет, просто зарегайся.
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
