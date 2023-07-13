<?php

use yii\helpers\Html;
use youdate\widgets\ActiveForm;

/** @var $this \app\base\View */
/** @var $form \yii\widgets\ActiveForm */
/** @var $model \app\forms\SettingsForm */

$this->title = Yii::t('youdate', 'Account settings');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>
	<?php $form = ActiveForm::begin([
            'id' => 'account-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
     ]); ?>

<div class="content-conteaner-setting min-cont-w">
    <p class="h1">
        Смена пароля
    </p>
  
<div class="wrapper-line-form p200">      
	<?= $form->field($model, 'email') ?>
</div>
<div class="wrapper-line-form p200"> 
	<?= $form->field($model, 'newPassword')->passwordInput() ?>
</div>
<div class="wrapper-line-form p200">
	<?= $form->field($model, 'currentPassword')->passwordInput() ?>
</div>
  
        <?= Html::submitButton(Yii::t('youdate', 'Сохранить изменения'), ['class' => 'btn-save-universal ']) ?><br>
        <?php ActiveForm::end(); ?>
    </div>
</div>
