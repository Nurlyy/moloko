<?php

namespace youdate\widgets;

/**
 * @author Alexander Kononenko <contact@hauntd.me>
 * @package youdate\widgets
 */
class DirectoryListView extends ListView
{
    public function init()
    {
        parent::init();
        $this->layout = '<div class="conteaner-list-item">{items}</div><div><div class="wrapper-pagintaion">{pager}</div></div>';
    }
}
