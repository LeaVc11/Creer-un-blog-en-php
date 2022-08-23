<?php

namespace App\models\Manager;

use App\models\Comment;
use DateTime;
use PDO;

class CommentManager extends DbManager
{
    private array $comments = [];

    public function addComment(Comment $comment)
    {
        $req = $this->getBdd()->prepare("INSERT INTO `comment`
    (`content`,`title`,`created_at`,`created_by`,`article_id`, `status`)
    VALUE (:content,:title, :created_at, :created_by, :article_id, :status) )");

        $req->execute([
            'content' => $comment->getContent(),
            'title' => $comment->getTitle(),
            'status' => $comment->getStatus(),
            'created_by' => $comment->getCreatedBy(),
            'article_id' => $comment->getArticleId(),
            'created_at' => $comment->getCreatedAt()->format('Y-m-d '),
        ]);
    }

    /**
     * @throws \Exception
     */
    public function list(): array
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
     * @throws \Exception
     */
    private function createdObjectComment(array $comment): Comment
    {
//var_dump($article);
//die();

        return new Comment(
            $comment['id'],
            $comment['title'],
            $comment['status'],
            $comment['content'],
            new DateTime($comment['created_at']),
            $comment['created_by'],
            $comment['article_id'],
        );
    }
}
