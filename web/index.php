<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$storage = new DUT\Services\SessionStorage();
session_destroy();

$app->get('/', function () {
    return 'Home!';
});

$app->get('/hello', function () {
    return 'Hello!';
});

$app->get('/hello/{name}', function ($name) {
    return 'Hello '. $name;
});

$tab=['Bonjour', 'comment', 'vas', 'tu', '?'];

$app->get('/tableauExo1', function() use ($tab){
	$phrase="";
	foreach($tab as $tableau){
		$phrase = $phrase.$tableau . " ";
	}	
	return $phrase;
});


/*
$app->get('/tableauExo2', function() use ($tab, $storage){
	foreach($tab as $element){
		$storage->addElement($element);
	}
	$html='<ul>';
	foreach($storage->getElements() as $tableau){
		$html .='<li>'.$tableau.'</li>';
	}	
	$html .= '</ul>';
	return $html;
});*/

$app->get('/exo3','DUT\\Controllers\\ItemController::indexAction');
$app['debug']=true;

$app->run();






//C'est pour le mofifier