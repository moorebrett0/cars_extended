<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/car.php";

    //start our session
    session_start();
    if (empty($_SESSION['home'])) {
        $_SESSION['home'] = array();
    };



    $app = new Silex\Application();

    //Set our path to directory views
    $app->register(new Silex\Provider\TwigserviceProvider(), array(
        'twig.path' => __DIR__.'/../views'

    ));

    // Setting the Route
    $app->get("/", function() use ($app) {
        return $app['twig']->render('home.twig', array('home' => Car::getAll()));
    });

    // Buy Page
    $app->get("/buy", function() use ($app) {
        return $app['twig']->render('all_cars.twig', array('all_cars' => Car::getAll()));
    });


    $app->post("/buy", function() use ($app) {
        $car = new Car($_POST['make_model'], $_POST['price'], $_POST['miles']);
        $car->save();

        return $app['twig']->render('buy.twig', array('newcar' => $car));
    });

    $app->post("/delete", function() use ($app) {
        Car::deleteAll();
        return $app['twig']->render('buy.twig');
    });

    // Sell Page
    $app->get("/sell", function() use ($app) {
        return $app['twig']->render('sell.twig', array('sell' => Car::getAll()));
    });

    return $app;

?>
