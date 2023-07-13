<?php

namespace youdate\widgets;

use yii\widgets\Menu;
use yii\helpers\ArrayHelper;
use app\helpers\Html;
use app\helpers\Url;
use youdate\helpers\Icon;

/**
 * @author Alexander Kononenko <contact@hauntd.me>
 * @package youdate\widgets
 */
class Sidebar extends Menu
{
    /**
     * @var string
     */
    public $header;
    /**
     * @var array
     */
    public $headerOptions = ['tag' => 'h3', 'class' => 'page-title mb-5 d-flex justify-content-between align-items-center'];
    /**
     * @var string
     */
    public $countTemplate = '<span class="float-right {span_class}"><span class="badge badge-{countClass} {span_class}">{count}</span></span>';
    /**
     * @var string
     */
    public $linkTemplate = '<a class="link-i {active}" href="{url}">{label} {count}</a>';
    /**
     * @var array
     */
    public $options = [
        'tag' => 'div',
        'class' => 'navi',
    ];
    /**
     * @var array
     */
    public $itemOptions = [
        'tag' => null,
    ];

    /**
     * @return string|void
     */
    public function run()
    {
        if (isset($this->header) && $this->header !== false) {
            $tag = ArrayHelper::remove($this->headerOptions, 'tag');
            $header = $this->header .
                Html::tag('div', '', ['class' => 'd-flex d-lg-none flex-fill sidebar-menu-line']) .
                Html::button(Icon::fe('chevron-down'), [
                    'data-icon-show' => 'fe-chevron-down',
                    'data-icon-hide' => 'fe-chevron-up',
                    'class' => 'btn btn-sm btn-secondary btn-toggle-sidebar float-right d-block d-lg-none',
                ]);
            echo Html::tag($tag, $header, $this->headerOptions);
        }

        parent::run();
    }

    /**
     * @param array $item
     * @return string
     */
    protected function renderItem($item)
    {
        $active = $this->isItemActive($item);
        $count = ArrayHelper::getValue($item, 'count');
        $icon = ArrayHelper::getValue($item, 'icon');
        $span_class = isset($item['span_class']) ? $item['span_class'] : null;

        if (isset($item['url'])) {
            $template = ArrayHelper::getValue($item, 'template', $this->linkTemplate);

            return strtr($template, [
                '{url}' => Html::encode(Url::to($item['url'])),
                '{label}' => $item['label'],
                '{icon}' => $icon,
                '{active}' => $active ? 'active' : '',
                '{count}' => $count ? strtr($this->countTemplate, [
                    '{count}' => $count,
                    '{countClass}' => ($active ? 'primary' : 'secondary'),
                    '{span_class}' => isset($span_class)?$span_class:"span_class",
                ]) : '',
            ]);
        }

        $template = ArrayHelper::getValue($item, 'template', $this->labelTemplate);

        return strtr($template, [
            '{label}' => $item['label'],
            '{icon}' => $icon,
            '{active}' => $active ? 'active' : '',
            '{count}' => $count ? strtr($this->countTemplate, [
                '{count}' => $count,
                '{countClass}' => ($active ? 'primary' : 'secondary'),
            ]) : '',
        ]);
    }


    /**
     * @param array $item
     * @return bool
     */
    public function isItemActive($item)
    {
        if (isset($item['active'])) {
            return $item['active'];
        }

        return parent::isItemActive($item);
    }
}
