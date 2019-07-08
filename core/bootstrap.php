<?php

use App\Core\App;

App::bind('config', require 'config.php');

App::bind('myfinal', new QueryBuilder(
	Connection::make(App::get('config')['database'])
));

function view($name, $data = [])
{
	extract($data);

	require "app/views/{$name}.view.php";
}

function redirect($path)
{
	header("Location: /zavrsni/$path");
}
