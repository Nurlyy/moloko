<?php

use app\helpers\Url;
use app\helpers\Html;
use yii\widgets\ListView;
use youdate\helpers\Icon;

/** @var $model \app\models\Profile */
/** @var $form \yii\widgets\ActiveForm */
/** @var $this \app\base\View */
/** @var $dataProvider \yii\data\ActiveDataProvider */
/** @var $photoModerationEnabled bool */

$this->title = Yii::t('youdate', 'Photos');
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>
<div class="content-conteaner-setting">
        <p class="h1 photo-h">
            Мои фотографии
        </p>
        <a href="<?= Url::to(['/settings/upload']) ?>" class="btn-addphoto">
            <?= Yii::t('youdate', 'Загрузить фотографии') ?>
        </a>        
</div>
<div class="content-conteaner-setting-photo">
    <?php \yii\widgets\Pjax::begin(['id' => 'pjax-settings-photos', 'linkSelector' => false]) ?>
        <?php if ($dataProvider->getTotalCount() > 0): ?>
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'layout' => '{items} {pager}',
                'itemView' => function (\app\models\Photo $model) use ($photoModerationEnabled) {
                    return $this->render('_photo', [
                        'model' => $model,
                        'photoModerationEnabled' => $photoModerationEnabled,
                    ]);
                },
                'itemOptions' => [
                    'tag' => false,
                ],
            ]) ?>
        <?php else: ?>
            <?= \youdate\widgets\EmptyState::widget([
                'icon' => 'fe fe-image',
                'subTitle' => Yii::t('youdate', 'You have no photos yet'),
            ]) ?>
        <?php endif; ?>
    <?php \yii\widgets\Pjax::end() ?>
</div>