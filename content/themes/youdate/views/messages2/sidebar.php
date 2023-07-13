<?php

use youdate\helpers\Icon;

?>
<div class="header-search-input">
    <input type="text" class="search-input"
       ng-model="conversationsQuery"
       ng-change="getConversations()"
       ng-model-options="{debounce: 750}"
       ng-bind="conversationsQuery"
       placeholder="<?= Yii::t('youdate', 'Search contact') ?>">
</div>
<div class="contenaer-list-gr">
    <div class="list-group-item-contenaer" ng-show="hasContacts()">
        <div lazy-img-container>
            <a href="#"
               ng-cloak ng-repeat="(key, item) in conversations track by item.uid"
               ng-click="setCurrentContactId(item.contact.id, key)"
               class="conversation list-group-item list-group-item-action flex-column align-items-start
                {{item.contact.premium != false ? 'premium ' : ''}}
                {{item.contact.id == currentContactId ? '' : ''}}">
                <span class="conteaner-contact-avatar">
                    <img src="{{ item.contact.avatar }}" alt="" class="contact-avatar-user">
                    <span class="contenaer-avatar-status">
                        <span class="avatar-status-online" ng-show="{{ item.contact.online }}"></span>
                    </span>
                </span>
                <span class="conteaner-contact-name">
                    <span class="name">
                        {{ item.contact.full_name }}
                    </span>
                    <span class="last-message">
                        {{ item.last_message.text }}
                    </span>
                    <span ng-show="newMessagesCounters[item.contact.id]">
                        <span class="new-counters-messages">
                            {{ newMessagesCounters[item.contact.id].new_messages_count }}
                        </span>
                    </span>
                </span>
                <!-- <div class="d-flex w-100 justify-content-start align-content-center">
                    <div class="pr-3 align-self-center">
                        <img src="{{ item.contact.avatar }}" alt="" style="width:40px; height:40px; border-radius:50%;">
                         <div class="avatar" ng-style="{'background-image': 'url(' + item.contact.avatar + ')'}">
                            <span class="avatar-status bg-green" ng-show="{{ item.contact.online }}"></span>
                        </div>
                    </div>
                    <div class="align-self-center">
                        <h5 class="name mb-1">{{ item.contact.full_name }}</h5>
                        <small class="message">{{ item.last_message.text }}</small>
                    </div>
                    <div class="align-self-center ml-auto" ng-show="newMessagesCounters[item.contact.id]">
                        <span class="badge badge-success badge-pill mr-auto">{{ newMessagesCounters[item.contact.id].new_messages_count }}</span>
                    </div>
                </div> -->
    
    
            </a>
        </div>
    </div>
</div>

<div class="no-conversations-found" ng-show="conversationsQuery.length > 0 && !hasContacts()">
    <div class="text-muted text-center p-2">
        <?= Yii::t('youdate', 'Conversations not found') ?>
    </div>
</div>
