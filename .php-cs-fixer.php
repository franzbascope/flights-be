<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__.'/app')
;

$config = new PhpCsFixer\Config();
return $config->setRules([
    '@PSR12' => true
])->setFinder($finder);
