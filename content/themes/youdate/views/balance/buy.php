<?php

use app\helpers\Html;
use app\helpers\Url;
use youdate\helpers\Icon;

/** @var $this \app\base\View */
/** @var $currentBalance integer */
/** @var $stripePublishableKey string */
/** @var $rate string */
/** @var $currency \app\models\Currency */
/** @var $prices \app\models\Price[] */
/** @var $siteName string */
/** @var $userId integer */
/** @var $userEmail string */
/** @var $stripeEnabled boolean */
/** @var $paypalEnabled boolean */
/** @var $robokassaEnabled bool */

$this->registerAssetBundle(youdate\assets\PaymentAsset::class);
$this->title = Yii::t('youdate', 'Пополнить баланс');

?>

<?php $this->beginContent('@theme/views/balance/_layout.php', ['currentBalance' => $currentBalance]) ?>

<div class="content-conteaner-balance">
    <h1 class="h1">Пополнить баланс</h1>
    <p class="podh1">Укажите сумму пополнения в рублях</p>
    <div class="conteaner-amount">
        <div class="contenaer-input">
            <label for="amount">
                <input id="amount" class="inp" type="text" placeholder="Cумма" value="3000">
            </label>
            <div class="conteaner-button">
                <button class="btn card-tick">Пополнить картой</button>
                <button class="btn qiwi">Пополнить QIWI</button>
            </div>
            <!-- Выводим ошибку минимальной суммы -->
            <!-- <p class="error-minsumm">
                Минимальная сумма 10 руб.
            </p> -->
        </div>
    </div>
    <div class="conteaner-subtitle">
        <p class="subtitle">
            Зашифрованное соединение
        </p>
        <p>
            Все транзации и процесс оплаты происходят через зашифрованное соедиенне.
        </p>
    </div>
    <div class="conteaner-subtitle">
        <p class="subtitle">
            Анонимно
        </p>
        <p>
            В выписке по карте и личном кабинете банка Вы не увидите упоминаний об оплате сайта знакомств.
        </p>
    </div>
    <div class="conteaner-subtitle">
        <p class="subtitle">
            Безопасно
        </p>
        <p>
            Банки не передают нам Ваши платёжные данные и данные о Ваших картах. Мы так же не собираем эту информацию. Она нам не доступна
        </p>
    </div>
    <div class="conteaner-subtitle">
        <p class="subtitle">
            Нет повторных и двойных списаний
        </p>
        <p>
            Мы не используем систему автоподписок, подписок, двоных, троных и других списаний.
        </p>
    </div>

    

    
</div>

<?php $this->endContent() ?>