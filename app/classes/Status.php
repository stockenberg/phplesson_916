<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 11.07.17
 * Time: 17:33
 */

namespace Marten\classes;

class Status implements StatusInterface
{
	private static $status = [];

	public static function read(String $key = null): String
	{

		if (!is_null($key)) {
			if (array_key_exists($key, self::$status)) {
				return self::$status[$key];
			}
		}
		return '';
	}

	public static function write(String $key = null, String $value = null): void
	{
		self::$status[$key] = $value;
	}

	public static function empty(): Bool
	{
		return empty(self::$status);
	}

}