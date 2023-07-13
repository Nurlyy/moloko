<?php

use youdate\helpers\Icon;
use youdate\widgets\DirectoryListView;
use app\helpers\Html;

/** @var $dataProvider \yii\data\ActiveDataProvider */
/** @var $type string */
/** @var $this \app\base\View */
/** @var $counters array */
/** @var $likesLocked boolean */

$this->title = Yii::t('youdate', 'Likes');
$this->context->layout = 'page-main';

$this->beginContent('@theme/views/connections/_layout.php', [
    'counters' => $counters,
]);
?>

<?php if ($likesLocked): ?>
<div class="card">
    <div class="card-bg card-bg-purple"></div>
    <div class="card-body d-flex align-items-center">
        <?= Icon::fa('lock', ['class' => 'text-yellow mr-2']) ?>
        <h4 class="text-gray font-weight-normal mb-0"><?= Yii::t('youdate', 'You need premium account to unlock this page') ?></h4>
        <?= Html::a(Yii::t('youdate', 'Premium settings'),
            ['balance/services'],
            ['class' => 'btn btn-primary ml-auto']
        ) ?>
    </div>
</div>v
<?php endif; ?>

<?= DirectoryListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => $likesLocked ? '_item_locked' : '_item',
    'itemOptions' => ['tag' => false],
    'emptyView' => '_empty_likes',
    'emptyViewParams' => [
        'type' => $type,
    ],
]) ?>

<script>
    $(document).ready(function() {
        $.ajax({
            url: appBaseUrl() + "connections/read-all-likes?type=<?=$type?>",
            method: "GET",
            success: function() {
                // span_likes = $(".span_likes");
                if (parseInt($(".span_likes").text()) > 0) {
                    $("#notificationCounter").text(parseInt($("#notificationCounter").text()) - parseInt($(".span_likes").text()));
                    if (parseInt($("#notificationCounter").text()) < 1) {
                        $("#notificationCounter").css('display', 'none');
                    }
                    $(".span_likes").text("");
                    $(".span_likes").css("display", "none !important");
                }
            }
        });
    })
</script> 

<?php $this->endContent() ?>
