### 安装
> composer require ptadmin/html -vvv

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
