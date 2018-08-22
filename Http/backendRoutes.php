<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->get('/', ['as' => 'employeeDemo.index', 'uses' => 'DashboardController@index']);

$router->group(['prefix' => '/employee_demo'], function (Router $router) {
    $router->post('grid', ['as' => 'employeeDemo.grid.save', 'uses' => 'DashboardController@save']);
    $router->get('grid', ['as' => 'employeeDemo.grid.reset', 'uses' => 'DashboardController@reset']);
});
