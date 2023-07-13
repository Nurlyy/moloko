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
$this->title = Yii::t('youdate', 'Buy credits');

?>

<?php $this->beginContent('@theme/views/balance/_layout.php', ['currentBalance' => $currentBalance]) ?>

<div class="services-conteaner">
    <div class="header-servises">
        Пополнить баланс
    </div>
    <div class="conteaner-plans">
        <!-- <h1>Пополнение</h1> -->
        <h2>Укажите сумму пополнения или выбирите ниже из готовых вариантов</h2>
        <div class="conteaner-amount">
            <div class="contenaer-input">
                <input id="amount" type="text" placeholder="Укажите сумму">
                <label for="amount">₽</label>
            </div>
            <div class="bonus-info">
                
            </div>
            <div>
                
            </div>
        </div>
        <p class="hint amount">
            <!-- Минимальная сумма 500 руб. -->
        </p>
        <div class="conteaner-variants-amount">

            <div class="btn_radio">
            	<input id="radio-1" type="radio" name="radio" value="1">
            	<label for="radio-1"  onClick="document.getElementById('amount').value = '500'">1 000 ₽</label>
            </div>

            <div class="btn_radio">
            	<input id="radio-1" type="radio" name="radio" value="1">
            	<label for="radio-1"  onClick="document.getElementById('amount').value = '1000'">1 000 ₽</label>
            </div>

            <div class="btn_radio">
            	<input id="radio-2" type="radio" name="radio" value="2">
            	<label for="radio-2"  onClick="document.getElementById('amount').value = '1800'">1 800 ₽</label>
            </div>

            <div class="btn_radio">
            	<input id="radio-3" type="radio" name="radio" value="3">
            	<label for="radio-3"  onClick="document.getElementById('amount').value = '2500'">2 500 ₽</label>
            </div>

            <div class="btn_radio">
            	<input id="radio-4" type="radio" name="radio" value="4" >
            	<label for="radio-4"  onClick="document.getElementById('amount').value = '4000'">4 000 ₽</label>
            </div>

            <div class="btn_radio">
            	<input id="radio-5" type="radio" name="radio" value="5">
            	<label for="radio-5" onClick="document.getElementById('amount').value = '5500'">5 500 ₽</label>
            </div>

        </div>
        <div>
            <button>Оплатить с карты</button>
            <button>Оплатить с электроных денег</button>
        </div>
    </div>
</div>




<?php $this->endContent() ?>