<?php

namespace App\models\Manager;

use App\models\Comment;

class CommentManager extends DbManager
{

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



}
