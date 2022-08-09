<?php

namespace App\Entity;

use DateTime;

class Article
{
    private int $id;
    private string $image_link;
    private string $title;
    private string $content;
    private string $author;
    private string $slug;
    private DateTime $created_at;

    /**
     * @param int $id
     * @param string $image_link
     * @param string $title
     * @param string $content
     * @param string $author
     * @param DateTime $created_at
     */
    public function __construct(int $id, string $image_link, string $title, string $content, string $author,string $slug,DateTime $created_at)
    {
        $this->id = $id;
        $this->image_link = $image_link;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->slug = $slug;
        $this->created_at = $created_at;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return Article
     */
    public function setSlug(string $slug): Article
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getImageLink(): string
    {
        return $this->image_link;
    }

    /**
     * @param string $image_link
     * @return Article
     */
    public function setImageLink(string $image_link): Article
    {
        $this->image_link = $image_link;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Article
     */
    public function setTitle(string $title): Article
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Article
     */
    public function setContent(string $content): Article
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return Article
     */
    public function setAuthor(string $author): Article
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreated_at(): DateTime
    {
        return $this->created_at;
    }

    /**
     * @param DateTime $created_at
     * @return Article
     */
    public function setCreated_at(DateTime $created_at): Article
    {
        $this->created_at = $created_at;

        return $this;
    }

}

