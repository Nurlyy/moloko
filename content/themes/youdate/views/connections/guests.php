<?php

use youdate\widgets\DirectoryListView;

/** @var $dataProvider \yii\data\ActiveDataProvider */
/** @var $type string */
/** @var $this \app\base\View */
/** @var $counters array */

$this->title = Yii::t('youdate', 'Guests');
$this->context->layout = 'page-main';

$this->beginContent('@theme/views/connections/_layout.php', [
    'counters' => $counters,
]);

echo DirectoryListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_item_guest',
    'itemOptions' => ['tag' => false],
    'emptyView' => '_empty_guests',
    'emptyViewParams' => [],
]);

?>

<script>
    $(document).ready(function() {
        $.ajax({
            url: appBaseUrl() + '/connections/read-all-guests',
            method: "GET",
            success: function() {
                // span_guests = $(".span_guests");
                if (parseInt($(".span_guests").text()) > 0) {
                    $("#notificationCounter").text(parseInt($("#notificationCounter").text()) - parseInt($(".span_guests").text()));
                    if (parseInt($("#notificationCounter").text()) < 1) {
                        $("#notificationCounter").css('display', 'none');
                    }
                    $(".span_guests").text("");
                    $(".span_guests").css("display", "none !important");
                }
            }
        });
    })
</script>

<?php

$this->endContent();
