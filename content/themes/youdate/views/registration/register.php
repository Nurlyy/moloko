<?php

use app\helpers\Html;
use youdate\widgets\ActiveForm;

/** @var \yii\web\View $this **/
/** @var \app\forms\RegistrationForm $model **/
/** @var array $sexOptions **/
/** @var array $countries **/

$this->title = Yii::t('youdate', 'Sign up');
$this->context->layout = 'page-main';
?>
<?php $form = ActiveForm::begin([
    'id' => 'registration-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'validateOnBlur' => false,
    'validateOnType' => false,
    'validateOnChange' => false,
]); ?>

<?= $form->errorSummary($model) ?>
<?= $this->render('_register_form', [
    'form' => $form,
    'model' => $model,
    'sexOptions' => $sexOptions,
    'countries' => $countries,
    'account' => null
]) ?>

<?php ActiveForm::end(); ?>