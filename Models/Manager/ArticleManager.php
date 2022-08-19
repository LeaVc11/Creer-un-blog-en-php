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
            $this->articles[]= $a;
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
            $article['content'],
            $article['title'],
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
    (`image_link`, `content`, `title` , `author`, `slug`, `created_at`,`updated_at`) 
    VALUE (:image_link, :content, :title, :author, :slug, :created_at, :updated_at )");
//        var_dump($article->getUpdatedAt()->format('Y-m-d H:i:s'));
//        die();

        $req->execute([
            'image_link' => $article->getImageLink(),
            'title' => $article->getTitle(),
            'content' => $article->getContent(),
            'author' => $article->getAuthor(),
            'slug' => $article->getSlug(),
            'created_at' => $article->getCreatedAt()->format('Y-m-d H:i:s'),
            'updated_at' => $article->getUpdatedAt()->format('Y-m-d H:i:s'),
        ]);
    }
    public function getByTitle($title): ?Article
    {
        $article = null;
        $req = $this->getBdd()->prepare('SELECT * FROM `articles` WHERE title = :title');
        $req->execute([
            'title' => $title
        ]);
        $resultat = $req->fetch();
        if ($resultat) {
            $article = new Article( $resultat['id'],$resultat['image_link'],$resultat['content'], $resultat['title'],$resultat['author'],
                $resultat['slug'], $resultat['created_at'], $resultat['updated_at']);
        }
        return $article;
    }


}