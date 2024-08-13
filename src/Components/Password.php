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

class Password extends BaseHtml implements IRender
{
    public function __construct($name = null, $value = null, $options = [])
    {
        $options['name'] = $name;
        $options['type'] = 'password';
        $options['value'] = null === $value ? null : (string) $value;
        $this->setOptions($options);
        $this->setName('input');
    }
}
