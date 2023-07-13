<?php

/* @var $content string */

?>
<?php $this->beginContent('@theme/views/layouts/base.php'); ?>
<?= $this->render('//partials/important-messages') ?>

<div class="wrapper-page-mine">
    <div class="conteaner-page-mine">
        <div class="conteaner-page-content">
            <?= $this->render('//navigation/navigation') ?>
            <?php echo $content ?>
        </div>
    </div>
    <div></div>
</div>

<?php if (!$this->getParam('user.hasPhoto', true)): ?>
    <?= $this->render('//partials/user-without-photo') ?>
<?php endif; ?>
<?php $this->endContent(); ?>