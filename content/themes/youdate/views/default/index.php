<?php

use app\helpers\Html;
use app\base\View;
use youdate\widgets\ActiveForm;
use youdate\helpers\HtmlHelper;
use youdate\widgets\Connect;

/** @var $this \app\base\View */
/** @var $sexModels \app\models\Sex[] */
/** @var $registrationForm \app\forms\RegistrationForm */

$this->title = Html::encode($this->themeSetting('homepageTitle'));
$this->context->layout = 'page-main';
$flash = $this->session->getFlash('info', false);
if ($flash) {
    $this->registerJs(sprintf('Messenger().post("%s")', $this->session->getFlash('info')), View::POS_READY);
}
$this->registerJsFile('@themeUrl/static/js/landing.js', ['depends' => \youdate\assets\Asset::class]);
?>

<div class="conteaner-list-item">
    <div class="conteaner-item">1</div>
    <div class="conteaner-item">2</div>
    <div class="conteaner-item">3</div>
    <div class="conteaner-item">4</div>
    <div class="conteaner-item">5</div>
    <div class="conteaner-item">6</div>
    <div class="conteaner-item">7</div>
    <div class="conteaner-item">8</div>
    <div class="conteaner-item">9</div>
    <div class="conteaner-item">10</div>
    <div class="conteaner-item">11</div>
    <div class="conteaner-item">12</div>
    <div class="conteaner-item">13</div>
    <div class="conteaner-item">14</div>
    <div class="conteaner-item">15</div>
    <div class="conteaner-item">16</div>
    <div class="conteaner-item">17</div>
    <div class="conteaner-item">18</div>
    <div class="conteaner-item">19</div>
</div>