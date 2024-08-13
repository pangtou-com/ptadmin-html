<?php

declare(strict_types=1);
/**
 * Author: Zane
 * Email: 873934580@qq.com
 * Date: 2022/3/22.
 */

namespace PTAdmin\Html\Components;

use PTAdmin\Html\BaseHtml;
use PTAdmin\Html\IRender;

class Select extends BaseHtml implements IRender
{
    private $selection;
    private $items;

    public function __construct($name, $items = [], $selection = null, $options = [])
    {
        $this->selection = $selection;
        $this->items = $items;
        $options['name'] = $name;
        $this->setOptions($options);
        $this->setName('select');
    }

    public function getContent(): string
    {
        if (\is_string($this->items)) {
            return $this->items;
        }
        $lines = [];
        foreach ($this->items as $key => $value) {
            $attrs = [];
            $attrs['value'] = (string) $key;
            if ($this->selection && (string) $key === (string) $this->selection) {
                $attrs['selected'] = 'selected';
            }
            $lines[] = $this->tag('option', $value, $attrs);
        }

        return implode("\n", $lines);
    }
}
