<?php

namespace App\Models\Manager;

use App\Models\Class\Comment;
use PDO;

class CommentManager extends DbManager
{
    private array $comments = [];


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
    public function loadingComments(): array
    {
        $req = $this->getBdd()->prepare("SELECT * FROM comment ORDER BY created_at ASC ");
        $req->execute();
        $comments = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($comments as $comment) {
            $c = $this->createdObjectComment($comment);
            $this->comments[] = $c;
        }
        return $this->comments;
    }

    public function findById(int $id): ?Comment
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

    public function getByTitle(string $title): ?Comment
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

    public function addComment(Comment $comment):void
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
    }
    public function editComment(Comment $comment):void
    {
        $req = $this->getBdd()->prepare("UPDATE `comment` 
SET title = :title, status = :status, content = :content WHERE id = :id");
        $req->execute([
            'id' => $comment->getId(),
            'title' => $comment->getTitle(),
            'status' => $comment->getStatus(),
            'content' => $comment->getContent(),
        ]);
    }


    public function deleteComment(Comment $comment):void
    {
        $req = $this->getBdd()->prepare('DELETE FROM `comment` WHERE id = :id');

        $req->execute(['id' => $comment->getId()]);
    }

    public function findByArticle(int $id): array
    {
        $req = $this->getBdd()->prepare("SELECT * FROM `comment` WHERE article_id = :article_id AND status = :status");
        $req->execute(['article_id' => $id,'status'=>Comment::APPROVED]);
        $comments = $req->fetchAll();

        foreach ($comments as $comment) {

            $c = $this->createdObjectComment($comment);
            $reqAuthor = $this->getBdd()->prepare("SELECT * FROM `user` WHERE id = :user_id");
            $reqAuthor->execute(['user_id' => $c->getCreatedBy()]);
            $author=$reqAuthor->fetch();
            $c->setCreatedBy($author['username']);

            $this->comments[] = $c;
        }
        return $this->comments;

    }

    public function findByStatus(string $status): array
    {
        $req = $this->getBdd()->prepare("SELECT * FROM `comment` WHERE `status`= :status");
        $req->execute(['status' => $status]);
        $result = $req->fetchAll();
        $listComments = [];
        foreach ($result as $comment) {
            $commentObject = $this->createdObjectComment($comment);
            $listComments[] = $commentObject;
        }
        return $listComments;

    }



}