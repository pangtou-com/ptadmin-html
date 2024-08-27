<?php
it('[a标签] 无链接', function () {
    $str = PTAdmin\Html\Html::a("test");

    expect($str)->toBe('<a href="">test</a>');
});

it('[a标签] 有链接', function () {
    $str = PTAdmin\Html\Html::a("test","https://www.baidu.com");

    expect($str)->toBe('<a href="https://www.baidu.com">test</a>');
});

it('[a标签] 有属性', function () {
    $str = PTAdmin\Html\Html::a("test","https://www.baidu.com", ['style' => 'color:red']);

    expect($str)->toBe('<a style="color:red" href="https://www.baidu.com">test</a>');
});

it('[Button] ', function () {
    $str = PTAdmin\Html\Html::button("test");

    expect($str)->toBe('<button type="button">test</button>');
});

it('[Button] style', function () {
    $str = PTAdmin\Html\Html::button("test", ['style' => 'color:red']);
    expect($str)->toBe('<button style="color:red" type="button">test</button>');
});

it('[Submit]', function () {
    $str = PTAdmin\Html\Html::submit("test");
    expect($str)->toBe('<button type="submit">test</button>');
});

it('[Checkbox]', function () {
    $str = PTAdmin\Html\Html::checkbox("test", 'test');
    expect($str)->toBe('<input type="checkbox" name="test" value=""/>test');
});

it('[Checkbox] value', function () {
    $str = PTAdmin\Html\Html::checkbox("test", 'test', false, ['value' => 1]);
    expect($str)->toBe('<input value="1" type="checkbox" name="test"/>test');
});