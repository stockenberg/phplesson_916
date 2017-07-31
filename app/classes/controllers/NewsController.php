<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 20.06.17
 * Time: 17:51
 */

namespace Marten\classes\controllers;

use Marten\classes\models\News;
use Marten\classes\Status;

class NewsController
{

	public $content;


	public function run()
	{
		switch ($_GET['action'] ?? '') {
			case 'insert':

				if ($this->validateNews($_POST)) {
					$news = new News();
					$news->save($_POST);

					header('Location: ?p=news-edit');
					exit();
				}

				break;

			case 'update':
				if($this->validateNews($_POST)){
					$news = new News();
					$news->updateNews($_POST, $_GET['update']);

					header('Location: ?p=news-edit');
					exit();
				}
				break;

			case 'edit':

				$news = new News();
				$this->content = $news->getNewsById($_GET['edit']);

				break;

			case 'delete':

				$news = new News();
				if ($news->delete($_GET['delete'])) {
					header('Location: ?p=news-edit');
					exit();
				} else {
					header('Location: ?p=news-edit&error');
					exit();
				}

				break;
		}
	}

	private function validateNews(array $post = []): bool
	{

		if (isset($post['submit'])) {
			if ($post['title'] === '') {
				Status::write('title', 'Bitte gib eine Überschrift ein.');
			}

			if ($post['content'] === '') {
				Status::write('content', 'Bitte gib einen Text ein.');

			}

			if (Status::empty()) {

				return true;

			}

		}

		return false;
	}

	public function requestNews(): array
	{
		$news = new News();

		return $news->getNews();
	}

}