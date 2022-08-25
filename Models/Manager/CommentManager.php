<?php

namespace App\models\Manager;

use App\Models\Class\Comment;
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
            $comment['created_at'],
            $comment['created_by'],
            $comment['article_id'],

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
     * @throws Exception
     * @throws \Exception
     */
    public function findById($id): ?Comment
    {
        $comment = null;
        $query = $this->getBdd()->prepare("SELECT * FROM comment WHERE id = :id");
        $query->execute(['id' => $id]);
        $commentFromBdd = $query->fetch();


        if ($commentFromBdd) {
            $comment = new Comment(
                $commentFromBdd['id'],
                $commentFromBdd['title'],
                $commentFromBdd['status'],
                $commentFromBdd['content'],
                $commentFromBdd['created_at'],
                $commentFromBdd['created_by'],
                $commentFromBdd['article_id']);
        }
        return $comment;
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
                $commentFromBdd['created_at'],
                $commentFromBdd['created_by'],
                $commentFromBdd['article_id']);
        }
        return $comment;
    }
    public function addComment(Comment $comment)
    {

        $req = $this->getBdd()->prepare("INSERT INTO `comment`
    (`title`, `status`, `content`, `created_at`, `created_by`, `article_id`) 
    VALUE (:title, :status, :content, :createdAt, :createdBy, :articleId )");

        $req->execute([

            'title' => $comment->getTitle(),
            'status' => $comment->getStatus(),
            'content' => $comment->getContent(),
            'createdAt' => $comment->getCreatedAt()->format('Y-m-d H:i:s'),
            'createdBy' => $comment->getCreatedBy(),
            'articleId' => $comment->getArticleId(),
        ]);
//        dd($comment,$req);
    }
    public function editComment(Comment $comment)
    {
        $req = $this->getBdd()->prepare("UPDATE `comment`
SET  title = :title,status = :status,content = :content,
    created_at = :created_at ,created_by = :created_by,article_id = :article_id
 WHERE id = :id");

        $req->execute([
            'title' => $comment->getTitle(),
            'status' => $comment->getStatus(),
            'content' => $comment->getContent(),
            'createdAt' => $comment->getCreatedAt()->format('Y-m-d H:i:s'),
            'createdBy' => $comment->getCreatedBy(),
            'articleId' => $comment->getArticleId(),

        ]);
    }



}


