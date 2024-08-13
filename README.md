<p align="center">
    <a href="https://www.pangtou.com"><img src="./public/logo.jpg" style="height: 500px" alt="PTAdmin"></a>
</p>

# ptadmin/html
[![Version](https://img.shields.io/packagist/v/ptadmin/html?label=version)](https://packagist.org/packages/ptadmin/html)
[![Downloads](https://img.shields.io/packagist/dt/ptadmin/html)](https://packagist.org/packages/ptadmin/html)
[![License](https://img.shields.io/packagist/l/ptadmin/html)](https://packagist.org/packages/ptadmin/html)
[![PTAdmin](https://img.shields.io/static/v1?label=Docs&message=PTAdmin&logo=readthedocs)](https://www.pangtou.com)

### 安装
> composer require ptadmin/html

### 使用方式
```php
    use PTAdmin\Html;
    
    # 预设html   
    # 图片渲染
    Html::img($src, $option = []);    
    # a标签生成
    Html::a($text, $url = null, $options = []);
    # label标签生成
    Html::label($content, $options = [], $for = null)   
    # button标签
    Html::button($content = 'Button', $options = [])
    # 提交标签
    Html::submit($content = 'Submit', $options = [])
    # 重置标签
    Html::reset($content = 'Submit', $options = [])
    # 表单数据
    Html::input($type, $name = null, $value = null, $options = [])
    # text输入框
    Html::text($name = null, $value = null, $options = [])
    # 隐藏输入框
    Html::hidden($name = null, $value = null, $options = [])
    # 密码输入框
    Html::password($name = null, $value = null, $options = [])
    # 文件框
    Html::file($name = null, $value = null, $options = [])
    # 多行文本框
    Html::textarea($name = null, $value = null, $options = [])
    # 单选
    Html::radio($name = null, $checked = false, $options = [])
    # 多选
    Html::checkbox($name = null, $checked = false, $options = [])
    # select选择框
    Html::select($name, $items = [], $selection = null, $options = [])   
    # 自定义html    
    Html::tag($name, string $content = '', array $options = [])
```

### License
> MIT
