<?php

use Hcode\DB\Sql;

require_once("vendor/autoload.php");

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$oSql = new Sql();

	$aResults = $oSql->select("SELECT * from tb_users");

	echo json_encode($aResults);

});

$app->run();

 ?>