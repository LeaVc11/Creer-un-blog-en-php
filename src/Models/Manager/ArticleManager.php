<?php

namespace App\Models\Manager;


use App\Models\Class\Article;
use DateTime;
use PDO;


class ArticleManager extends DbManager
{
    private array $articles = [];

    public function loadingArticles(): array
    {
        $req = $this->getBdd()->prepare("SELECT * FROM articles  ORDER BY articles.created_at DESC ");
        $req->execute();
        $articles = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach ($articles as $article) {
            $a = $this->createdObjectArticle($article);
            $this->articles[] = $a;
        }
        return $this->articles;
    }
    private function createdObjectArticle(array $article): Article
    {
        return new Article(
            $article['id'],
            $article['image_link'],
            $article['chapo'],
            $article['title'],
            $article['content'],
            $article['author'],
            $article['slug'],
            new DateTime($article['created_at']),
            new DateTime($article['updated_at'])
        );
    }
    public function showArticle(int $id): Article
    {
        $request = $this->getBdd()->prepare('SELECT * FROM articles WHERE id = :id');
        $request->bindParam(':id', $id);
        $request->execute();
        $article = $request->fetch(PDO::FETCH_ASSOC);

        return $this->createdObjectArticle($article);
    }
    public function addArticle( Article  $article):void
    {
        $req = $this->getBdd()->prepare("INSERT INTO `articles`
    (`image_link`,`chapo`, `content`, `title` , `author`, `slug`, `created_at`,`updated_at`) 
    VALUE (:image_link,:chapo, :content, :title, :author, :slug, :created_at, :updated_at )");
        $req->execute([
            'image_link' => $article->getImageLink(),
            'chapo' => $article->getChapo(),
            'title' => $article->getTitle(),
            'content' => $article->getContent(),
            'author' => $article->getAuthor(),
            'slug' => $article->getSlug(),
            'created_at' => $article->getCreatedAt()->format('Y-m-d '),
            'updated_at' => $article->getUpdatedAt()->format('Y-m-d '),
        ]);
    }
    public function editArticle(Article $article):void
    {
        $req = $this->getBdd()->prepare("UPDATE `articles`
SET image_link = :imageLink, chapo = :chapo,
    content = :content, title = :title,slug = :slug,
    created_at = :created_at ,author = :author,updated_at = :updated_at
 WHERE id = :id");

        $req->execute([

            'id' => $article->getId(),
            'imageLink' => $article->getImageLink(),
            'chapo' => $article->getChapo(),
            'title' => $article->getTitle(),
            'content' => $article->getContent(),
            'author' => $article->getAuthor(),
            'slug' => $article->getSlug(),
            'created_at' => $article->getCreatedAt()->format('Y-m-d '),
            'updated_at' => $article->getUpdatedAt()->format('Y-m-d '),

        ]);

    }
    public function delete(Article $article):void
    {
        $req = $this->getBdd()->prepare('DELETE FROM `articles` WHERE id = :id');

        $req->execute(['id' => $article->getId()]);

    }
    public function findById(int $id): ?Article
    {
        $article = null;
        $query = $this->getBdd()->prepare("SELECT * FROM articles WHERE id = :id");
        $query->execute(['id' => $id]);
        $articleFromBdd = $query->fetch();
        if ($articleFromBdd) {
            $article = new Article(
                $articleFromBdd['id'],
                $articleFromBdd['image_link'],
                $articleFromBdd['chapo'],
                $articleFromBdd['title'],
                $articleFromBdd['content'],
                $articleFromBdd['author'],
                $articleFromBdd['slug'],
                new DateTime($articleFromBdd['created_at']),
                new DateTime($articleFromBdd['updated_at']));
        }

        return $article;
    }
    public function getByTitle($title): ?Article
    {
        $article = null;
        $query = $this->getBdd()->prepare("SELECT * FROM `articles` WHERE title = :title");
        $query->execute(['title' => $title]);
        $articleFromBdd = $query->fetch();
        if ($articleFromBdd) {
            $article = new Article(
                $articleFromBdd['id'],
                $articleFromBdd['image_link'],
                $articleFromBdd['chapo'],
                $articleFromBdd['title'],
                $articleFromBdd['content'],
                $articleFromBdd['author'],
                $articleFromBdd['slug'],
                new DateTime($articleFromBdd['created_at']),
                new DateTime($articleFromBdd['updated_at']));
        }
        return $article;
    }


}