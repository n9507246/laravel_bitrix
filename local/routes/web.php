<?php
use Bitrix\Main\Routing\RoutingConfigurator;
return function (RoutingConfigurator $routes) {
    
    
    $routes->get('/xxx', function () {
        global $USER;
        if ($USER->IsAuthorized()) {
            return  view('example', ['name' => 'Bitrix']);
        } 
        header("Location: /");
        exit();
    });
};