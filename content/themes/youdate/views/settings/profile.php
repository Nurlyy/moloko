<?php

use app\helpers\Html;
use app\models\Profile;
use yii\helpers\ArrayHelper;
use youdate\widgets\ActiveForm;
use youdate\helpers\Icon;

/** @var $model \app\models\Profile */
/** @var $form \yii\widgets\ActiveForm */
/** @var $this \app\base\View */
/** @var $countries array */
/** @var $profileFields \app\models\ProfileField[] */
/** @var $profileFieldCategories \app\models\ProfileFieldCategory[] */
/** @var $profileExtra \app\models\ProfileExtra[] */
/** @var $extraModels \app\forms\ProfileExtraForm[] */
/** @var $isOneCountryOnly bool */

$this->title = Yii::t('youdate', 'Profile settings');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin([
		'id' => 'profile-form',
        'options' => ['class' => 'form-horizontal'],
        'enableAjaxValidation' => true,
        'enableClientValidation' => true,
        'validateOnBlur' => false,
    ]); ?>
    <?= $this->render('/_alert') ?>

    <?= Html::errorSummary($model) ?>

<div class="content-conteaner-setting min-cont-w">
    <p class="h1">
      Редактирование анкеты
    </p>
	<div class="wrapper-line-form p200">
  		<?= $form->field($model, 'name') ?>
  	</div>
  	<div class="wrapper-line-form p200">
        <label>Я из города</label>
  		<select class="arrow" name="<?= Html::getInputName($model, 'city') ?>" id="profile_form_city">
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
  	<div class="wrapper-line-form p310">
        <label>Дата рождения (её не видит ни кто, кроме вас)</label>
    </div>
	<div class="wrapper-line-form p310-3">
      	<?php $dob = \DateTime::createFromFormat('Y-m-d', $model['dob']); ?>
                    <select id="profile_form_dobday" class="arrow" name="<?= Html::getInputName($model, 'dobDay') ?>">
                        <?php foreach ($model->getDobDayOptions() as $key => $value) {
                            if ($dob->format("j") == $value) { ?>
                                <option selected value="<?= $key ?>"><?= $value ?></option>
                            <?php } else { ?>
                                <option value="<?= $key ?>"><?= $value ?></option>
                        <?php }
                        } ?>
                    </select>
                    <select id="profile_form_dobMonth" class="arrow" name="<?= Html::getInputName($model, 'dobMonth') ?>">
                        <?php foreach ($model->getDobMonthOptions() as $key => $value) {
                            if ($dob->format("n") == $key) { ?>
                                <option selected value="<?= $key ?>"><?= $value ?></option>
                            <?php } else { ?>
                                <option value="<?= $key ?>"><?= $value ?></option>
                        <?php }
                        } ?>
                    </select>
                    <select id="profile_form_dobYear" class="arrow" name="<?= Html::getInputName($model, 'dobYear') ?>">
                        <?php foreach ($model->getDobYearOptions() as $key => $value) {
                            if ($dob->format("Y") == $value) { ?>
                                <option selected value="<?= $key ?>"><?= $value ?></option>
                            <?php } else { ?>
                                <option value="<?= $key ?>"><?= $value ?></option>
                        <?php }
                        } ?>
                    </select>
    </div>
  	<div class="wrapper-line-form p310">
      <?= $form->field($model, 'description')->textarea() ?>
    </div>
 
	<?php if (Yii::$app->session->hasFlash('success_' . $category->alias)) : ?>
		<div class="alert alert-success">
			<?= Yii::$app->session->getFlash('success_' . $category->alias) ?>
        </div>
    <?php endif; ?>
    <?= Html::hiddenInput('categoryAlias', $category->alias) ?>
    <?= Html::errorSummary($extraModels[$category->alias]) ?>
    <?php foreach (ArrayHelper::getValue($profileFields, $category->alias, []) as $field) : ?>
    <?= $field->getFieldInstance()
       ->getFieldInput($form, $extraModels[$category->alias], ['class' => ''])
       ->label(Yii::t($field->language_category, $field->title)) ?>
    <?php endforeach; ?>

            <?= Html::submitButton(
                
                    Yii::t('youdate', 'Сохранить изменения'),
                ['class' => 'btn-save-universal', 'id' => 'save']
            ) ?>
  
    </div>
    <?php ActiveForm::end(); ?>
<script>
    $(document).ready(function() {
        $("#profile_form_city option[value='<?= $model['city'] ?>']").prop('selected', true);
    });

    function clicktosecondform() {
        $("#save2").click();
        // $("#save").click();
    }
</script>