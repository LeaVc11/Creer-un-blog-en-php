<?php

namespace App\models\Manager;

use App\models\Comment;
use DateTime;
use PDO;

class CommentManager extends DbManager
{
    private array $comments = [];

    /**
     * @throws \Exception
     */
    public function showComment(int $id): Comment
    {
        $request = $this->getBdd()->prepare('SELECT * FROM comment WHERE id = :id');
        $request->bindParam(':id', $id);
        $request->execute();
        $comment = $request->fetch(PDO::FETCH_ASSOC);

        return $this->createdObjectComment($comment);
    }


    /**
     * @throws \Exception
     */
    private function createdObjectComment(array $comment): Comment
    {

        return new Comment(
            $comment['id'],
            $comment['title'],
            $comment['status'],
            $comment['content'],
            new DateTime($comment['created_at']),
            $comment['created_by'],
            $comment['articleId'],

        );
    }

    /**
     * @throws \Exception
     */
    public function loadingComments(): array
    {
        $req = $this->getBdd()->prepare("SELECT * FROM comment");
        $req->execute();
        $comments = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

//        dd($articles);
        foreach ($comments as $comment) {
            $c = $this->createdObjectComment($comment);
            $this->comments[] = $c;
        }
        return $this->comments;
    }

    /**
     *
     * @throws \Exception
     */
    public function getByTitle($title): ?Comment
    {
        $comment = null;
        $query = $this->getBdd()->prepare("SELECT * FROM `comment` WHERE title = :title");
        $query->execute(['title' => $title]);
        $commentFromBdd = $query->fetch();

        if ($commentFromBdd) {
            $comment = new Comment(
                $commentFromBdd['id'],
                $commentFromBdd['title'],
                $commentFromBdd['status'],
                $commentFromBdd['content'],
                new DateTime($commentFromBdd['created_at']),
                $commentFromBdd['created_by'],
                $commentFromBdd['articleId']);
        }
        return $comment;
    }
    public function addComment(Comment $comment)
    {

        $req = $this->getBdd()->prepare("INSERT INTO `comment`
    (`id`, `title`, `status`, `content`, `createdAt`, `createdBy`, `articleId`) 
    VALUE (:id, :title, :status, :content, :createdAt, :createdBy, :articleId )");

        $req->execute([

            'title' => $comment->getTitle(),
            'status' => $comment->getStatus(),
            'content' => $comment->getContent(),
            'created_at' => $comment->getCreatedAt()->format('Y-m-d '),
            'createdBy' => $comment->getCreatedBy(),
            'articleId' => $comment->getArticleId(),
        ]);
    }


}


