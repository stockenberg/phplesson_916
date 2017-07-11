<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 11.07.17
 * Time: 17:33
 */
class Status implements StatusInterface
{
	private static $status = [];

	public static function read(String $key = null): string
	{
		if (!is_null($key)) {
			if (in_array($key, self::$status)) {
				return self::$status[$key];
			}
		}
	}

	public static function write(String $key = null, String $value = null)
	{
		self::$status[$key] = $value;
	}

	public static function empty(): bool
	{
		return empty(self::$status);
	}

}