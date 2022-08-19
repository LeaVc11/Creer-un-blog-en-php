<?php

namespace App\Models\Class;

use DateTime;

class Article
{
    private ?int $id = null;
    private string $image_link;
    private string $chapo;
    private string $title;
    private string $content;
    private string $author;
    private string $slug;
    private DateTime $createdAt;
    private DateTime $updatedAt;


    /**
     * @param int|null $id
     * @param string $image_link
     * @param string $chapo
     * @param string $title
     * @param string $content
     * @param string $author
     * @param string $slug
     * @param DateTime $createdAt
     * @param DateTime $updatedAt
     */
    public function __construct(?int     $id,
                                string   $image_link,
                                string   $chapo,
                                string   $title,
                                string   $content,
                                string   $author,
                                string   $slug,
                                DateTime $createdAt,
                                DateTime $updatedAt)
    {
        $this->id = $id;
        $this->image_link = $image_link;
        $this->chapo = $chapo;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->slug = $slug;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;

    }

    /**
     * @return string
     */
    public function getChapo(): string
    {
        return $this->chapo;
    }

    /**
     * @param string $chapo
     * @return Article
     */
    public function setChapo(string $chapo): Article
    {
        $this->chapo = $chapo;
        return $this;
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
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     * @return Article
     */
    public function setCreatedAt(DateTime $createdAt): Article
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime $updatedAt
     * @return Article
     */
    public function setUpdatedAt(DateTime $updatedAt): Article
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }


}

