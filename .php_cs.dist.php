<?php
$header = <<<EOF
This file is part of the Zane/Weather.

(c) 方伟 <873934580@qq.com>

This source file is subject to the MIT license that is bundled.
EOF;

$rules = [
    '@Symfony' => true,
    'header_comment' => array('header' => $header),
    'array_syntax' => array('syntax' => 'short'),
    'ordered_imports' => true,
    'no_useless_else' => true,
    'no_useless_return' => true,
    'php_unit_construct' => true,
    'php_unit_strict' => true,
];

$finder = PhpCsFixer\Finder::create()
    ->files()
    ->name('*.php')
    ->exclude('vendor') //排除
    ->exclude('tests') // 排除
    ->in(__DIR__)
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

$config = new PhpCsFixer\Config();
$config->setRiskyAllowed(true)
    ->setRules($rules)
    ->setFinder($finder);

return $config;