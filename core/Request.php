<?php

namespace App\Core;

class Request
{
	public static function uri()
	{
		return str_replace("/zavrsni/", "", 
			parse_url(
				$_SERVER['REQUEST_URI'],
				 PHP_URL_PATH
				)
		);
	}

	public static function method() 
	{
		return $_SERVER['REQUEST_METHOD'];
	}
}