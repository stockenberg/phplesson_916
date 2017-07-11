<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 11.07.17
 * Time: 17:31
 */
interface StatusInterface
{

	public static function read(String $key = NULL) : String;

	public static function write(String $key = NULL, String $value = NULL);

	public static function empty() : Bool;

}