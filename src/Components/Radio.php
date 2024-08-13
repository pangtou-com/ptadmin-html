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

class Radio extends BaseHtml implements IRender
{
    public function __construct($name, $content, $checked = false, $options = [])
    {
        $options['type'] = 'radio';
        $options['name'] = $name;
        $options['value'] = \array_key_exists('value', $options) ? $options['value'] : '1';
        !isset($options['checked']) && $options['checked'] = (bool) $checked;
        $this->setContent($content);
        $this->setOptions($options);
        $this->setName('input');
    }
}
