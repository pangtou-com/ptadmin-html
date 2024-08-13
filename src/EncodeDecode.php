<?php
/**
 * Author: Zane
 * Email: 873934580@qq.com
 * Date: 2023/11/14
 */

namespace PTAdmin\Html;

class EncodeDecode
{
    private static $encoding = 'UTF-8';
    
    /**
     * 编码
     *
     * @param $val
     *
     * @return string
     */
    public static function encode($val): string
    {
        if (null === $val || '' === $val || !\is_string($val)) {
            return (string) $val;
        }
        
        return htmlspecialchars($val, ENT_QUOTES | ENT_HTML5, static::$encoding);
    }
    
    /**
     * 解码
     *
     * @param $content
     *
     * @return string
     */
    public static function decode($content): string
    {
        if (null === $content || '' === $content || !\is_string($content)) {
            return (string) $content;
        }
        
        return htmlspecialchars_decode($content, ENT_QUOTES | ENT_HTML5);
    }
}