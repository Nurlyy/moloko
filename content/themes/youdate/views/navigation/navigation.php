<?php

use yii\helpers\Html;
use app\helpers\Url;
use yii\helpers\ArrayHelper;
use youdate\widgets\HeaderNavigation;


$countersMessagesNew = ArrayHelper::getValue($this->params, 'counters.messages.new');
// var_dump($countersMessagesNew);exit;
$groupsEnabled = ArrayHelper::getValue($this->params, 'site.groups.enabled', true);
/** @var $this \app\base\View */

?>
<div class="conteaner-navigation">
    <div class="navigation">
        <?php if (!Yii::$app->user->isGuest) : ?>
            <div class="conteaner-logotip">
                <a class="logotip" href="/">
                    <img src="/content/themes/youdate/static/images/logotip.svg" alt="">
                </a>
            </div>
            <a class="link-no-auth magazine" href="">Журнал</a>

            <div class="user-nav">
                <?= \youdate\widgets\UserMenu::widget([
                    'showBalance' => ArrayHelper::getValue($this->params, 'site.premiumFeatures.enabled'),
                ]) ?>
                <a href="/connections/guests" class="btn-navigation-ico guest">
                    <span id="notificationCounter" class="counter" style="display:none"></span>
                </a>
                <a href="/messages/index" class="btn-navigation-ico comments">
                    <span id="counterMessage" style="display:none;" class="counter"></span>
                </a>
                <a href="/profile" class="btn-navigation-ico my-drop">
                </a>
                <a href="/" class="btn-navigation-ico search">
                    Искать девушку
                </a>

            </div>
        <?php else : ?>
            <div class="burger-menu">
                <div class="conteaner-ico-burdermenu noactive" id="example_2_2" onclick=" document.getElementById('example_2').style.display='block'; document.getElementById('example_2_2').style.display='none'; document.getElementById('example_2_1').style.display='block';">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
                <div id="example_2" class="nav">
                    <div class="header-nav">
                        <div class="conteaner-ico-burdermenu active" id="example_2_1" onclick="document.getElementById('example_2').style.display='none'; document.getElementById('example_2_1').style.display='none'; document.getElementById('example_2_2').style.display='block';" style="display:none;">
                            <div class="bar1-active"></div>
                            <div class="bar2-active"></div>
                        </div>
                        <div class="conteaner-logotip">
                            <a class="logotip" href="/">
                                <img src="/content/themes/youdate/static/images/logotip.svg" alt="">
                            </a>
                        </div>
                    </div>
                    <nav>
                        <ul>
                            <li><a href="/">Найти Девушку</a></li>
                            <li><a href="/">Найти Мужчину</a></li>
                            <li><a href="/">Добавить свою страницу</a></li>
                            <li><a href="/">Журнал / Блог</a></li>
                            <li>
                                <hr>
                            </li>
                            <li><a href="/">Войти</a></li>
                            <li><a href="/">Регистрация</a></li>
                            <li>
                                <hr>
                            </li>
                            <li><a href="/">Свяжитесь с нами</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="conteaner-logotip">
                <a class="logotip" href="/">
                    <img src="/content/themes/youdate/static/images/logotip.svg" alt="">
                </a>
            </div>
            <a class="link-no-auth magazine" href="">Журнал</a>
            <a class="link-no-auth signup" href="/signup">Регистрация</a>
            <a class="link-no-auth login" href="/login">Войти</a>
            <div class="conteaner-search-nav">
                <div class="switch-btn">
                    <a class="active" href="/">Найти девушку</a>
                    <a data-toggle="modal" data-target="#modal-search3">Ищу мужчину</a>
                </div>
                <a class="search-options-ico" data-toggle="modal" data-target="#modal-search2">
                    <img src="/content/themes/youdate/static/images/bell2.svg" alt="">
                    <span class="counter">1</span>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>