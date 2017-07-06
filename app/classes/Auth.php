<?php

/**
 * Created by PhpStorm.
 * User: dozent
 * Date: 04/07/17
 * Time: 16:13
 */
class Auth
{

    private static $location = '?p=home';

    /**
     * Denies any User defined in Groups array from access and redirects him/her
     * @param $user_id
     * @param array $groups
     */
    public static function deny($user_id, $groups = [])
    {

        if (in_array($user_id, $groups)) {
            header('Location: ' . self::$location);
            exit();
        } else {
            return true;
        }

    }


    public static function allow($user_id, $groups = [])
    {
        if (in_array($user_id, $groups)) {
            return true;
        } else {
            header('Location: ' . self::$location);
            exit();
        }
    }

}