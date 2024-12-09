<?php

use App\Controllers\HomeController;
use App\View;

test('HomeController', function () {
    // Create an instance of the HomeController
    $controller = new HomeController;

    // Call the index method
    $response = $controller->index();
    $expect = View::make('index');

    // Check if the response is the expected view
    $this->assertEquals($response, $expect);
});
