<?php

use app\helpers\Url;
use app\helpers\Html;
use youdate\helpers\Icon;

/** @var $model \app\models\User */
/** @var $profile \app\models\Profile */

$profile = $model->profile;
$profileUrl = Url::to(['/profile/view', 'username' => $model->username]);
$subString = isset($subString) ? $subString : $profile->getDisplayLocation();
?>

<div class="conteaner-item" data-user-id="<?= $model->id ?>">
    <a href="<?= $profileUrl ?>" data-pjax="0">
        <img class="image-item" src="<?= $profile->getAvatarUrl('auto','270') ?>" alt="<?= Html::encode($profile->getDisplayName()) ?>">
        <!-- gold-status -->
        <span class="name-age">
            <?= Html::encode($profile->getDisplayName()) ?>, <?= $profile->getAge() ?>
        </span>
        <?= $this->render('/partials/online-status-list-item', ['model' => $model]) ?>
        <span class="photos-count">
            <?php if ($model->photosCount): ?>
                <?= $model->photosCount ?><?= Icon::fe('image', ['class' => 'ico-count']) ?>
            <?php endif; ?>
        </span>
    </a>
</div>