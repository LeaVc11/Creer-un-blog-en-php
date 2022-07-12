<?php

namespace models;

require_once "db-manager.php";
require_once "article.php";


class ArticleManager extends AbstractDbManager
{
    private $articles; // Tableau d'article

    public function addArticles($article)
    {
        $this->articles[] = $article;
    }


    public function getArticles()
    {
        return $this->articles;
    }


    public function loadingArticles()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM articles");
        $req->execute();
        $articlesAll = $req->fetchAll(\PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($articlesAll as $article)
        {
            $a = new Article($article['id'], $article['picture'], $article['content'], $article['title'], $article['created'], $article['update'], $article['slug'], $article['first_name'], $article['last_name']);
            $this->addArticles($a);
        }
    }

    public function getArticleById($id)
    {
        for ($id = 0; $id < count($this->articles); $id++)
        {
            if ($this->articles[$id]->getId() === $id)
            {
                return $this->articles[$id];
            }
        }
    }
}




