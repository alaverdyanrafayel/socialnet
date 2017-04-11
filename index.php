<?php

session_start();

spl_autoload_register(function ($name){
	
    include str_replace('_', '/', $name).'.php';
	
});

$url = substr($_SERVER['REQUEST_URI'], 1 );
$url = explode('/', $url);


new system_routes($url);
