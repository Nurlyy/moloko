<?php

use app\helpers\Html;
use app\helpers\Url;
use youdate\helpers\Icon;

/** @var bool $showBalance */
/** @var \app\base\View $this */

$user = $this->getCurrentUser();
$profile = $this->getCurrentUserProfile();
?>

<!-- <?php if ($showBalance): ?>
    <div class="nav-item d-none d-sm-block">
        <a href="<?= Url::to(['balance/services']) ?>"
           class="btn btn-outline-primary btn-sm"
           data-pjax="0"
           title="<?= Yii::t('youdate', 'Balance') ?>" rel="tooltip">
            <?= Icon::fa('money', ['class' => 'mr-2']) ?>
            <span class="user-balance"><?= $this->params['user.balance'] ?></span>
        </a>
    </div>
<?php endif; ?> -->
<div>

    <a href="<?= Url::to(['/profile/index']) ?>" class="" style="position: relative; top:17px; margin: 0; right:0 ;float:right" data-toggle="dropdown">
        <img src="<?= $profile->getAvatarUrl(64, 64) ?>" alt="" style="border-radius:50%; height:34px; width:34px;">
    </a>

    <div class="dropdown-menu dropdown-menu-right dropdown-st">
        <div class="pannel-user">
            <a href="/settings/profile" class="link-profile">
                <span>
                    <img src="<?= $profile->getAvatarUrl(64, 64) ?>" alt="" class="avatar-42">
                </span>
                <span class="conteaner-dat-a">
                    <span class="name-user">
                        <?= Html::encode($profile->getDisplayName()) ?>
                    </span>
                    <span class="login-user">
                        <?= Html::encode($user->email) ?>
                    </span>
                    <span class="edit-user">
                        Редкатировать анкету
                    </span>
                </span>
                <span>
                    <img src="/content/themes/youdate/static/images/user-edit.svg" alt="" class="ico-used-edit">
                </span>
            </a>

            <a href="<?= Url::to(['/balance/buy']) ?>" class="link-balance">
                <span class="balance-user-a">
                    Баланс: <?= $this->params['user.balance'] ?> руб.
                </span>
                <span class="add-balance">
                    Пополнить
                </span>
                <span>
                    <img src="/content/themes/youdate/static/images/arrow2.svg" alt="" class="ico-used-balance">
                </span>
            </a>
        </div>

        <div class="pannel-premium">
            <div class="header-pannel-premium">
                <span>
                    PREMIUM:
                </span>
                <span class="wrapper-status-premium">
                    <span class="status-premium no-active">
                        Не активирован
                    </span>
                </span>
            </div>
            <a href="/balance/services" class="link-premium">
                <span class="b-link-premium-a">
                    Общайтесь без границ
                </span>
                <span class="b-link-premium">
                    Подробнее
                </span>
                <span class="ico-b-link-premium">
                    <img src="/content/themes/youdate/static/images/arrow3.svg" alt="" class="ico-used-balance">
                </span>
            </a>
        </div>

        <div class="panel-nav-user">
            <a href="/balance/services">Сервисы и услуги</a>
            <?php if ($user->isAdmin || $user->isModerator): ?>
                <a href="<?= Url::to(['/' . env('ADMIN_PREFIX')]) ?>">
                    <?= Yii::t('youdate', 'Administration') ?>
                </a>
            <?php endif; ?>
            <a href="/settings/photos">Мои фотографии</a>
            <a href="/settings/profile">Редактировать анкету</a>
            <a href="/settings/account">Настройки</a>
            <a href="/settings/blocked-users">Чёрный список</a>
            <a href="/settings/notifications">Уведомления</a>
            <a class="dropdown-item" data-method="post" href="<?= Url::to(['/security/logout']) ?>">
                <?= Yii::t('youdate', 'Sign out') ?>
            </a>
        </div>
    </div> 
</div>
