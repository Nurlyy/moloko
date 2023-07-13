<?php

use app\models\Photo;
use app\helpers\Html;
use youdate\helpers\Icon;

/** @var $model Photo */
/** @var $profile \app\models\Profile */
/** @var $photoModerationEnabled bool */

$profile = Yii::$app->user->identity->profile;
$previewUrl = $model->getThumbnail('100%', '100%', 'crop-center', ['sharp' => 1]);
?>

<div class="contenaer-photo">
    <div class="wrapper-images">
        <img class="image-item" src="<?= $previewUrl ?>">
        <?php if ($model->is_verified): ?>
            <div class="wrappew-status-photo">
                <div class="status-photo allowed">
                    &#10003
                </div>
            </div>
        <?php elseif ($photoModerationEnabled == true && !$model->is_verified): ?>
            <div class="wrappew-status-photo moderation-bg">
                <div class="status-photo moderation">
                    Фото на проверке
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div>
        
    </div>
    <div class="conteaner-navigation-photo">
        <?= Html::a(Icon::fe(''), ['/photo/set-main', 'id' => $model->id], [
            'class' => 'btn-ajax btn-selected-avatar ' . ($profile->photo_id == $model->id ? 'selected' : 'no-selected'),
            'data-pjax-container' => '#pjax-settings-photos',
            'data-type' => 'post',
        ]) ?>
        <?= Html::a(Icon::fe(''), ['/photo/delete', 'id' => $model->id], [
            'class' => 'btn-ajax btn-trash',
            'data-pjax-container' => '#pjax-settings-photos',
            'data-confirm-title' => Yii::t('youdate', 'Delete this photo?'),
            'data-title' => Yii::t('youdate', 'Delete photo'),
            'data-type' => 'post',
        ]) ?>
    </div>
</div>