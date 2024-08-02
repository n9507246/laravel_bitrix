<?php

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Routing\Router;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Middleware\ExampleMiddleware;

$container = new Container;
$events = new Dispatcher($container);
$router = new Router($events, $container);

// Регистрация middleware
$router->aliasMiddleware('example', ExampleMiddleware::class);

// Определение маршрутов
$router->get('/hello', function () {
    return new Response('Hello, world!');
})->middleware('example');

// Пример маршрута с параметром
$router->get('/user/{id}', function ($id) {
    return new Response("User ID: {$id}");
})->middleware('example');

// Обработчик для запуска маршрутов
$request = Request::capture();
$response = $router->dispatch($request);

// Отправка ответа после обработки маршрута
$response->send();
