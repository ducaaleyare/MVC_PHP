<?php

use App\Controllers\HomeController;
use App\View;

test('HomeController', function () {

    $controller = new HomeController;

    $response = $controller->index();

    $expect = View::make('index');


    $this->assertEquals($response, $expect);
});
