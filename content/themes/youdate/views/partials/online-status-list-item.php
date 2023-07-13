<?php

/** @var $model \app\models\User */

?>
<?php if ($model->isOnline): ?>
    <span class="online-status-list-item green" rel="tooltip"
       title="<?= Yii::t('youdate', 'Online') ?>">
    </span>
<?php else: ?>
    <span class="online-status-list-item gray" rel="tooltip"
       title="<?= Yii::t('youdate', 'Last online: {date}', ['date' => $model->getLastTimeOnline()]) ?>">
    </span>
<?php endif; ?>
