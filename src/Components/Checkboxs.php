<?php

declare(strict_types=1);
/**
 * Author: Zane
 * Email: 873934580@qq.com
 * Date: 2022/3/24.
 */

namespace Zane\Html\Components;

namespace PTAdmin\Html\Components;

use PTAdmin\Html\BaseHtml;
use PTAdmin\Html\Html;
use PTAdmin\Html\IRender;

class Checkboxs extends BaseHtml implements IRender
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
            $view[] = Html::checkbox($this->getName(), $val, $this->isChecked($key), $option);
        }

        return implode('', $view);
    }

    private function isChecked($key): bool
    {
        if (!$this->checked) {
            return false;
        }
        if (\is_array($this->checked)) {
            return \in_array($key, $this->checked, true);
        }

        return $this->checked === $key;
    }
}
