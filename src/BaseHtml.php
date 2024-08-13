<?php
/**
 * Author: Zane
 * Email: 873934580@qq.com
 * Date: 2023/11/14
 */

namespace PTAdmin\Html;

class BaseHtml
{
    private $options = [];
    private $content = '';
    private $name;

    /**
     * 无结束标签的元素.
     * @var array
     */
    private static $voidElements = [
        'area', 'base', 'br', 'col', 'command', 'embed', 'hr', 'img', 'input', 'keygen',
        'link', 'meta', 'param', 'source', 'track', 'wbr', 'input',
    ];

    /**
     * 设置选择 完全覆盖内容.
     *
     * @param array $options
     *
     * @return $this
     */
    public function setOptions(array $options = []): self
    {
        $this->options = $options;

        return $this;
    }

    /**
     * 使用键值对的方式添加选项，会覆盖已存在的数据.
     *
     * @param $key
     * @param $val
     *
     * @return self
     */
    public function addOption($key, $val): self
    {
        $this->options[$key] = $val;

        return $this;
    }

    /**
     * 设置内容.
     *
     * @param $content
     *
     * @return $this
     */
    public function setContent($content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function render(): string
    {
        if (null === $this->getName() || false === $this->getName()) {
            return $this->getContent();
        }

        return $this->tag($this->getName(), $this->getContent(), $this->getOptions());
    }

    public static function view($name, string $content = '', array $options = []): string
    {
        return (new static())->tag($name, $content, $options);
    }

    /**
     * html生成.
     *
     * @param mixed  $name    标签名称
     * @param string $content 标签内容
     * @param array  $options 参数
     *
     * @return string
     */
    protected function tag($name, string $content = '', array $options = []): string
    {
        $closeTag = '';
        in_array($name, self::$voidElements) && $closeTag = '/';
        $html = "<{$name} ".Attributes::render($options)."{$closeTag}>";

        return '' !== $closeTag ? $html.$content : "{$html} {$content}</{$name}>";
    }

}