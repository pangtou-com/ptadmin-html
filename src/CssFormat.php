<?php
/**
 * Author: Zane
 * Email: 873934580@qq.com
 * Date: 2023/11/14
 */

namespace PTAdmin\Html;

class CssFormat
{
    public static function render(array $attribute): ?string
    {
        $result = '';
        foreach ($attribute as $name => $value) {
            $result .= "{$name}: {$value}; ";
        }
        
        return '' === $result ? null : rtrim($result);
    }
}