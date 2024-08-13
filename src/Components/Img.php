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

class Img extends BaseHtml implements IRender
{
    public function __construct($src, $options = [])
    {
        $options['src'] = $src;
        $options['alt'] = $options['alt'] ?? '';
        (isset($options['srcset']) && \is_array($options['srcset'])) && $options = $this->setSrcset($options);
        $this->setOptions($options);
        $this->setName('img');
    }

    /**
     * 设置响应式图片.
     *
     * @param $options
     *
     * @return array
     */
    private function setSrcset($options): array
    {
        $srcset = [];
        foreach ($options['srcset'] as $descriptor => $url) {
            $srcset[] = $url.' '.$descriptor;
        }
        $options['srcset'] = implode(',', $srcset);

        return $options;
    }
}
