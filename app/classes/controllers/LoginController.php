<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 20.06.17
 * Time: 17:53
 */

namespace Marten\classes\controllers;

use Marten\classes\models\User;

class LoginController
{

    private $request;
    private $status = [];
    private $location = '?p=home';


    public function run()
    {

        $this->request = array_merge($_GET, $_POST);

        switch ($this->request['action'] ?? '') {
            case 'login':

                if ($this->validateLoginForm($_POST)) {
                    // log me in
                    $user = new User();
                    $userData = $user->getUserByEmail($_POST['email'] ?? '');


                    if (count($userData) > 0) {
                        // user exists
                        if (password_verify($_POST['password'], $userData[0]['password'])) {
                            // logged in
                            $_SESSION['user'] = [
                                'id' => $userData[0]['id'],
                                'username' => $userData[0]['username'],
                                'role' => $userData[0]['role']
                            ];

                            // redirect
                            header('Location: ' . $this->location);
                            exit();

                        } else {
                            $this->setStatus('error', 'E-Mail-Adresse oder Passwort sind nicht korrekt.');
                        }

                    }

                    // Todo: Check Passwords against password_verify
                    // Store Data in Session
                    // Login Complete

                }
                break;
        }

    }

    public function validateLoginForm(Array $post = []): bool
    {
        if (isset($post['login'])) {
            if ($post['email'] == '') {
                $this->setStatus('email', 'Bitte E-Mail-Adresse eingeben!');
            }

            if ($post['password'] == '') {
                $this->setStatus('password', 'Bitte Passwort eingeben!');
            }

            if (empty($this->getStatus())) {
                return true;
            }

        }

        return false;

    }

    /**
     * @return array
     */
    public function getStatus(): array
    {
        return $this->status;
    }

    /**
     * @param String $key
     * @param String $error
     */
    public function setStatus(String $key, String $error)
    {
        $this->status[$key] = $error;
    }


}