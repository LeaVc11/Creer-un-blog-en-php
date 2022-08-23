<?php

namespace App\Models\Manager;


use App\Models\Class\Article;
use App\models\Comment;
use DateTime;
use Exception;
use PDO;


class ArticleManager extends DbManager
{
    private array $articles = [];

    /**
     * @return array
     */
    public function getArticles(): array
    {
        return $this->articles;
    }

    /**
     * @throws Exception
     */
    public function loadingArticles()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM articles");
        $req->execute();
        $articles = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

//        dd($articles);
        foreach ($articles as $article) {
            $a = $this->createdObjectArticle($article);
            $this->articles[] = $a;
        }
        return $this->articles;
    }

    /**
     * @param array $article
     *
     * @return Article
     *
     * @throws Exception
     */
    private function createdObjectArticle(array $article): Article
    {
//var_dump($article);
//die();
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

    /**
     * @param Article $article
     * @return void
     */


    /**
     * @param int $id
     *
     * @return Article
     *
     * @throws Exception
     */
    public function showArticle(int $id): Article
    {
        $request = $this->getBdd()->prepare('SELECT * FROM articles WHERE id = :id');
        $request->bindParam(':id', $id);
        $request->execute();
        $article = $request->fetch(PDO::FETCH_ASSOC);

        return $this->createdObjectArticle($article);
    }

    public function addArticles(Article $article)
    {

        $req = $this->getBdd()->prepare("INSERT INTO `articles`
    (`image_link`,`chapo`, `content`, `title` , `author`, `slug`, `created_at`,`updated_at`) 
    VALUE (:image_link,:chapo, :content, :title, :author, :slug, :created_at, :updated_at )");
//        var_dump($article->getUpdatedAt()->format('Y-m-d H:i:s'));
//        die();

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

    public function editArticle(Article $article)
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

    public function delete(Article $article)
    {
        $req = $this->getBdd()->prepare('DELETE FROM `articles` WHERE id = :id');

        $req->execute(['id' => $article->getId()]);
    }


    /**
     * @throws Exception
     */
    public function findById($id): ?Article
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
    /**
     * @throws Exception
     */
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