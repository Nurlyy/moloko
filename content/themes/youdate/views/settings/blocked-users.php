<?php

use app\helpers\Html;
use app\helpers\Url;

/** @var $this \app\base\View */
/** @var $blockedUsers \app\models\Block[] */

$this->title = Yii::t('youdate', 'Blocked users');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert') ?>

<div class="content-conteaner-setting">
    <p class="h1">
        Черный список (Заблокированные Вами пользователи)
    </p>
    <div>
        <?php \yii\widgets\Pjax::begin(['id' => 'blocked-users-pjax']) ?>
            <?php foreach ($blockedUsers as $block): ?>
                <?php $profile = $block->blockedUser->profile ?>
                <div class="conteaner-user-block">
                    <a href="<?= Url::to(['/profile/view', 'username' => $block->blockedUser->username]) ?>">
                        <span class="avatar-user-block">
                            <img src="<?= $profile->getAvatarUrl() ?>" alt="">
                        </span> 
                        <span class="name-user-block">
                            <?= Html::encode($profile->getDisplayName()) ?>
                        </span>
                    </a>
                    <?= Html::a(Yii::t('youdate', 'Unblock'),
                    ['/block/delete'],
                    [
                        'class' => 'btn-unblock btn-ajax',
                        'data' => [
                            'type' => 'post',
                            'data' => 'blockedUserId=' . $block->blocked_user_id,
                            'pjax-container' => '#blocked-users-pjax',
                            'title' => Yii::t('youdate', 'Unblock user'),
                            'confirm-title' => Yii::t('youdate', 'Do you really want to unblock user {username}?', [
                                'username' => Html::encode($profile->getDisplayName()),
                            ]),
                            'cancel-button' => Yii::t('youdate', 'Cancel'),
                            'confirm-button' => Yii::t('youdate', 'Unblock'),
                        ],
                    ]) ?>
                </div>
            <?php endforeach; ?>
            <?php if (!count($blockedUsers)): ?>
                <?= \youdate\widgets\EmptyState::widget([
                    'icon' => 'fe fe-users',
                    'subTitle' => Yii::t('youdate', 'You have no blocked users'),
                ]) ?>
            <?php endif; ?>
        <?php \yii\widgets\Pjax::end() ?>
    </div>
</div>