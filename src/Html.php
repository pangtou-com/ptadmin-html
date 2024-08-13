<?php
/**
 * Author: Zane
 * Email: 873934580@qq.com
 * Date: 2023/11/14
 */
namespace PTAdmin\Html;


use PTAdmin\Html\Exception\HtmlException;

/**
 * @method static string a(string $text, $url = null, array $options = [])                            a 标签
 * @method static string button(string $content = 'Button', array $options = [])                      标准按钮
 * @method static string reset(string $content = 'Reset', array $options = [])                        重置按钮
 * @method static string submit(string $content = 'Submit', array $options = [])                      提交按钮
 * @method static string checkbox(string $name, $content, bool $checked = false, array $options = []) 多选
 * @method static string checkboxs(string $name, array $item, $checked = '', array $options = [])     分组多选 checked支持字符串或数组格式
 * @method static string file(string $name, $value = null, array $options = [])                       文件上传
 * @method static string form(string $name, $content, array $options = [])                            form表单
 * @method static string hidden(string $name = null, $value = null, array $options = [])              隐藏域
 * @method static string img(string $src, array $options = [])                                        图片
 * @method static string input(string $name, $type = 'text', $value = null, array $options = [])      文本框
 * @method static string label(string $content, $for = null, array $options = [])                     label
 * @method static string password(string $name, $value = null, array $options = [])                   密码框
 * @method static string select(string $name, $items = [], $selection = null, array $options = [])    下拉选择框
 * @method static string text(string $name, $value = null, array $options = [])                       文本输入框
 * @method static string textarea(string $name, $value = null, array $options = [])                   文本域
 * @method static string radio(string $name, $content, $checked = false, array $options = [])         单选
 * @method static string radios(string $name, array $item, $checked = '', array $options = [])        分组单选
 */
class Html
{
    /**
     * @param mixed $name
     * @param mixed $arguments
     *
     * @throws HtmlException
     */
    public static function __callStatic($name, $arguments): string
    {
        return (new static)->make($name, ...$arguments);
    }

    /**
     * @param mixed $name
     *
     * @throws HtmlException
     */
    private function make($name, ...$args): string
    {
        $className = 'PTAdmin\\Html\\Components\\'.ucfirst($name);
        try {
            $class = (new \ReflectionClass($className))->newInstance(...$args);
        } catch (\ReflectionException $e) {
            throw new HtmlException('Unknown Tag');
        }

        return $class->render();
    }

    public static function tag($name, string $content = '', array $options = []): string
    {
        return BaseHtml::view($name, $content, $options);
    }
}