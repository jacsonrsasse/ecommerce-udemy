<?php

use Ecommerce\DB\Sql;
use Slim\Slim;
use Ecommerce\Page;

require_once("vendor/autoload.php");

$app = new Slim();

$app->config('debug', true);

$app->get('/', function () {

    $page = new Page();
    $page->setTpl('index');
});

$app->run();
