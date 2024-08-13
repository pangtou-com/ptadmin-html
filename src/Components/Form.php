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

class Form extends BaseHtml implements IRender
{
    public function __construct($name, $content, $options = [])
    {
        $options['id'] = $name;
        $options['name'] = $name;
        $this->setContent($content);
        $this->setOptions($options);
        $this->setName('form');
    }
}
