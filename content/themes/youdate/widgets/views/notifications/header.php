<?php

use app\helpers\Url;
use youdate\helpers\Icon;

/** @var $items \app\models\Notification[] */
/** @var $hasNewNotifications boolean */

?>
<div class="">
    <a class="btn-navigation-ico natification" data-toggle="dropdown" href="<?= Url::to(['/notifications/index']) ?>">

              <!-- Счётчик количества сообщений/обновлений -->
              <!-- <span class="counter">1</span> -->

        <span class="dot <?= $hasNewNotifications ? '' : 'hidden' ?>"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-ten">
        <?php if (count($items)): ?>
            <?php foreach ($items as $item): ?>
                <?php if ($item->getBaseModel() !== null): ?>
                    <div class="dropdown-item d-flex">
                        <a href="<?= $item->getBaseModel()->getUrl() ?>">
                            <?php if (isset($item->sender)): ?>
                                <span class="avatar mr-3 align-self-center"
                                      style="background-image: url('<?= $item->sender->profile->getAvatarUrl(64, 64) ?>')">
                        </span>
                            <?php endif; ?>
                        </a>
                        <div>
                            <?= $item->getBaseModel()->html() ?>
                            <div class="small text-muted">
                                <?= date('Y-m-d H:i', $item->created_at) ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="dropdown-st text-muted text-center py-2">
                <?= Yii::t('youdate', 'You don\'t have any new notifications') ?>
            </div>
        <?php endif; ?>
        <div class="dropdown-divider"></div>
        <a href="<?= Url::to(['/notifications/index']) ?>"
           class="dropdown-item text-center text-muted-dark">
            <?= Yii::t('youdate', 'View all') ?>
        </a>
    </div>
</div>
