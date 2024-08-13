<?php
/**
 * Author: Zane
 * Email: 873934580@qq.com
 * Date: 2023/11/14
 */

namespace PTAdmin\Html;


class Attributes
{
    /**
     * 这里的参数可以渲染为类似
     * data-id=1,data-name=2. 格式.
     *
     * @var string[]
     */
    private $dataAttributes = ['data', 'data-ng', 'ng'];

    /**
     * 标签排序.
     *
     * @var string[]
     */
    private $attributeOrder = [
        'type', 'id', 'class', 'name', 'value',
        'href', 'src', 'srcset', 'form', 'action', 'method',
        'selected', 'checked', 'readonly', 'disabled', 'multiple',
        'size', 'maxlength', 'width', 'height', 'rows', 'cols',
        'alt', 'title', 'rel', 'media',
    ];

    private $attributes;
    private $content = [];

    private function __construct($attributes)
    {
        $this->attributes = $attributes;
    }

    public static function render(array $attributes): string
    {
        if (!$attributes) {
            return '';
        }
        $render = new static($attributes);

        return $render->order()->action()->getContent();
    }

    /**
     * 返回渲染后的内容.
     *
     * @return string
     */
    private function getContent(): string
    {
        return implode(' ', $this->content);
    }

    /**
     * 执行渲染.
     */
    private function action(): self
    {
        foreach ($this->attributes as $name => $val) {
            if (null === $val) {
                continue;
            }
            if ($this->boolRender($val, $name)) {
                continue;
            }
            if ($this->arrayRender($val, $name)) {
                continue;
            }
            $this->content[] = "{$name}=\"".EncodeDecode::decode($val).'"';
        }

        return $this;
    }

    /**
     * 数组渲染.
     *
     * @param $attributes
     * @param $name
     *
     * @return bool
     */
    private function arrayRender($attributes, $name): bool
    {
        if (!\is_array($attributes)) {
            return false;
        }
        if ('class' === $name) {
            $this->content[] = "{$name}=\"".EncodeDecode::encode(implode(' ', $attributes)).'"';

            return true;
        }
        if ('style' === $name) {
            $this->content[] = "{$name}=\"".EncodeDecode::encode(CssFormat::render($attributes)).'"';

            return true;
        }
        if (\in_array($name, $this->dataAttributes, true)) {
            $this->dataArrayRender($attributes, $name);

            return true;
        }
        $this->content[] = "{$name}=\"".@json_encode($attributes).'"';

        return true;
    }

    /**
     * 数据格式渲染.
     *
     * @param array $attributes
     * @param $name
     */
    private function dataArrayRender(array $attributes, $name): void
    {
        foreach ($attributes as $key => $val) {
            if (\is_bool($val)) {
                $this->content[] = "{$name}-{$key}";

                continue;
            }
            $val = \is_array($val) ? json_encode($val) : EncodeDecode::encode($val);
            $this->content[] = "{$name}-{$key}=\"".$val.'"';
        }
    }

    /**
     * 布尔属性渲染. 属性值为false的情况下 不做处理.
     *
     * @param mixed $val
     * @param $name
     * @return bool
     */
    private function boolRender($val, $name): bool
    {
        if (!\is_bool($val)) {
            return false;
        }
        if ($val) {
            $this->content[] = "{$name}";
        }

        return true;
    }

    /**
     * 属性排序输出.
     */
    private function order(): self
    {
        if (\count($this->attributes) > 1) {
            $sorted = [];
            foreach ($this->attributeOrder as $name) {
                if (isset($this->attributeOrder[$name])) {
                    $sorted[$name] = $this->attributes[$name];
                }
            }
            $this->attributes = array_merge($sorted, $this->attributes);
        }

        return $this;
    }
}