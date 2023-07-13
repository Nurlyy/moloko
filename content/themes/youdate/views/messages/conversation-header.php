<?php

use youdate\helpers\Icon;

?>
<div class="wrapper-contenaer-conversation-header" ng-cloak>
    <div class="contenaer-conversation-header" ng-show="!selectedMessages.length">
        <a href="{{ currentContact.url }}" class="contenaer-ava-name">
            <div class="conteaner-ava-status">
                <img src="{{ currentContact.avatar }}" alt="" class="ava">
                <span class="contenaer-avatar-status">
                    <span class="avatar-status-online" ng-show="{{ item.contact.online }}"></span>
                </span>
            </div>
            <div class="name">
                {{ currentContact.fullName }}, {{ currentContact.age }}, <span class="location">{{ currentContact.location }}</span><br>
            </div>
        </a>
        <div class="contenaer-dropmenu">
            <a class="dropdownMenuLink" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="burger-ico"></span>
                <span class="burger-ico"></span>
                <span class="burger-ico"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-ii" aria-labelledby="dropdownMenuLink">
                <a class="item-dropdown" href="#" data-toggle="modal" data-target="#conversation-report">
                    <?= Yii::t('youdate', 'Report') ?>
                </a>
                <a class="item-dropdown delete-conversation" href="#"
                   data-title="<?= Yii::t('youdate', 'Delete conversation') ?>"
                   data-confirm-title="<?= Yii::t('youdate', 'Delete this conversation?') ?>"
                   data-confirm-button="<?= Yii::t('youdate', 'Delete') ?>"
                   data-cancel-button="<?= Yii::t('youdate', 'Cancel') ?>"
                   ng-click="deleteConversation()">
                    <?= Yii::t('youdate', 'Delete this conversation') ?>
                </a>
            </div>
        </div>
    </div>
    <div class="conteaner-selected-messages" ng-show="selectedMessages.length">
        <div class="conteaner-counter-deleted">
            <?= Yii::t('youdate', 'Selected messages') ?>: {{ selectedMessages.length }}
        </div>
        <div class="contenaer-delete-btn">
            <button class="delete-btn delete-selected-messages"
                    ng-show="selectedMessages.length"
                    ng-click="deleteSelectedMessages()"
                    data-title="<?= Yii::t('youdate', 'Delete messages') ?>"
                    data-confirm-title="<?= Yii::t('youdate', 'Delete selected messages?') ?>"
                    data-confirm-button="<?= Yii::t('youdate', 'Delete') ?>"
                    data-cancel-button="<?= Yii::t('youdate', 'Cancel') ?>"
                    rel="tooltip"
                    title="<?= Yii::t('youdate', 'Delete') ?>">
                <?= Icon::fe('trash') ?>
            </button>
        </div>
    </div>
</div>