<?php

/* @var $content string */
/* @var $this \app\base\View */

?>
<?php $this->beginContent('@theme/views/layouts/base.php'); ?>
<div>
    <?= $this->render('//partials/important-messages') ?>
    <div>
        <?php echo $content ?>
    </div>
</div>
<?php if (!$this->getParam('user.hasPhoto', true)): ?>
    <?= $this->render('//partials/user-without-photo') ?>
<?php endif; ?>
<?php $this->endContent(); ?>
