<?php

use app\helpers\Html;
use app\models\DataRequest;
use youdate\widgets\ActiveForm;
use youdate\helpers\Icon;

/** @var $this \app\base\View */
/** @var $dataRequestForm \app\forms\DataRequestForm */
/** @var $dataRequests \app\models\DataRequest[] */
/** @var $profile \app\models\Profile */

$this->title = Yii::t('youdate', 'Your data');
$this->params['breadcrumbs'][] = $this->title;
$premiumFeaturesEnabled = \yii\helpers\ArrayHelper::getValue($this->params, 'site.premiumFeatures.enabled');
?>

<div class="content-conteaner-setting">
    <p class="h1 photo-h">
        Удаление анкеты
    </p>
    <div class="conteaner-delete">
        <div class="alert-delete">
            <strong><?= Yii::t('youdate', 'Warning') ?>:</strong>
            <?= Yii::t('youdate', 'This action will remove all your data completely.') ?>
        </div>
        <div>
            <?= Yii::t('youdate', 'Data to be removed') ?>:
            <ul class="pt-2">
                <li><?= Yii::t('youdate', 'Your profile info') ?></li>
                <li><?= Yii::t('youdate', 'Your photos') ?></li>
                <li><?= Yii::t('youdate', 'Your messages') ?></li>
                <li><?= Yii::t('youdate', 'Your likes and connections') ?></li>
                <?php if ($premiumFeaturesEnabled): ?>
                <li><?= Yii::t('youdate', 'Your balance and transactions') ?></li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="pt-2">
            <?= Html::a(Yii::t('youdate', 'Удалить анкету'), ['/settings/delete'], [
                'class' => 'btn-addphoto',
                'data-method' => 'post',
                'data-confirm' => Yii::t('youdate', 'Вы действительно хотите безвозвратно удалить Вашу анкету?'),
            ]) ?>
        </div>
    </div> 
</div>