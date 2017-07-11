<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 20.06.17
 * Time: 17:51
 */

namespace Marten\classes\controllers;

use Marten\classes\models\News;

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

			case 'delete':

				$news = new News();
				if($news->delete($_GET['delete'])){
					header('Location: ?p=news-edit');
					exit();
				}else{
					header('Location: ?p=news-edit&error');
					exit();
				}

				break;
        }
    }

    private function validateNews(array $post = []) : bool
    {

        if(isset($post['submit'])){

            if($post['title'] === ''){
                $this->status['title'] = 'Bitte gib eine Überschrift ein.';
            }

            if($post['content'] === ''){
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