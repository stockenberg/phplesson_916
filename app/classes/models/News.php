<?php

/**
 * Created by PhpStorm.
 * User: dozent
 * Date: 04/07/17
 * Time: 17:21
 */
class News extends Model
{

    public function getNews()
    {
        $SQL = 'SELECT * FROM news';
        $stmt = $this->db->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function save(array $post = [])
    {
        $SQL = 'INSERT INTO news (title, content, user_id) VALUES (:title, :content, :user_id)';
        $stmt = $this->db->prepare($SQL);
        $stmt->execute([
            ':title' => $post['title'],
            ':content' => $post['content'],
			':user_id' => $_SESSION['user']['id']
        ]);
    }

}