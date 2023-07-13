<?php

/** @var $model \app\models\User */

?>
<?php if ($model->isOnline): ?>
    <span class="status-user green" rel="tooltip" title="<?= Yii::t('youdate', 'Online') ?>"></span>
    <span class="status-ttl green"><?= Yii::t('youdate', 'Online') ?></span>
<?php else: ?>
    <span class="status-user gray" rel="tooltip" title="<?= Yii::t('youdate', 'Last online: {date}', ['date' => $model->getLastTimeOnline()]) ?>"></span>
    <span class="status-ttl gray"><?= Yii::t('youdate', 'Last online: {date}', ['date' => $model->getLastTimeOnline()]) ?></span>
<?php endif; ?>
