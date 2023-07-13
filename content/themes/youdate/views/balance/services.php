<?php

use app\helpers\Html;
use youdate\helpers\Icon;

/** @var $dataProvider \yii\data\ActiveDataProvider */
/** @var $this \app\base\View */
/** @var $currentBalance integer */
/** @var $userPremium \app\models\UserPremium */
/** @var $userBoost \app\models\UserBoost */
/** @var $boostPrice integer */
/** @var $boostDuration integer */
/** @var $alreadyBoosted bool */
/** @var $premiumPrice integer */
/** @var $premiumDuration integer */
/** @var $premiumSettings \app\forms\PremiumSettingsForm */

$this->title = Yii::t('youdate', 'Сервисы и услуги');
?>

<?php $this->beginContent('@theme/views/balance/_layout.php', [
    'currentBalance' => $currentBalance,
    'showAddButton' => true,
]) ?>

<div class="content-conteaner-balance otst-1">
    <p class="h1 photo-h">
        Сервисы и услуги
    </p>
    <p class="podh1">
        Без премиум-аккаунта вы не сможете начать общение с новыми девушками и контактная информация на вашей странице будет скрыта.
    </p>
    <br/><br/>
</div>

<?php if ($message = Yii::$app->session->getFlash('user-premium')): ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"></button>
            <?= Html::encode($message) ?>
    </div>
<?php endif; ?>

<div class="wrapper-services-panel">
    <div class="services-panel premium">
        <div class="header-services-panel" style="color:#000 !important;">
            <?php if ($userPremium && $userPremium->isPremium): ?>
                <p class="status-premium active-premium">
                    <?= Yii::t('youdate', 'Активирован до:') ?>
                    <?=  Yii::$app->formatter->asDate($userPremium->premium_until) ?>
                </p>
            <?php else: ?>
                <p class="status-premium no-active-premium">
                    Не активирован
                </p>
            <?php endif; ?>
            <p class="h1">
                Premium-Аккаунт
            </p>
            <p class="hint-info">
                Премиум аккаунт даёт возможность без ограничений общаять с любым количеством пользователей. Отвечать на любые сообщения и писать, лайкать и обмениваться контактами.
            </p>
            <div class="premium-price">
                <?php if ($userPremium && $userPremium->isPremium): ?>
                <?php else: ?>
                    <?= Yii::t('youdate', '{credits} руб. на {days} дней', [
                            'credits' => '<strong>' . $premiumPrice . '</strong>',
                            'days' => '<strong>' . $premiumDuration . '</strong>',
                        ]) ?>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($userPremium && $userPremium->isPremium): ?>
            <?= $this->render('_premium_settings', ['premiumSettings' => $premiumSettings]) ?>
        <?php else: ?>
            <?= $this->render('_premium_about') ?>
        <?php endif; ?>
        <?php $form = \youdate\widgets\ActiveForm::begin(['action' => ['activate-premium'], 'method' => 'post']) ?>
            <?php if ($userPremium && $userPremium->isPremium): ?>

            <?php else: ?>
                <div class="conteaner-btn-activate">
                    <?= Html::button(Icon::fa('check-circle', ['class' => '']) .
                        Yii::t('youdate', 'Активировать'), [
                        'class' => 'btn-activate',
                        'type' => 'submit',
                    ]) ?>
                </div>
            <?php endif; ?>
        <?php \youdate\widgets\ActiveForm::end() ?>
    </div>
</div>
<?php $this->endContent() ?> 




<!-- 

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="services-conteaner">

    <div>
        <div class="wrapper-services-panel">
            
            <div class="services-panel">
                <div class="header-services-panel">
                    <p class="h1">Выделить анкету</p>
                    <div class="premium-price">
                        400 руб. на 7 дней
                    </div>
                </div>
               
            </div>
            <div class="services-panel">
                <div class="header-services-panel">
                    <p class="h1">Поднять анкету</p>
                    <div class="premium-price">
                        200 руб. одно поднятие
                    </div>
                </div>
                <br><br><br><br><br><br><br><br>
            </div>
        </div>
    </div>
</div>
  -->
 <!-- <div class="services-panel">
            <div class="premium">
                <?php $form = \youdate\widgets\ActiveForm::begin(['action' => ['activate-premium'], 'method' => 'post']) ?>
                    <div class="contenaer-header-premium">
                        <div class="header-premium">
                            PREMIUM-аккаунт
                        </div>
                        <div class="status-premium">
                            <?php if ($userPremium && $userPremium->isPremium): ?>
                                <?= Yii::t('youdate', 'Premium features active until') ?>
                                &mdash;
                                <span class="text-muted"><?=  Yii::$app->formatter->asDate($userPremium->premium_until) ?></span>
                            <?php else: ?>
                                <span class="no-active-premium">
                                    Не активирован
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="premium-price">
                            <?= Yii::t('youdate', '{credits} руб. на {days} дней', [
                                'credits' => '<strong>' . $premiumPrice . '</strong>',
                                'days' => '<strong>' . $premiumDuration . '</strong>',
                            ]) ?>
                        </div>
                    </div>
                    <div class="premium-info">
                        
                    </div>
                    <div class="activate">
                        <?php if ($userPremium && $userPremium->isPremium): ?>
                            <button class="btn btn-outline-secondary btn-disabled" disabled="disabled">
                                <?= Icon::fa('check-circle', ['class' => '']) ?>
                                <?= Yii::t('youdate', 'Activated') ?>
                            </button>
                        <?php else: ?>
                            <?= Html::button(Icon::fa('check-circle', ['class' => '']) .
                                Yii::t('youdate', 'Активировать'), [
                                'class' => 'btn-activate',
                                'type' => 'submit',
                            ]) ?>
                        <?php endif; ?>
                    </div>
                <?php \youdate\widgets\ActiveForm::end() ?>
            </div>
            <div class="conteaner-top-illumination">
                <div class="top-illumination">
                    Поднятие анкеты
                </div>
                <div class="top-illumination">
                    Сделать заметнее
                </div>
            </div>
        </div> -->
        
<!--       
<div class="">
    <div class="card-header">
        <h3 class="card-title">
            <a name="premium"><?= Yii::t('youdate', 'Premium account') ?></a>
        </h3>
    </div>
    <div class="card-body">
        <?php if ($message = Yii::$app->session->getFlash('user-premium')): ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"></button>
                <?= Html::encode($message) ?>
            </div>
        <?php endif; ?>
        



        

                <div class="feature-title">
                    
                    <div class="feature-price text-center text-sm-left">
                        
                    </div>
                </div>
                <div class="feature-status ml-0 mt-2 ml-sm-auto mt-sm-0">
                    
                </div>
            </div>
 
        
    </div>
</div> -->

<!-- <div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <a name="rise-up"><?= Yii::t('youdate', 'Rise up in search') ?></a>
        </h3>
    </div>
    <div class="card-body">
        <?php if ($message = Yii::$app->session->getFlash('user-boost')): ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"></button>
                <?= Html::encode($message) ?>
            </div>
        <?php endif; ?>
        <?php $form = \youdate\widgets\ActiveForm::begin(['action' => ['rise-up'], 'method' => 'post']) ?>
        <div class="feature d-flex flex-column align-items-center flex-sm-row">
            <div class="feature-icon bg-green d-flex justify-content-center align-items-center mr-3 mb-4 mb-sm-0">
                <?= Icon::fa('arrow-up') ?>
            </div>
            <div class="feature-title text-center text-sm-left">
                <?php if ($userBoost == null): ?>
                    <?= Yii::t('youdate', 'You have no active rises in search at the moment') ?>
                <?php else: ?>
                    <?= Yii::t('youdate', 'Your profile was raised up until {date}', [
                        'date' => ' &mdash; <span class="text-muted">' . Yii::$app->formatter->asDate($userBoost->boosted_until) . '</span>',
                    ]) ?>
                <?php endif; ?>
                <div class="feature-price">
                    <?= Yii::t('youdate', '{credits} credits for {days} days', [
                        'credits' => '<strong>' . $boostPrice . '</strong>',
                        'days' => '<strong>' . $boostDuration . '</strong>',
                    ]) ?>
                </div>
            </div>
            <div class="feature-status ml-0 mt-2 ml-sm-auto mt-sm-0">
                <?php if ($alreadyBoosted && $userPremium == null): ?>
                    <?= Html::button(Icon::fa('arrow-up', ['class' => 'mr-2']) . Yii::t('youdate', 'Already raised'), [
                        'class' => 'btn btn-outline-secondary btn-disabled btn-md d-block d-sm-inline-block',
                        'type' => 'button',
                        'disabled' => 'disabled',
                    ]) ?>
                <?php else: ?>
                    <?= Html::button(Icon::fa('arrow-up', ['class' => 'mr-2']) . Yii::t('youdate', 'Rise up now'), [
                        'class' => 'btn btn-primary btn-md d-block d-sm-inline-block',
                        'type' => 'submit',
                    ]) ?>
                <?php endif; ?>
            </div>
        </div>
        <?php \youdate\widgets\ActiveForm::end() ?>
    </div>
</div>  -->
