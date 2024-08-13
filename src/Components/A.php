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

class A extends BaseHtml implements IRender
{
    public function __construct($text, $url, $options = [])
    {
        $options['href'] = $url;
        $this->setOptions($options);
        $this->setName('a');
        $this->setContent($text);
    }
}
