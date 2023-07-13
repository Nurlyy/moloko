<?php

/** @var string $content */
/** @var \app\base\View $this */
/** @var $user \app\models\User */

$user = Yii::$app->user->identity;
$profile = $user->profile;
?>
<?php $this->beginContent('@app/views/layouts/page-main.php'); ?>

<div class="layout-setting-conteaner">
    <?= \youdate\widgets\Sidebar::widget([
        'items' => [
            [
                'label' => Yii::t('youdate', 'Моя анкета'),
                'url' => ['/settings/profile'],
            ],
            [
                'label' => Yii::t('youdate', 'Мои фотографии'),
                'url' => ['/settings/photos'],
            ],
            [
                'label' => Yii::t('youdate', 'Notifications'),
                'url' => ['/settings/notifications'],
            ],
            [
                'label' => Yii::t('youdate', 'Настройки'),
                'url' => ['/settings/account'],
            ],
            [
                'label' => Yii::t('youdate', 'Черный список'),
                'url' => ['/settings/blocked-users'],
            ],
            [
                'label' => Yii::t('youdate', 'Удаление анкеты'),
                'url' => ['/settings/data'],
            ],
        ],
    ]) ?>
    <div class="content">
        <?= $content ?>
    </div>
</div>
<?php $this->endContent(); ?>
