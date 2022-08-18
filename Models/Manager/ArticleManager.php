<?php

namespace App\Models\Manager;


use App\Models\Class\Article;
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
            $this->addArticles($a);
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

        return new Article(
            $article['id'],
            $article['image_link'],
            $article['content'],
            $article['title'],
            $article['author'],
            $article['slug'],
            new DateTime($article['created_at'])
        );
    }

    /**
     * @param Article $article
     * @return void
     */


    public function addArticles(Article $article): void
    {
        $this->articles[] = $article;
    }

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

    /**
     * @throws Exception
     */
    public function addArticle($imageLink, $title,$content, $author,$slug,$created_at,$updated_at)
    {
        // recupérer les infos du form
        $imageLink = '';
        $content = '';
        $title = '';
        $author = '';
        $slug = '';
        $created_at = '';
        $updated_at= '';


        $req = $this->getBdd()->prepare('INSERT INTO `articles` (`image_link`, `content`, `title` , `author`, `slug`, `created_at`,`updated_at`) 
        VALUES (:image_link, :content, :title, :author, :slug, :createdAt)');
        $req->bindParam(':image_link', $imageLink);
        $req->bindParam(':content', $content);
        $req->bindParam(':title', $title);
        $req->bindParam(':author', $author);
        $req->bindParam(':slug', $slug);
        $req->bindParam(':created_at', $created_at);
        $req->bindParam(':updated_at', $updated_at);

        $req->execute();
        $req->closeCursor();


    }


}