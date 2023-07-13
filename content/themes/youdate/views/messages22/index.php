<?php

use app\helpers\Html;
use app\models\Profile;

/* @var $this \app\base\View */
/* @var $user \app\models\User */
/* @var $profile \app\models\Profile */

$this->title = Yii::t('youdate', 'Messages');
$this->context->layout = 'messenger';
$this->params['body.cssClass'] = 'body-messages';
$this->params['pageWrapper.cssClass'] = 'd-flex min-h-100';
$this->params['footer.cssClass'] = 'footer d-none d-sm-block';
\youdate\assets\MessagesAsset::register($this);
?>
<div class="messenger" ng-app="youdateMessages"
     data-user-id="<?= Yii::$app->user->id ?>"
     data-user-avatar="<?= Html::encode($profile->getAvatarUrl(Profile::AVATAR_SMALL, Profile::AVATAR_SMALL)) ?>"
     data-user-fullname="<?= Html::encode($profile->getDisplayName()) ?>">
    <div ng-controller="MessagesController as Messages" class="h-100">

        <?= $this->render('loader') ?>
        <?= $this->render('empty') ?>

        <div class="row no-gutters h-100 w-100 ng-hide messenger-col" ng-hide="!hasContacts() && !conversationsQuery.length">
            <div class="col-md-4 col-lg-4 d-flex flex-column col-messages-conversations sidebar-ii">
                <?= $this->render('sidebar') ?>
            </div>
            <div class="col-md-8 col-lg-8 col-messages-conversation">
                <div class="messages-conversation d-flex flex-column" ng-hide="currentContactBanned">
                    <?= $this->render('conversation-header') ?>
                    <?= $this->render('conversation-items') ?>
                    <?= $this->render('conversation-input') ?>
                </div>
                <?= $this->render('conversation-report') ?>
                <?= $this->render('conversation-banned') ?>
                <?= $this->render('gallery') ?>
            </div>
        </div>
    </div>
</div>
