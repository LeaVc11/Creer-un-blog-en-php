<?php

namespace App\Models\Manager;



use App\Models\Class\Article;
use DateTime;
use Exception;
use PDO;


class ArticleManager extends DbManager
{
    private array $articles;

    /**
     * @param Article $article
     * @return void
     */
    public function addArticles(Article $article): void
    {
        $this->articles[] = $article;
    }

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
        $req = $this->getBdd()->prepare("SELECT * FROM Articles");
        $req->execute();
        $articles = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

//        dd($articles);
        foreach ($articles as $article) {
            $a = $this->createdObjectArticle($article);
            $this->addArticles($a);
        }
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
        $request = $this->getBdd()->prepare('SELECT * FROM Articles WHERE id = :id');
        $request->bindParam(':id', $id);
        $request->execute();
        $article = $request->fetch(PDO::FETCH_ASSOC);

        return $this->createdObjectArticle($article);
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
     * @throws Exception
     */
    public function addArticle()
    {
        // recupérer les infos du form
        $imageLink = '';
        $content = '';
        $title = '';
        $author = '';
        $slug = '';
        $created_at = '';



        $request = $this->getBdd()->prepare('INSERT INTO articles (image_link, content, title, author, slug, created_at) VALUES (:image_link, :content, :title, :author, :slug, :createdAt)');
        $request->bindParam(':image_link', $imageLink);
        $request->bindParam(':content', $content);
        $request->bindParam(':title', $title);
        $request->bindParam(':author', $author);
        $request->bindParam(':slug', $slug);
        $request->bindParam(':created_at', $created_at);

        $request->execute();

    }
    /**
     * @param int $id
     *
     *
     * @throws Exception
     */
    public function deleteArticle(int $id){
        $req = "
        Delete from Articles where id = :idArticle
        ";
        // debug une requete
//        print_r($req); die();
        $stmt = $this->getBdd()->prepare($req);
//        dd($stmt);
        $stmt->bindValue(":idArticle",$id,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();




    }

}