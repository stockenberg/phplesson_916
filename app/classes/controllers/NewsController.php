<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 20.06.17
 * Time: 17:51
 */

require_once CLASSES . 'models/News.php';

class NewsController
{

    private $status = [];

    public function run()
    {
        switch ($_GET['action'] ?? ''){
            case 'insert':

                if($this->validateNews($_POST)){
                    $news = new News();
                    $news->save($_POST);

                    header('Location: ?p=news-edit');
                    exit();
                }

                break;
        }
    }

    private function validateNews(array $post = []) : bool
    {

        if(isset($post['submit'])){

            if($post['title'] == ''){
                $this->status['title'] = 'Bitte gib eine Überschrift ein.';
            }

            if($post['content'] == ''){
                $this->status['content'] = 'Bitte gib einen Text ein.';
            }

            if(empty($this->status)){


                return true;

            }

        }

        return false;
    }

    public function requestNews() : array
    {
        $news = new News();
        return $news->getNews();
    }

}