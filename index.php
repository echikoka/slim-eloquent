<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'setting/config.php';

$app->get('/hello/{name}', function (Request $request, Response $response) use ($db) {

    $records = $db->table("tbl_user")->where('firstname', 'like', '%bri%')->get()->toArray();
    $taarifa = $db->table("tbl_user")->where('firstname', 'like', '%bri%')->get()->toJson();
    
    //  var_dump($taarifa);
	return json_encode($records);
});

$app->run();

