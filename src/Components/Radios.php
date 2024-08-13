<?php

declare(strict_types=1);
/**
 * Author: Zane
 * Email: 873934580@qq.com
 * Date: 2022/3/24.
 */

namespace PTAdmin\Html\Components;

use PTAdmin\Html\BaseHtml;
use PTAdmin\Html\Html;
use PTAdmin\Html\IRender;

class Radios extends BaseHtml implements IRender
{
    private $item;
    private $checked;

    public function __construct($name, array $item, $checked = '', $options = [])
    {
        $this->setOptions($options);
        $this->setName($name);
        $this->checked = $checked;
        $this->item = $item;
    }

    public function render(): string
    {
        if (!$this->item) {
            return '';
        }
        $view = [];
        foreach ($this->item as $key => $val) {
            $option = array_merge($this->getOptions(), ['value' => $key]);
            $view[] = Html::radio($this->getName(), $val, $this->isChecked($key), $option);
        }

        return implode('', $view);
    }

    private function isChecked($key): bool
    {
        if (!$this->checked) {
            return false;
        }

        return $this->checked === $key;
    }
}
