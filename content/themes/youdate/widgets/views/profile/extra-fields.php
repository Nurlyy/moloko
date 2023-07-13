<?php

use app\helpers\Html;
use app\models\ProfileField;
use app\models\ProfileExtra;

/** @var $this \app\base\View */
/** @var $profile \app\models\Profile */
/** @var $blurProfileFields bool */

?>

<?php foreach ($profile->getExtraCategories() as $categoryAlias => $categoryTitle): ?>
    <div class="params-user" data-category="<?= Html::encode($categoryAlias) ?>">
        <?php foreach ($profile->getExtraFields($profile->user_id, $categoryAlias) as $item): ?>
            <div class="items">
                <span class="item-title">
                    <?= Html::encode(Yii::t($item['field']->language_category, $item['field']->title)) ?>:
                </span>
                <span class="item">
                    <?php if ($blurProfileFields == true): ?>
                        <?= Yii::t('youdate', 'Hidden') ?>
                    <?php else: ?>
                        <?php if (isset($item['extra']->value) && $item['extra']->value !== null && $item['extra']->value !== ''): ?>
                            <?= $item['field']->formatValue($item['extra']->value) ?>
                        <?php else: ?>
                            <?= Yii::t('youdate', 'Not set') ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </span>
            </div>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>
