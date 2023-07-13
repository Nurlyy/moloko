<?php

use app\models\BalanceTransaction;
use youdate\helpers\HtmlHelper;
use youdate\widgets\GridView;

/** @var $dataProvider \yii\data\ActiveDataProvider */
/** @var $this \app\base\View */
/** @var $currentBalance integer */

$this->title = Yii::t('youdate', 'История операций');
?>

<?php $this->beginContent('@theme/views/balance/_layout.php', [
    'currentBalance' => $currentBalance,
    'showAddButton' => true,
]) ?>

<div class="services-conteaner">
    <div class="header-servises">
        История операций
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'emptyView' => '_empty',
        'showHeader' => false,
        'layout' => '{items}<div class="wrapper-pagintaion pd15">{pager}</div>',
        'options' => ['tag' => false],
        'tableOptions' => ['class' => 'table-options'],
        'columns' => [
            'transactionType' => [
                'format' => 'raw',
                'value' => function (BalanceTransaction $model) {
                    return HtmlHelper::transactionIcon($model->getTransactionInfo());
                }
            ],
            'transactionTitle' => [
                'format' => 'raw',
                // 'contentOptions' => ['class' => 'expand'],
                'value' => function(BalanceTransaction $model) {
                    $info = $model->getTransactionInfo();
                    if ($info) {
                        return $info->getTitle();
                    } else {
                        return 'unknown';
                    }
                }
            ],
            'transactionAmount' => [
                'format' => 'raw',
                'attribute' => 'amount',
                // 'contentOptions' => ['class' => 'text-right'],
                'value' => function (BalanceTransaction $model) {
                    if ($model->amount > 0) {
                        return sprintf("<span class=\"transaction-add\">%+d %s</span>",
                            $model->amount,
                            Yii::t('youdate', 'руб.')
                        );
                    } elseif ($model->amount < 0) {
                        return sprintf("<span class=\"transaction-remove\">%+d %s</span>",
                            $model->amount,
                            Yii::t('youdate', 'руб.')
                        );
                    } else {
                        return sprintf("<span class=\"transaction-free\">%s</span>",
                            Yii::t('youdate', 'Бесплатно')
                        );
                    }
                }
            ],
            'transactionService' => [
                'format' => 'raw',
                // 'contentOptions' => ['class' => 'text-right'],
                'value' => function (BalanceTransaction $model) {
                    $info = $model->getTransactionInfo();
                    if ($info && $info->getServiceName()) {
                        return '<i class="payment payment-' . $info->getServiceName() . '"></i>';
                    } else {
                        return '';
                    }
                }
            ],
            'transactionDate' => [
                'attribute' => 'created_at',
                'format' => 'datetime',
                'contentOptions' => ['class' => 'text-muted text-center shrink'],
            ],
        ]
    ]) ?>
</div>

<?php $this->endContent() ?> 