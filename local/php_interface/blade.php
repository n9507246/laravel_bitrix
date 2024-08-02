<?php

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\FileViewFinder;
use Illuminate\View\Factory;

$container = new Container;

$container->bindIf('files', function () {
    return new Filesystem;
}, true);

$container->singleton('events', function () {
    return new Dispatcher;
});

$resolver = new EngineResolver;

$resolver->register('blade', function () use ($container) {
    $cachePath = $_SERVER['DOCUMENT_ROOT'] . '/local/cache';
    $blade = new BladeCompiler($container['files'], $cachePath);

    return new CompilerEngine($blade);
});

$container->instance('view.engine.resolver', $resolver);

$container->singleton('view.finder', function () use ($container) {
    $paths = [$_SERVER['DOCUMENT_ROOT'] . '/local/views'];

    return new FileViewFinder($container['files'], $paths);
});

$container->singleton('view', function () use ($container) {
    $resolver = $container['view.engine.resolver'];
    $finder = $container['view.finder'];
    $dispatcher = $container['events'];

    return new Factory($resolver, $finder, $dispatcher);
});

return $container['view'];
