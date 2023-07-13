<?php

/* @var $this \app\base\View */
/* @var $content string */

use yii\helpers\Html;

\youdate\assets\Asset::register($this);
$rtlEnabled = isset($this->params['rtlEnabled']) && $this->params['rtlEnabled'];
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" dir="<?= $rtlEnabled ? 'rtl' : 'ltr' ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="baseUrl" content="<?= \app\helpers\Url::to(['/'], true) ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="description" content="<?= $this->frontendSetting('siteMetaDescription') ?>">
    <meta name="keywords" content="<?= $this->frontendSetting('siteMetaKeywords') ?>">
    <?= $this->render('//partials/favicon') ?>
    <title><?= Html::encode($this->title) ?></title>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div>
    <?php echo $content ?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
