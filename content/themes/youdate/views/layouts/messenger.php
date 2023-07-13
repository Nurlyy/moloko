<?php

/* @var $content string */

$pageWrapperClass = $this->params['pageWrapper.cssClass'] ?? '';
?>
<?php $this->beginContent('@theme/views/layouts/base.php'); ?>
<div class="contenaer-messenger">
    <div>
        <?php if (!Yii::$app->user->isGuest): ?>
            <?= $this->render('//navigation/navigation') ?>
        <?php endif; ?>
    </div>
    <div>
        <?= $this->render('//partials/important-messages') ?>
        <?php echo $content ?>
    </div>
</div>
<?php if (!$this->getParam('user.hasPhoto', true)): ?>
    <?= $this->render('//partials/user-without-photo') ?>
<?php endif; ?>
<?php $this->endContent(); ?>