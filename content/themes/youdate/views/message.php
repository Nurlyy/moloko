<?php

use app\helpers\Html;

/** @var $this \app\base\View */

$this->context->layout = 'page-main';
?>
<div class="universal-conteaner">
    <h3 class="universal-conteaner-title">
        <?= Html::encode($title) ?>
    </h3>
    <div>
        <?php foreach (Yii::$app->session->getAllFlashes() as $type => $message): ?>
            <?php if (in_array($type, ['success', 'danger', 'warning', 'info'])): ?>
                <div class="alert alert-<?= $type ?> alert-dismissible">
                    <?= Html::encode($message) ?>
                </div>
            <?php endif ?>
        <?php endforeach ?>
        <div class="universal-conteaner-btn">
            <?= Html::a(Yii::t('youdate', 'Go back'), ['/'], ['class' => 'btn-iii']) ?>
            <?= Html::a(Yii::t('youdate', 'Sign in'), ['/security/login'], ['class' => 'btn-iii login']) ?>
        </div>
    </div>
</div>
