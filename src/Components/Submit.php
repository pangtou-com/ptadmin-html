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

class Submit extends BaseHtml implements IRender
{
    public function __construct($content = 'Submit', $options = [])
    {
        $options['type'] = 'submit';
        $this->setContent($content);
        $this->setOptions($options);
        $this->setName('button');
    }
}
