<?php

/**
 * Created by PhpStorm.
 * User: dozent
 * Date: 04/07/17
 * Time: 16:13
 */
namespace Marten\classes;

class Auth
{

    private static $location = '?p=home';

	/**
	 * Denies Access to Sites Specified by Group Array
	 * @param int   $user_id
	 * @param array $groups
	 *
	 * @return bool
	 */
    public static function deny(int $user_id, array $groups = [])
    {

        if (in_array($user_id, $groups)) {
            header('Location: ' . self::$location);
            exit();
        } else {
            return true;
        }

    }

	/*
	 * Allows any User defined in Groups array the access to specific functions
	 * @param int   $user_id
	 * @param array $groups
	 *
	 * @return bool
	 */
    public static function allow(int $user_id, array $groups = [])
    {
        if (in_array($user_id, $groups)) {
            return true;
        } else {
            header('Location: ' . self::$location);
            exit();
        }
    }

}