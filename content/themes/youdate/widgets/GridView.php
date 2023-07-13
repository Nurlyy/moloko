<?php

namespace youdate\widgets;

use yii\helpers\ArrayHelper;

/**
 * @author Alexander Kononenko <contact@hauntd.me>
 * @package youdate\widgets
 */
class GridView extends \yii\grid\GridView
{
    /**
     * @var string
     */
    public $emptyView;
    /**
     * @var array
     */
    public $emptyViewParams = [];

    public function init()
    {
        parent::init();
        $this->pager = ArrayHelper::merge([
            'options' => ['class' => 'pagination-list'],
            'pageCssClass' => 'pagination-item',
            'firstPageCssClass' => 'pagination-item',
            'lastPageCssClass' => 'pagination-item',
            'prevPageCssClass' => 'pagination-item',
            'nextPageCssClass' => 'pagination-item',
            'linkOptions' => [
                'class' => 'pagination-link'
            ],
            'disabledListItemSubTagOptions' => ['tag' => 'a', 'class' => 'pagination-link', 'disabled' => 'disabled'],
        ], $this->pager);
    }

    /**
     * @return string
     */
    public function renderEmpty()
    {
        if (isset($this->emptyView)) {
            return $this->getView()->render($this->emptyView, $this->emptyViewParams);
        }

        return parent::renderEmpty();
    }
}
