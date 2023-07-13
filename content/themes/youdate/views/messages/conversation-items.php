<?php

use youdate\helpers\Icon;

?>
<div class="conversation-items d-flex">
    <div class="wrapper-items w-100" scroll-glue>
        <div class="items">
            <div ng-cloak ng-repeat="item in messages track by item.id">
                <div class="date-ii" ng-show="{{ checkMessageDatetime(item.datetime) }}">
                    <span>{{ getCurrentDate() }}</span>
                </div>
                <div class="item {{ item.type }} {{ getItemClasses(item) }}"
                     ng-mouseover="onMessageHover(item)"
                     ng-click="toggleMessage(item.id)"
                     scroll-glue-anchor>
                    <!-- <div class="item-body d-flex flex-row align-items-top {{ item.type == 'sent' ? 'flex-row-reverse' : '' }}"> -->
                    <div class="item-body left d-flex flex-row align-items-top">
                        <img src="{{ item.user.avatar }}" alt="" class="avatar-item">

                        <div ng-show="item.text.length > 0" class="{{ item.type == 'sent' ? 'right-dialogue' : 'left-dialogue' }}">
                            {{ (item.text !== 'undefined') ? item.text : '' }}
                        </div>
                        <div class="images">
                            <div class="image" 
                                 ng-repeat="attachment in item.attachments track by attachment.id"
                                 ng-show="attachment.type == 'image'">
                                <a href="{{ attachment.url }}" ng-click="showModal(item.attachments, $index, $event)">
                                    <img ng-src="{{ attachment.thumbnail }}" alt="" class="d-block"  style="border-radius:14px !important;">
                                </a>
                            </div>
                        </div>
                        <small class="time text-gray">{{ getTime(item.datetime) }}</small>
                        <span class="spinner" ng-show="isMessagePending(item)">
                            <?= Icon::fa('spinner', ['class' => 'fa-spin']) ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
