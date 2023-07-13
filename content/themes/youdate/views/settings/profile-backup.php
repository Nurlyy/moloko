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

    <div class="services-conteaner">
        <div class="header-servises">
            Редактирование анкеты
        </div>
        <?php $form = ActiveForm::begin([
            'id' => 'profile-form',
            'options' => ['class' => 'form-horizontal'],
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'validateOnBlur' => false,
        ]); ?>
        <div class="contenaer-content-setting">
            <?= $this->render('/_alert') ?>

            <?= Html::errorSummary($model) ?>

            <?= $form->field($model, 'name') ?>
            <?= $form->field($model, 'description')->textarea() ?>
            <div class="row">
                <div class="col-sm-4">
                    <?= $form->field($model, 'dob')->textInput(['type' => 'date']) ?>
                </div>


                <?php ?>
                <div class="col-sm-4">
                    <?= $form
                        ->field($model, 'country', ['inputOptions' => ['autocomplete' => 'off']])
                    ?>

                    <input type="text" id="profile-country" name="Profile[country]" value="">
                </div>

                <div>
                    <?= $form
                        ->field($model, 'city', ['inputOptions' => ['autocomplete' => 'off']])
                    ?>
                </div>

                <input type="text" id="profile-country" name="Profile[country]">

                <select name="Profile[country]">
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


            </div>
            <div class="row">
                <!-- <div class="col-sm-3">
                    <div class="form-group">
                        <div class="form-label"><?= $model->getAttributeLabel('status') ?></div>
                        <div class="custom-controls-stacked">
                            <?php foreach ($model->getStatusOptions() as $value => $title) : ?>
                                <label class="custom-control custom-radio">
                                    <?= Html::activeRadio($model, 'status', [
                                        'class' => 'custom-control-input',
                                        'value' => $value,
                                        'label' => false,
                                        'uncheck' => false,
                                    ]) ?>
                                    <span class="custom-control-label">
                                        <?= $title ?>
                                    </span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div> 
                <div class="col-sm-3">
                    <div class="form-group">
                        <div class="form-label"><?= $model->getAttributeLabel('sex') ?></div>
                        <div class="custom-controls-stacked">
                            <?php foreach ($model->getSexOptions() as $value => $title) : ?>
                                <label class="custom-control custom-radio">
                                    <?= Html::activeRadio($model, 'sex', [
                                        'class' => 'custom-control-input',
                                        'value' => $value,
                                        'label' => false,
                                        'uncheck' => false,
                                    ]) ?>
                                    <span class="custom-control-label">
                                        <?= $title ?>
                                    </span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>-->
                <div class="col-sm-3">
                    <div class="form-group">
                        <div class="form-label"><?= $model->getAttributeLabel('looking_for_sex') ?></div>
                        <div class="custom-controls-stacked">
                            <?php foreach ($model->getSexOptions(true) as $value => $title) : ?>
                                <?php if ($value !== Profile::SEX_NOT_SET) : ?>
                                    <label class="custom-control custom-checkbox">
                                        <?= Html::activeCheckbox($model, 'looking_for_sex_array[' . $value . ']', [
                                            'class' => 'custom-control-input',
                                            'uncheck' => false,
                                            'value' => $value,
                                            'label' => false,
                                        ]) ?>
                                        <span class="custom-control-label">
                                            <?= $title ?>
                                        </span>
                                    </label>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="row">
                        <div class="col-6">
                            <?= $form->field($model, 'looking_for_from_age') ?>
                        </div>
                        <div class="col-6">
                            <?= $form->field($model, 'looking_for_to_age') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <?= Html::submitButton(
                Icon::fe('save', ['class' => 'mr-2']) .
                    Yii::t('youdate', 'Save'),
                ['class' => 'btn btn-primary']
            ) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

    <?php foreach ($profileFieldCategories as $category) : ?>
        <div class="services-conteaner">
            <div class="header-servises">
                Редактирование анкеты
            </div>
            <?php $form = ActiveForm::begin([
                'id' => sprintf('profile-extra-%s-form', Html::encode($category->alias)),
                'options' => ['class' => 'form-horizontal'],
                'action' => ['extra-fields'],
                'enableAjaxValidation' => true,
                'enableClientValidation' => true,
                'validateOnBlur' => false,
            ]); ?>
            <div class="card-body">
                <?php if (Yii::$app->session->hasFlash('success_' . $category->alias)) : ?>
                    <div class="alert alert-success">
                        <?= Yii::$app->session->getFlash('success_' . $category->alias) ?>
                    </div>
                <?php endif; ?>
                <?= Html::hiddenInput('categoryAlias', $category->alias) ?>
                <?= Html::errorSummary($extraModels[$category->alias]) ?>
                <?php foreach (ArrayHelper::getValue($profileFields, $category->alias, []) as $field) : ?>
                    <?= $field->getFieldInstance()
                        ->getFieldInput($form, $extraModels[$category->alias], ['class' => 'form-control'])
                        ->label(Yii::t($field->language_category, $field->title)) ?>
                <?php endforeach; ?>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <?= Html::submitButton(
                    Icon::fe('save', ['class' => 'mr-2']) .
                        Yii::t('youdate', 'Save'),
                    ['class' => 'btn btn-primary']
                ) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    <?php endforeach; ?>