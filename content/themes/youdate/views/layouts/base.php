<?php

/* @var $this \app\base\View */
/* @var $content string */

use yii\helpers\Html;
use app\helpers\DarkMode;

\youdate\assets\Asset::register($this);
$bodyClass = isset($this->params['body.cssClass']) ? $this->params['body.cssClass'] : '';
$bodyClass .= ' ' . ($this->params['site.darkMode'] ?? DarkMode::AUTO);
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
    <meta name="msapplication-TileColor" content="#fff">
    <meta name="theme-color" content="#fff">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="description" content="<?= $this->frontendSetting('siteMetaDescription') ?>">
    <meta name="keywords" content="<?= $this->frontendSetting('siteMetaKeywords') ?>">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        var isGuest = <?= (Yii::$app->user->isGuest) ? 'true' : 'false' ?>;
    </script>
    <?= $this->render('//partials/favicon') ?>
    <title><?= Html::encode($this->title) ?></title>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
    <?php $this->customHeaderCode() ?>
</head>

<body>
    <input type="hidden" id="isguestInput" value = "<?= (Yii::$app->user->isGuest) ? 'true' : 'false' ?>">
    <?php $this->beginBody() ?>
    <?= $content ?>
    <?php $this->endBody() ?>
    <?php $this->customFooterCode() ?>
</body>

</html>
<?php $this->endPage() ?>